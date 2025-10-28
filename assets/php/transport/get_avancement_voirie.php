<?php
header('Content-Type: application/json; charset=utf-8');
@ini_set('display_errors', 0);
error_reporting(E_ALL);

include '../config.php';

try {
    // ✅ Create PDO connection
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    // ✅ Query: total count by avancement status
    $sql = "
        SELECT 
            CASE 
                WHEN avancement IS NULL OR avancement = '' THEN 'Non défini'
                ELSE avancement
            END AS avancement,
            COUNT(*) AS total
        FROM voirie
        GROUP BY 
            CASE 
                WHEN avancement IS NULL OR avancement = '' THEN 'Non défini'
                ELSE avancement
            END
        ORDER BY total DESC
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $avancement = [];
    $totaux = [];

    while ($row = $stmt->fetch()) {
        $avancement[] = $row['avancement'];
        $totaux[] = (int)$row['total'];
    }

    // ✅ JSON response
    echo json_encode([
        'avancement' => $avancement,
        'totaux' => $totaux
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
