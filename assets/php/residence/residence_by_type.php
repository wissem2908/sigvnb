<?php
include '../config.php'; // adapte le chemin si besoin

header('Content-Type: application/json; charset=utf-8');

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Compter les résidences par type
    $sql = "
        SELECT type_residence AS type, COUNT(*) AS total
        FROM residence
        WHERE type_residence IS NOT NULL
        GROUP BY type_residence
        ORDER BY total DESC
    ";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = [
            "name"  => $row['type'],
            "value" => (int)$row['total']
        ];
    }

    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
