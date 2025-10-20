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

    // --- 1. Total surface ---
    $totalSql = "SELECT SUM(CAST(REPLACE(surface, ',', '.') AS DECIMAL(15,2))) FROM ceinture_verte WHERE surface IS NOT NULL";
    $totalSurface = $pdo->query($totalSql)->fetchColumn();
    $totalSurface = $totalSurface ?: 0;

    // --- 2. Surface by état d’avancement ---
    $sql = "
        SELECT 
            COALESCE(NULLIF(TRIM(etat_avancement), ''), 'Non défini') AS etat_avancement,
            SUM(CAST(REPLACE(surface, ',', '.') AS DECIMAL(15,2))) AS total_surface
        FROM ceinture_verte
        GROUP BY etat_avancement
        ORDER BY FIELD(etat_avancement, 'A l''étude', 'Aucune', 'En cours', 'Réalisée', 'Non défini')
    ";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // --- 3. Compute percentages ---
    $result = [];
    foreach ($rows as $r) {
        $percent = ($totalSurface > 0) ? round(($r['total_surface'] / $totalSurface) * 100, 2) : 0;
        $result[$r['etat_avancement']] = $percent;
    }

    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
