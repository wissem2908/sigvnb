<?php
header('Content-Type: application/json; charset=utf-8');
include '../../config.php';

try {
    $pdo = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // --- 1. Nature de plantation (inner ring) ---
    $sqlNature = "
        SELECT 
            COALESCE(NULLIF(TRIM(nature_plantation), ''), 'Autre') AS nature,
            SUM(CAST(REPLACE(surface, ',', '.') AS DECIMAL(15,2))) AS total_surface
        FROM ceinture_verte
        GROUP BY nature
        ORDER BY total_surface DESC
    ";
    $natureData = $pdo->query($sqlNature)->fetchAll(PDO::FETCH_ASSOC);

    // --- 2. Type de zone (outer ring) ---
    $sqlType = "
        SELECT 
            COALESCE(NULLIF(TRIM(type_zone), ''), 'Autre') AS type_zone,
            SUM(CAST(REPLACE(surface, ',', '.') AS DECIMAL(15,2))) AS total_surface
        FROM ceinture_verte
        GROUP BY type_zone
        ORDER BY total_surface DESC
    ";
    $typeData = $pdo->query($sqlType)->fetchAll(PDO::FETCH_ASSOC);

    // --- 3. Répartition par commune ---
    $sqlCommune = "
        SELECT 
            COALESCE(NULLIF(TRIM(commune), ''), 'Non définie') AS commune,
            SUM(CAST(REPLACE(surface, ',', '.') AS DECIMAL(15,2))) AS total_surface
        FROM ceinture_verte
        GROUP BY commune
        ORDER BY total_surface DESC
    ";
    $communeData = $pdo->query($sqlCommune)->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'nature' => $natureData,
        'type' => $typeData,
        'commune' => $communeData
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
