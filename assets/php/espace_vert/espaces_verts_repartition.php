<?php
header('Content-Type: application/json; charset=utf-8');
include '../config.php';

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    // 🟢 Calculate total surface per type_espace
    $sql = "
        SELECT 
            type_espace,
            SUM(surface_ha) AS total_surface
        FROM espaces_verts
        WHERE type_espace IS NOT NULL AND type_espace <> ''
        GROUP BY type_espace
        ORDER BY total_surface DESC
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch()) {
        $data[] = [
            'name' => $row['type_espace'],
            // convert ha → m² (1 ha = 10,000 m²)
            'value' => round($row['total_surface'] * 10000, 2)
        ];
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>