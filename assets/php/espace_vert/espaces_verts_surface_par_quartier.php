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

    // 🟢 Sum of surface_ha per quartier
    $sql = "
        SELECT 
            numero_quartier,
            SUM(surface_ha) AS total_surface
        FROM espaces_verts
        WHERE numero_quartier IS NOT NULL AND numero_quartier <> '' AND numero_quartier <> '<Nul>' AND numero_quartier <> 'Hors périmètre'
        GROUP BY numero_quartier
        ORDER BY total_surface DESC
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch()) {
        $data[] = [
            'name' => $row['numero_quartier'],
            // convert ha → m² if you want (1 ha = 10,000 m²)
            'value' => round($row['total_surface'] * 10000, 2)
        ];
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
