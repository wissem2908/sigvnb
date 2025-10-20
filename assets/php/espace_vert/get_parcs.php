<?php
header('Content-Type: application/json; charset=utf-8');
include '../config.php';

try {
    // ✅ Connection with PDO
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    // ✅ Query for detailed data
    $sql = "
        SELECT 
            thematique_parc,
            surface_m2,
            numero_quartier,
            CASE 
                WHEN type_plantation IS NULL OR type_plantation = '' THEN 'Autre'
                ELSE type_plantation
            END AS type_plantation,
            nombre_arbres
        FROM parc
        WHERE thematique_parc IS NOT NULL AND thematique_parc <> ''
        ORDER BY thematique_parc ASC
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    $countByThematique = [];

    // ✅ Loop through all rows
    while ($row = $stmt->fetch()) {
        $thematique = $row['thematique_parc'];

        // Add detailed data
        $data[] = [
            'thematique_parc' => $thematique,
            'surface_m2' => (float)$row['surface_m2'],
            'numero_quartier' => $row['numero_quartier'],
            'type_plantation' => $row['type_plantation'],
            'nombre_arbres' => (int)$row['nombre_arbres']
        ];

        // Count number of parks per thématique
        if (!isset($countByThematique[$thematique])) {
            $countByThematique[$thematique] = 0;
        }
        $countByThematique[$thematique]++;
    }

    // ✅ Format final result
    $result = [
        'details' => $data,
        'count_by_thematique' => []
    ];

    foreach ($countByThematique as $thematique => $count) {
        $result['count_by_thematique'][] = [
            'thematique_parc' => $thematique,
            'total' => $count
        ];
    }

    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
