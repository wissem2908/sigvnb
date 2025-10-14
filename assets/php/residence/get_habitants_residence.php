<?php
// assets/php/residence/get_habitants_residence.php
header('Content-Type: application/json; charset=utf-8');
error_reporting(E_ALL);

include '../config.php'; // ajuste le chemin si nécessaire

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    // 🔹 Nombre d'habitants par résidence (identifiant)
    $sql = "
        SELECT identifiant, SUM(nbr_habitant) AS total_habitants
        FROM residence
        WHERE identifiant IS NOT NULL AND identifiant <> ''
        GROUP BY identifiant
        ORDER BY total_habitants DESC
    ";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $labels = [];
    $values = [];

    while ($row = $stmt->fetch()) {
        $labels[] = $row['identifiant'];
        $values[] = (int) $row['total_habitants'];
    }

    echo json_encode([
        'labels' => $labels,
        'values' => $values
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
