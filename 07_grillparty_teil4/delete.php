<?php

// Datenbankverbindung öffnen
$con = mysqli_connect("localhost", "root", null, "grillparty");

// Fehler abfangen
if (!$con) {
    die("Verbindungsfehler mit der Datenbank!");
}

if (isset($_POST["submit"], $_POST["delete"])) {
    $zu_loeschende_id_strings = $_POST["delete"];

    // SQL-Abfrage definieren
    $sql = "DELETE FROM gäste WHERE gast_id IN (" . implode(', ', $zu_loeschende_id_strings) . ");";

    // Abfrage durchführen
    $res = mysqli_query($con, $sql);

    // Anzahl der geänderten Zeilen ermitteln
    $anz_aenderungen = mysqli_affected_rows($con);
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>Grillparty: Teil 4</title>
</head>
<body>
<div class="wrapper">
    <main>
        <img src="img/banner_grillparty.jpg" alt="Banner: Grillparty">
        <h1>Einladung zur Grillparty</h1>

        <p>
            <b>
                <?php

                // Prüfen, ob direkt oder durch Formular abgerufen
                if (!isset($_POST["submit"])) {
                    echo "Diese Datei kann leider nicht direkt aufgerufen werden.<br>" .
                        "Bitte gehe zurück zur Startseite und sende es erneut ab.";
                }
                // Durch Formular, aber keine Daten angegeben
                elseif (!isset($_POST["delete"])) {
                    echo "Du hast keine Einträge zur Löschung ausgewählt.<br>" .
                        "Bitte gehe zurück zum Admin-Center und wähle mind. einen Eintrag aus.";
                }
                // (Durch Formular): Prüfen, ob DELETE-Abfrage erfolgreich
                elseif (isset($res) && $res) {
                    echo "Du hast erfolgreich <b>" . $anz_aenderungen . "</b> Einträge gelöscht.";
                }
                // Vermutlich SQL-Fehler
                else {
                    echo "Leider ist etwas schief gegangen: <code>" . mysqli_error($con) . "</code>";
                }

                ?>
            </b>
        </p>

        <a href="index.php" class="button">Zurück zur Startseite</a>
        <a href="admin.php" class="button button-green">Zum Admin-Center</a>
    </main>
</div>
</body>
</html>