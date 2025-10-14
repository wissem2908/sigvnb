<?php
// assets/php/residence/get_surface_type.php
header('Content-Type: application/json; charset=utf-8');
@ini_set('display_errors', 0);
error_reporting(E_ALL);

$configPaths = [
    __DIR__ . '/../config.php',
    __DIR__ . '/../../config.php',
    __DIR__ . '/../../../config.php',
    __DIR__ . '/config.php'
];

$found = false;
foreach ($configPaths as $p) {
    if (file_exists($p)) {
        require_once $p;
        $found = true;
        break;
    }
}
if (!$found) {
    echo json_encode(['error' => 'config.php not found']);
    exit;
}

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    // 🔹 somme superficie par type_residence
    $sql = "
        SELECT type_residence, SUM(COALESCE(superficie_fonciere,0)) AS total_surface
        FROM residence
        WHERE type_residence IS NOT NULL AND type_residence <> ''
        GROUP BY type_residence
        ORDER BY total_surface DESC
    ";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch()) {
        $data[] = [
            'name'  => $row['type_residence'],
            'value' => (float) $row['total_surface']
        ];
    }

    echo json_encode(['data' => $data], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
