<?php 
header('Content-Type: application/json; charset=utf-8');
include '../config.php';

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    // 🟢 Sum longueur by commune and type_voie
    $sql = "
        SELECT 
            commune,
            type_voie,
            SUM(CAST(REPLACE(longueur, ',', '.') AS DECIMAL(10,2))) AS total_longueur
        FROM voirie
        WHERE commune IS NOT NULL 
          AND commune <> ''
          AND type_voie IS NOT NULL 
          AND type_voie <> ''
        GROUP BY commune, type_voie
        ORDER BY commune, type_voie
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $rows = $stmt->fetchAll();

    // Reorganize data for ECharts
    $communes = [];
    $types = [];
    $dataMap = [];

    foreach ($rows as $r) {
        $communes[$r['commune']] = true;
        $types[$r['type_voie']] = true;
        $dataMap[$r['type_voie']][$r['commune']] = round($r['total_longueur'], 2);
    }

    $communes = array_keys($communes);
    $types = array_keys($types);

    $series = [];
    foreach ($types as $type) {
        $values = [];
        foreach ($communes as $commune) {
            $values[] = isset($dataMap[$type][$commune]) ? $dataMap[$type][$commune] : 0;
        }
        $series[] = [
            'name' => $type,
            'type' => 'bar',
            'stack' => 'total',
            'data' => $values
        ];
    }

    echo json_encode([
        'communes' => $communes,
        'types' => $types,
        'series' => $series
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
