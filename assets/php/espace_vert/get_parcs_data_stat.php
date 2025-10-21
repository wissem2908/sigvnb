<?php
header('Content-Type: application/json; charset=utf-8');
include '../config.php';

try {
    $pdo = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // --- A. Surface totale par thématique ---
    $sqlA = "SELECT thematique_parc, SUM(surface_m2) AS total_surface FROM parc GROUP BY thematique_parc";
    $surfaceData = $pdo->query($sqlA)->fetchAll(PDO::FETCH_ASSOC);

    // --- B. Nombre total d’arbres par thématique ---
    $sqlB = "SELECT thematique_parc, SUM(nombre_arbres) AS total_arbres FROM parc GROUP BY thematique_parc";
    $arbresData = $pdo->query($sqlB)->fetchAll(PDO::FETCH_ASSOC);

    // --- C. Répartition des types de plantation ---
//     $sqlC = "SELECT 
//     CASE 
//         WHEN type_plantation IS NULL OR type_plantation = '' THEN 'Autre'
//         ELSE type_plantation
//     END AS type_plantation,
//     COUNT(*) AS total
// FROM parc
// GROUP BY 
//     CASE 
//         WHEN type_plantation IS NULL OR type_plantation = '' THEN 'Autre'
//         ELSE type_plantation
//     END;";




    $sqlC = "SELECT 
    CASE 
        WHEN type_plantation IS NULL OR type_plantation = '' THEN 'Autre'
        ELSE type_plantation
    END AS type_plantation,
    COUNT(*) AS total
FROM parc
WHERE type_plantation IS NOT NULL 
  AND type_plantation <> ''
GROUP BY type_plantation
ORDER BY total DESC;";
    $typeData = $pdo->query($sqlC)->fetchAll(PDO::FETCH_ASSOC);

    // --- D. Surface totale par quartier ---
    $sqlD = "SELECT 
    numero_quartier, 
    SUM(surface_m2) AS total_surface
FROM parc
GROUP BY numero_quartier
ORDER BY CAST(SUBSTRING_INDEX(numero_quartier, ' ', -1) AS UNSIGNED)";
    $quartierData = $pdo->query($sqlD)->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'surface_thematique' => $surfaceData,
        'arbres_thematique' => $arbresData,
        'type_plantation' => $typeData,
        'surface_quartier' => $quartierData
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
