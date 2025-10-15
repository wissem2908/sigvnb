<?php
header('Content-Type: application/json; charset=utf-8');
@ini_set('display_errors', 0);
error_reporting(E_ALL);

include '../config.php';

try {
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    // ✅ Count number of routes by état
    $sql = "
        SELECT 
            etat,
            COUNT(*) AS total
        FROM voirie
        WHERE etat IS NOT NULL AND etat <> ''
        GROUP BY etat
        ORDER BY total DESC
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch()) {
        $etat_name = trim($row['etat']);
        $total = (int)$row['total'];

        // Optional: Normalize common names
        if (stripos($etat_name, 'bon') !== false) {
            $etat_name = 'Bon état';
        } elseif (stripos($etat_name, 'moyen') !== false) {
            $etat_name = 'Moyen état';
        } elseif (stripos($etat_name, 'mauvais') !== false) {
            $etat_name = 'Mauvais état';
        } elseif (stripos($etat_name, 'ruine') !== false) {
            $etat_name = 'En ruine';
        }

        $data[] = [
            'name' => $etat_name,
            'value' => $total
        ];
    }

    echo json_encode(['data' => $data], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
