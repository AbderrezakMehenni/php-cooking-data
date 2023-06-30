<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Dictionnaire -->
        <div>
            <?php
                $string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
                $dico = explode("\n", $string);
                // 1
                $nombreMots = count($dico);
                echo "<p>"."Le dictionnaire contient ".$nombreMots." mots."."</p>";
                // 2
                $nombreMots15Caracteres = 0;
                foreach ($dico as $mot) {
                    if (strlen($mot) === 15) {
                        $nombreMots15Caracteres++;
                    }
                }
                echo "<p>"."Le dictionnaire contient ".$nombreMots15Caracteres." mots de 15 caractères."."</p>";
                // 3
                $motsW = 0;
                foreach ($dico as $mot) {
                    if (strpos($mot, 'w') !== false) {
                        $motsW++;
                    }
                }
                echo "<p>"."Le dictionnaire contient ".$motsW." mots contenant la lettre W"."</p>";
                // 4
                $motsQ = 0;
                foreach ($dico as $mot) {
                    if (strpos($mot, 'q') !== false) {
                        $motsQ++;
                    }
                }
                echo "<p>"."Le dictionnaire contient ".$motsQ." mots contenant la lettre Q"."</p>";
            ?>
        </div>
    <!-- Liste de films -->
        <div>
            <?php
                $string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
                $brut = json_decode($string, true);
                $top = $brut["feed"]["entry"];
                // 1
                for ($i = 0; $i < 10; $i++) {
                    $position = $i + 1;
                    $film = $top[$i]["im:name"]["label"];
                    echo $position . " " . $film . "<br>";
                }
                // 2
                $gravity=null;
                foreach($top as $index => $film) {
                    $titre = $film["im:name"]["label"];
                    if($titre === "gravity") {
                        $gravity=$index+1;
                        break;
                    }
                }
                
            ?>
        </div>
</body>
</html>