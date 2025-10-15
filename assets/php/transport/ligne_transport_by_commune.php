<?php
// assets/php/transport/get_rails_by_commune.php
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

    // Count number of each rail type per commune
    $sql = "
        SELECT 
            commune,
            type_rail,
            COUNT(*) AS total
        FROM ligne_transport
        WHERE commune IS NOT NULL 
          AND commune <> ''
          AND type_rail IS NOT NULL 
          AND type_rail <> ''
        GROUP BY commune, type_rail
        ORDER BY commune, type_rail
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();

    $communes = [];
    $types = [];
    $dataMap = [];

    foreach ($rows as $row) {
        $commune = $row['commune'];
        $type = $row['type_rail'];
        $total = (int)$row['total'];

        if (!in_array($commune, $communes)) $communes[] = $commune;
        if (!in_array($type, $types)) $types[] = $type;

        $dataMap[$type][$commune] = $total;
    }

    // Build the series array
    $colors = ['#42a5f5', '#66bb6a', '#ffa726', '#ab47bc', '#26c6da'];
    $series = [];
    foreach ($types as $index => $type) {
        $series[] = [
            'name' => $type,
            'type' => 'bar',
            'stack' => 'total',
            'itemStyle' => ['color' => $colors[$index % count($colors)]],
            'data' => array_map(function($commune) use ($dataMap, $type) {
                return isset($dataMap[$type][$commune]) ? $dataMap[$type][$commune] : 0;
            }, $communes)
        ];
    }

    echo json_encode([
        'communes' => $communes,
        'types' => $types,
        'series' => $series
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
