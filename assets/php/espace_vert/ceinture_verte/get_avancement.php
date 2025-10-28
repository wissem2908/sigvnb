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

    // --- 1. Total surface ---
    $totalSql = "SELECT SUM(CAST(REPLACE(surface, ',', '.') AS DECIMAL(15,2))) FROM ceinture_verte WHERE surface IS NOT NULL";
    $totalSurface = $pdo->query($totalSql)->fetchColumn();
    $totalSurface = $totalSurface ?: 0;

    // --- 2. Surface by état d’avancement (raw) ---
    $sql = "
        SELECT 
            COALESCE(NULLIF(TRIM(etat_avancement), ''), 'Non défini') AS etat_avancement,
            SUM(CAST(REPLACE(surface, ',', '.') AS DECIMAL(15,2))) AS total_surface
        FROM ceinture_verte
        GROUP BY etat_avancement
    ";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // --- 3. Merge 'Aucune' + 'Non défini' => 'Pas de données'
    $merged = [];
    $merged['Pas de données'] = 0;

    foreach ($rows as $r) {
        $etat = $r['etat_avancement'];
        $surface = (float)$r['total_surface'];

        if (in_array(strtolower($etat), ['aucune', 'non défini'])) {
            $merged['Pas de données'] += $surface;
        } else {
            $merged[$etat] = ($merged[$etat] ?? 0) + $surface;
        }
    }

    // --- 4. Compute percentages ---
    $result = [];
    foreach ($merged as $etat => $surface) {
        $percent = ($totalSurface > 0) ? round(($surface / $totalSurface) * 100, 2) : 0;
        $result[$etat] = $percent;
    }

    // --- 5. Sort manually (optional) ---
    $order = ['À l\'étude', 'En cours', 'Réalisée', 'Pas de données'];
    $sorted = [];
    foreach ($order as $key) {
        if (isset($result[$key])) $sorted[$key] = $result[$key];
    }
    // Add any missing keys at the end
    foreach ($result as $k => $v) {
        if (!isset($sorted[$k])) $sorted[$k] = $v;
    }

    echo json_encode($sorted, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
