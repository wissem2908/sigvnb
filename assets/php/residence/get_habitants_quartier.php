<?php
// assets/php/residence/get_habitants_quartier.php
header('Content-Type: application/json; charset=utf-8');

// Ne pas mélanger warnings avec le JSON en prod
@ini_set('display_errors', 0);
error_reporting(E_ALL);

include '../config.php';
try {
    // Connexion PDO (utilise les constantes définies dans config.php)
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    // Somme des habitants par quartier (table `residence`, colonne `nbr_habitant`)
    $sql = "
        SELECT n_quartier AS quartier, SUM(COALESCE(nbr_habitant,0)) AS total_habitants
        FROM `residence`
        WHERE n_quartier IS NOT NULL AND n_quartier <> ''
        GROUP BY n_quartier
        ORDER BY total_habitants DESC
    ";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $quartiers = [];
    $habitants = [];
    while ($row = $stmt->fetch()) {
        $quartiers[] = $row['quartier'];
        $habitants[] = (int)$row['total_habitants'];
    }

    echo json_encode(['quartiers' => $quartiers, 'habitants' => $habitants], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}