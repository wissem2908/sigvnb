<?php
header('Content-Type: application/json; charset=utf-8');
@ini_set('display_errors', 0);
error_reporting(E_ALL);

include '../config.php';

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    // ✅ Total surface per quartier (all quartiers)
    $sql = "
        SELECT 
            numero_quartier AS quartier,
            SUM(COALESCE(surface_m2, 0)) AS total_surface
        FROM parc_stationnement
        WHERE numero_quartier IS NOT NULL AND numero_quartier <> ''
        GROUP BY numero_quartier
        ORDER BY total_surface DESC
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $quartiers = [];
    $surfaces = [];

    while ($row = $stmt->fetch()) {
        $quartiers[] = $row['quartier'];
        $surfaces[] = (float)$row['total_surface'];
    }

    echo json_encode(['quartiers' => $quartiers, 'surfaces' => $surfaces], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
