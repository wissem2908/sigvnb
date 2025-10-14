<?php
header('Content-Type: application/json');
include '../config.php'; // 🔹 adapte le chemin selon ton projet

try {
 $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    // Récupérer le nombre de logements et habitants PAR résidence (identifiant)
    $sql = "
        SELECT 
            identifiant AS residence,
            COALESCE(nbr_logements, 0) AS logements,
            COALESCE(nbr_habitant, 0) AS habitants
        FROM residence
        WHERE identifiant IS NOT NULL
        ORDER BY identifiant ASC
    ";
    $stmt = $bdd->query($sql);

    $residences = [];
    $logements = [];
    $habitants = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $residences[] = $row['residence'];
        $logements[] = (int)$row['logements'];
        $habitants[] = (int)$row['habitants'];
    }

    echo json_encode([
        "residences" => $residences,
        "logements" => $logements,
        "habitants" => $habitants
    ], JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}