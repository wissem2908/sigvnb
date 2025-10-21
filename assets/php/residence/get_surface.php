<?php
header('Content-Type: application/json');
include '../config.php';

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // --- Surface par résidence ---
    $sqlResid = "
        SELECT nom AS residence,
               SUM(superficie_fonciere) AS surface_foncier,
               SUM(surface_plancher) AS surface_plancher
        FROM equipement
        WHERE nom IS NOT NULL AND nom != ''
        GROUP BY nom
        ORDER BY residence
    ";
    $stmt = $pdo->query($sqlResid);
    $residences = [];
    $foncierResid = [];
    $plancherResid = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $residences[] = $row['residence'];
        $foncierResid[] = (float)$row['surface_foncier'];
        $plancherResid[] = (float)$row['surface_plancher'];
    }

    // --- Surface par quartier ---
    $sqlQuart = "
 SELECT 
    n_quartier AS quartier,
    SUM(superficie_fonciere) AS surface_foncier,
    SUM(surface_plancher) AS surface_plancher
FROM equipement
WHERE n_quartier IS NOT NULL
GROUP BY n_quartier
ORDER BY CAST(SUBSTRING_INDEX(n_quartier, ' ', -1) AS UNSIGNED);
    ";
    $stmt2 = $pdo->query($sqlQuart);
    $quartiers = [];
    $foncierQuart = [];
    $plancherQuart = [];
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $quartiers[] = $row['quartier'];
        $foncierQuart[] = (float)$row['surface_foncier'];
        $plancherQuart[] = (float)$row['surface_plancher'];
    }

    echo json_encode([
        "residences" => $residences,
        "surfaceFoncierResid" => $foncierResid,
        "surfacePlancherResid" => $plancherResid,
        "quartiers" => $quartiers,
        "surfaceFoncierQuart" => $foncierQuart,
        "surfacePlancherQuart" => $plancherQuart
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
