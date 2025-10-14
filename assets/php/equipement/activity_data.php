<?php
include '../config.php'; // adapte le chemin si besoin

header('Content-Type: application/json; charset=utf-8');

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // --- Répartition par activité ---
    $sqlActivite = "
        SELECT type, COUNT(*) AS total
        FROM activity
        WHERE type IS NOT NULL
        GROUP BY type
        ORDER BY type
    ";
    $stmt = $bdd->prepare($sqlActivite);
    $stmt->execute();

    $activites = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $type = $row['type'] ?: "Autre";
        $activites[$type] = (int)$row['total'];
    }

    // --- Répartition surface par commune ---
    $sqlSurface = "
        SELECT commune, SUM(surface) AS total_surface
        FROM activity
        WHERE commune IS NOT NULL
        GROUP BY commune
        ORDER BY commune
    ";
    $stmt = $bdd->prepare($sqlSurface);
    $stmt->execute();

    $surfaces = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $commune = $row['commune'] ?: "Inconnue";
        $surfaces[$commune] = (float)$row['total_surface'];
    }

    echo json_encode(
        ["activite" => $activites, "surface" => $surfaces],
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
