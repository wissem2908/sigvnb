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

    // Compter le nombre d’équipements par quartier (basé sur equipement.n_quartier)
    $sql = "SELECT n_quartier, COUNT(*) AS total
            FROM equipement
            GROUP BY n_quartier ORDER BY CAST(SUBSTRING_INDEX(n_quartier, ' ', -1) AS UNSIGNED)";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $quartier = $row['n_quartier']; // e.g. "Quartier 5"
        $data[$quartier] = (int)$row['total'];
    }

    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
