<?php
include '../config.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Query: group by fonction + equipement
    $sql = "SELECT fonction, equipement, COUNT(*) as total
            FROM `equipement`
            GROUP BY fonction, equipement";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $fonction = $row['fonction'];
        $equipement = $row['equipement'];
        $count = (int)$row['total'];

        if (!isset($data[$fonction])) {
            $data[$fonction] = [];
        }
        $data[$fonction][$equipement] = $count;
    }

    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
