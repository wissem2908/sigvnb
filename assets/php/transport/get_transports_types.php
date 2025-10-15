<?php
// assets/php/transport/get_transports_types.php
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

    // Count number of rows per transport type
    $sql = "
        SELECT type_transport AS type, COUNT(*) AS total
        FROM arret_bus
        WHERE type_transport IS NOT NULL AND type_transport <> ''
        GROUP BY type_transport
        ORDER BY total DESC
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $types = [];
    $totals = [];
    while ($row = $stmt->fetch()) {
        $types[] = $row['type'];
        $totals[] = (int)$row['total'];
    }

    echo json_encode(['types' => $types, 'totals' => $totals], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
