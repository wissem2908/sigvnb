<?php
include '../config.php'; // adjust path if needed

header('Content-Type: application/json; charset=utf-8');

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    // Select all important columns
    $sql = "
        SELECT 
            OBJECTID,
            fonction,
            equipement,
            abreviation,
            superficie_fonciere,
            cos,
            ces,
            surface_plancher,
            nbr_etage,
            avancement,
            n_quartier,
            commune,
            nom,
            observation
        FROM equipement
        ORDER BY OBJECTID ASC
    ";

    $stmt = $bdd->query($sql);
    $rows = $stmt->fetchAll();

    echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
