<?php
header('Content-Type: application/json; charset=utf-8');
include '../config.php'; // adjust path as needed

try {
    $pdo = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    $sql = "SELECT 
                OBJECTID,
                type_residence,
                densite,
                identifiant,
                superficie_fonciere,
                superficie_parcellaire,
                surface_moy_log,
                cos,
                ces,
                surface_plancher,
                nbr_etage,
                nbr_logements,
                nbr_habitant,
                avancement,
                n_quartier,
                commune
            FROM residence";

    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();

    echo json_encode(['data' => $rows], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
