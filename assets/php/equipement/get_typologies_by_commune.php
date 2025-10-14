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

    // Compter les équipements par commune et typologie
    $sql = "SELECT c.nom AS commune_name, e.typologie_equipement, COUNT(e.id_equipement) AS total
            FROM commune c
            LEFT JOIN equipement e ON c.code = e.commune
            GROUP BY c.code, e.typologie_equipement
            ORDER BY c.code";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $commune = $row['commune_name'];
        $type = $row['typologie_equipement'] ?? 'Autres'; // si null
        $count = (int)$row['total'];

        if (!isset($data[$commune])) {
            $data[$commune] = [];
        }
        $data[$commune][$type] = $count;
    }

    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
