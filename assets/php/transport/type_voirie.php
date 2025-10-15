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

    // 🟢 Count total routes by type_voie
    $sql = "
        SELECT 
            type_voie,
            COUNT(*) AS total
        FROM voirie
        WHERE type_voie IS NOT NULL AND type_voie <> ''
        GROUP BY type_voie
        ORDER BY total DESC
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch()) {
        $data[] = [
            'name' => $row['type_voie'],
            'value' => (int)$row['total']
        ];
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}