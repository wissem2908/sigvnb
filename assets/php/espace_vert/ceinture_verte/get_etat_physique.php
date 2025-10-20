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

    // ---- Group by état physique ----
    $sql = "
        SELECT 
            COALESCE(NULLIF(TRIM(etat_veget), ''), 'Inconnu') AS etat_physique,
            SUM(CAST(surface AS DECIMAL(10,2))) AS total_surface
        FROM ceinture_verte
        GROUP BY etat_veget
        ORDER BY total_surface DESC
    ";

    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format for ECharts
    $data = [];
    foreach ($rows as $r) {
        $data[] = [
            'name' => $r['etat_physique'],
            'value' => floatval($r['total_surface'])
        ];
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>