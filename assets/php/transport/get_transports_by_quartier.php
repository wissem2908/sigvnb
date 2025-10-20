<?php
// assets/php/transport/get_transports_by_quartier.php
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

    // Count number of each transport type per quartier
    $sql = "
        SELECT 
            numero_quartier AS quartier,
            type_transport AS type,
            COUNT(*) AS total
        FROM arret_bus
        WHERE numero_quartier IS NOT NULL 
          AND numero_quartier <> ''
          AND type_transport IS NOT NULL 
          AND type_transport <> ''
        GROUP BY numero_quartier, type_transport
       ORDER BY CAST(SUBSTRING_INDEX(numero_quartier, ' ', -1) AS UNSIGNED), type_transport;
    ";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();

    // Prepare structures
    $quartiers = [];
    $types = [];
    $dataMap = [];

    foreach ($rows as $row) {
        $q = $row['quartier'];
        $t = $row['type'];
        $v = (int)$row['total'];

        if (!in_array($q, $quartiers)) $quartiers[] = $q;
        if (!in_array($t, $types)) $types[] = $t;
        $dataMap[$t][$q] = $v;
    }

    // Build data array for each series
    $series = [];
    foreach ($types as $type) {
        $series[] = [
            'name' => $type,
            'type' => 'bar',
            'stack' => 'total',
            'data' => array_map(function($q) use ($dataMap, $type) {
                return isset($dataMap[$type][$q]) ? $dataMap[$type][$q] : 0;
            }, $quartiers)
        ];
    }

    echo json_encode([
        'quartiers' => $quartiers,
        'types' => $types,
        'series' => $series
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
