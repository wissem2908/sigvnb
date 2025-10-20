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

    // 🟢 Count plantations by quartier
    $sql = "
        SELECT 
            numero_quartier,
            COUNT(*) AS total_plantations
        FROM plantation
        WHERE numero_quartier IS NOT NULL AND numero_quartier <> ''
        GROUP BY numero_quartier
        ORDER BY total_plantations DESC
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $rows = $stmt->fetchAll();

    $quartiers = [];
    $data = [];

    // build arrays for ECharts
    foreach ($rows as $r) {
        $quartiers[] = $r['numero_quartier'];
        $data[] = [
            'value' => (int)$r['total_plantations'],
            'itemStyle' => [
                'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)) // random color for variety
            ]
        ];
    }

    echo json_encode([
        'quartiers' => $quartiers,
        'data' => $data
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>