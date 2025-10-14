<?php
// === CONFIGURATION ===
$ogr2ogr = '"C:\Program Files\GDAL\ogr2ogr.exe"'; // Path to GDAL ogr2ogr.exe
$gdbPath = '"C:\Users\omri wissem\Documents\2.OMRI Wissem\GDB_BOUGHEZOUL.gdb"'; // Path to your GDB
$sqlitePath = '"C:\Users\omri wissem\Documents\2.OMRI Wissem\test.sqlite"'; // Output SQLite file
$layerName = "RESIDENCE"; // Name of the table/layer to read

// === STEP 1: CONVERT GDB TO SQLITE ===
echo "<b>Conversion du GDB vers SQLite...</b><br>";
$cmd = "$ogr2ogr -f \"SQLite\" $sqlitePath $gdbPath";
$output = shell_exec($cmd . " 2>&1");
echo nl2br(htmlspecialchars($output)) . "<br>";

// Check if SQLite file was created
if (!file_exists(str_replace('"', '', $sqlitePath))) {
    die("<span style='color:red'>❌ Erreur : la conversion a échoué. Vérifiez le chemin de GDAL ou du fichier GDB.</span>");
}
echo "<span style='color:green'>✅ Conversion terminée avec succès.</span><br><br>";

// === STEP 2: LIRE LES DONNÉES DE LA TABLE ===
try {
    $pdo = new PDO("sqlite:" . str_replace('"', '', $sqlitePath));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM $layerName";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($rows)) {
        echo "<b style='color:orange'>⚠️ Aucune donnée trouvée dans la couche $layerName.</b>";
    } else {
        echo "<h3>📋 Données de la table $layerName :</h3>";
        echo "<table border='1' cellspacing='0' cellpadding='5'>";
        echo "<tr style='background:#eee; font-weight:bold;'>";
        foreach (array_keys($rows[0]) as $col) {
            echo "<th>" . htmlspecialchars($col) . "</th>";
        }
        echo "</tr>";

        foreach ($rows as $r) {
            echo "<tr>";
            foreach ($r as $val) {
                echo "<td>" . htmlspecialchars($val) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
} catch (PDOException $e) {
    echo "<b style='color:red'>Erreur SQLite : " . htmlspecialchars($e->getMessage()) . "</b>";
}
?>
