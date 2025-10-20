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

    // 🟢 Count total plantations by species
    $sql = "
        SELECT 
            espece,
            COUNT(*) AS total
        FROM plantation
        WHERE espece IS NOT NULL AND espece <> '' and espece <> '< Null>'
        GROUP BY espece
   
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch()) {
        $data[] = [
            'name' => $row['espece'],
            'value' => (int)$row['total']
        ];
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>