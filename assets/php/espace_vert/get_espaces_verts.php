<?php
header('Content-Type: application/json; charset=utf-8');
include '../config.php'; // adjust path if needed

try {
    $pdo = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    $sql = "SELECT id, type_espace, surface_ha, numero_quartier FROM espaces_verts";
    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll();

    echo json_encode(['data' => $data], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
