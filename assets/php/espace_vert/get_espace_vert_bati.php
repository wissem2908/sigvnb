<?php
header('Content-Type: application/json; charset=utf-8');
include '../config.php';

try {
    // ✅ Database connection (PDO)
    $bdd = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    // 🟢 1. Espace vert from table parc (in m²)
    $sql_parc = "
        SELECT 
            COALESCE(numero_quartier, 'Inconnu') AS quartier,
            SUM(COALESCE(surface_m2, 0)) AS total_surface
        FROM parc
        GROUP BY numero_quartier
        ORDER BY 
            CASE 
                WHEN numero_quartier REGEXP '^[A-Za-z ]*[0-9]+$' 
                THEN CAST(SUBSTRING_INDEX(numero_quartier, ' ', -1) AS UNSIGNED)
                ELSE 999999
            END;
    ";
    $stmt_parc = $bdd->prepare($sql_parc);
    $stmt_parc->execute();
    $espaces_verts = [];
    while ($row = $stmt_parc->fetch()) {
        $espaces_verts[$row['quartier']] = floatval($row['total_surface']);
    }

    // 🟢 2. Espace vert from table amenagement_paysager (convert ha → m²)
    $sql_am = "
        SELECT 
            COALESCE(numero_quartier, 'Inconnu') AS quartier,
            SUM(CAST(surface_ha AS DECIMAL(10,3)) * 10000) AS total_surface
        FROM amenagement_paysager
        WHERE type_amenagement LIKE '%ESPACE%'
        GROUP BY numero_quartier
        ORDER BY 
            CASE 
                WHEN numero_quartier REGEXP '^[A-Za-z ]*[0-9]+$' 
                THEN CAST(SUBSTRING_INDEX(numero_quartier, ' ', -1) AS UNSIGNED)
                ELSE 999999
            END;
    ";
    $stmt_am = $bdd->prepare($sql_am);
    $stmt_am->execute();
    while ($row = $stmt_am->fetch()) {
        $q = $row['quartier'];
        $v = floatval($row['total_surface']);
        if (isset($espaces_verts[$q])) {
            $espaces_verts[$q] += $v;
        } else {
            $espaces_verts[$q] = $v;
        }
    }

    // 🟤 3. Surface bâtie from table residence
    $sql_bati = "
        SELECT 
            COALESCE(n_quartier, 'Inconnu') AS quartier,
            SUM(COALESCE(surface_plancher, 0)) AS total_surface
        FROM residence
        GROUP BY n_quartier
        ORDER BY 
            CASE 
                WHEN n_quartier REGEXP '^[A-Za-z ]*[0-9]+$' 
                THEN CAST(SUBSTRING_INDEX(n_quartier, ' ', -1) AS UNSIGNED)
                ELSE 999999
            END;
    ";
    $stmt_bati = $bdd->prepare($sql_bati);
    $stmt_bati->execute();
    $surface_batie = [];
    while ($row = $stmt_bati->fetch()) {
        $surface_batie[$row['quartier']] = floatval($row['total_surface']);
    }

    // 🧮 4. Combine data
    $quartiers = array_unique(array_merge(array_keys($espaces_verts), array_keys($surface_batie)));

    // 🔢 Sort numerically by quartier number, keep "Inconnu" last
    usort($quartiers, function($a, $b) {
        preg_match('/(\d+)/', $a, $a_num);
        preg_match('/(\d+)/', $b, $b_num);

        $a_val = isset($a_num[1]) ? (int)$a_num[1] : 999999;
        $b_val = isset($b_num[1]) ? (int)$b_num[1] : 999999;

        return $a_val <=> $b_val;
    });

    $data = [];
    foreach ($quartiers as $q) {
        $ev = $espaces_verts[$q] ?? 0;
        $bati = $surface_batie[$q] ?? 0;
        $ratio = ($ev + $bati > 0) ? round(($ev / ($ev + $bati)) * 100, 2) : 0;

        $data[] = [
            'quartier' => $q,
            'espace_vert' => round($ev, 2),
            'surface_batie' => round($bati, 2),
            'ratio' => $ratio
        ];
    }

    // 🟢 5. Output JSON
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>