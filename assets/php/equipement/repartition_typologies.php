<?php
include '../config.php'; // adapte chemin si besoin

header('Content-Type: application/json; charset=utf-8');

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Compter équipements par commune et par typologie (colonne 'equipement')
    $sql = "
        SELECT commune, equipement, COUNT(*) AS total
        FROM equipement
        WHERE commune IS NOT NULL AND equipement IS NOT NULL
        GROUP BY commune, equipement
        ORDER BY commune, equipement
    ";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $commune = $row['commune'] ?: "Inconnue";
        $equipement = $row['equipement'] ?: "Autre";

        if (!isset($data[$commune])) {
            $data[$commune] = [];
        }
        $data[$commune][$equipement] = (int)$row['total'];
    }

    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
