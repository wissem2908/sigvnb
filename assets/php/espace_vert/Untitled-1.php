<?php
header('Content-Type: application/json; charset=utf-8');

// === CONFIGURATION ===
$ogr2ogr = '"C:\Program Files\GDAL\ogr2ogr.exe"'; // Path to GDAL ogr2ogr.exe
$gdbPath = '"C:\Users\omri wissem\Documents\2.OMRI Wissem\GDB_BOUGHEZOUL.gdb"'; // Path to your GDB
$sqlitePath = '"C:\Users\omri wissem\Documents\2.OMRI Wissem\temp_ceinture_verte_merge.sqlite"'; // Temporary SQLite output
$layerName = "CEINTURE_VERTE_merge"; // Layer name inside GDB

try {
    // === STEP 1: CONVERT GDB LAYER TO SQLITE ===
    $cmd = "$ogr2ogr -f \"SQLite\" $sqlitePath $gdbPath $layerName";
    $output = shell_exec($cmd . " 2>&1");

    if (!file_exists(str_replace('"', '', $sqlitePath))) {
        throw new Exception("Erreur : la conversion a échoué. Détails : $output");
    }

    // === STEP 2: CONNECT TO SQLITE ===
    $pdo = new PDO("sqlite:" . str_replace('"', '', $sqlitePath));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // === STEP 3: READ SELECTED COLUMNS ===
    $sql = "SELECT 
                OBJECTID,
                \"Numéro de la parcelle\" AS numero_parcelle,
                \"Surface en Hectar\" AS surface_ha,
                \"Statut juridique\" AS statut_juridique,
                \"Nature des plantations\" AS nature_plantation,
                Commune AS commune,
                \"Nom zone\" AS nom_zone,
                \"etat vegetation\" AS etat_vegetation,
                Gestionaire AS gestionnaire,
                statu
            FROM $layerName";

    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // === STEP 4: RETURN JSON ===
    echo json_encode([
        'status' => 'success',
        'count' => count($data),
        'data' => $data
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    // Optional cleanup
    // unlink(str_replace('"', '', $sqlitePath));

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}
?>
