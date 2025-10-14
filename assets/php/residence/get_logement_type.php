<?php
// assets/php/residence/get_logement_type.php
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

    // 🔹 Nombre total de logements regroupé par type de résidence
    $sql = "
        SELECT type_residence, SUM(nbr_logements) AS total_logements
        FROM residence
        WHERE type_residence IS NOT NULL AND type_residence <> ''
        GROUP BY type_residence
        ORDER BY total_logements DESC
    ";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $labels = [];
    $values = [];

    while ($row = $stmt->fetch()) {
        $labels[] = $row['type_residence'];
        $values[] = (int) $row['total_logements'];
    }

    echo json_encode([
        'labels' => $labels,
        'values' => $values
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
