<?php
header('Content-Type: application/json; charset=utf-8');
include '../../config.php';

try {
    $pdo = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // --- Group by gestionnaire and sum the total surface ---
    $sql = "
        SELECT 
            COALESCE(NULLIF(TRIM(gestionnaire), ''), 'Autres') AS gestionnaire,
            SUM(CAST(surface AS DECIMAL(10,2))) AS total_surface
        FROM ceinture_verte
        GROUP BY gestionnaire
        ORDER BY total_surface DESC
    ";

    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format JSON for ECharts
    $labels = [];
    $values = [];

    foreach ($rows as $r) {
        $labels[] = $r['gestionnaire'];
        $values[] = floatval($r['total_surface']);
    }

    echo json_encode([
        'labels' => $labels,
        'values' => $values
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>