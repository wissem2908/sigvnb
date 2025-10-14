<?php
include '../config.php'; // ajuste le chemin si nécessaire
header('Content-Type: application/json; charset=utf-8');

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Compter logements par quartier
    $sql = "
        SELECT n_quartier AS quartier, COUNT(*) AS total
        FROM equipement
        WHERE n_quartier IS NOT NULL
        GROUP BY n_quartier
        ORDER BY total DESC
    ";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $quartiers = [];
    $totaux = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $quartiers[] = $row['quartier'] ?: "Inconnu";
        $totaux[] = (int)$row['total'];
    }

    echo json_encode([
        "quartiers" => $quartiers,
        "totaux" => $totaux
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
