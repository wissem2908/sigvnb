<?php
header('Content-Type: application/json; charset=utf-8');
include '../config.php'; // adjust path if needed

try {
    // ✅ Create PDO connection
    $pdo = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    // ✅ Fetch all data from "parc" table
    $sql = "SELECT 
                id, 
                thematique_parc, 
                surface_m2, 
                numero_quartier, 
                type_plantation, 
                nombre_arbres 
            FROM parc";

    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll();

    // ✅ Return clean JSON
    echo json_encode(['data' => $data], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
