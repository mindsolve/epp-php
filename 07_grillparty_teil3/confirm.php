<?php

// Datenbankverbindung öffnen
$con = mysqli_connect("localhost", "root", null, "grillparty");

// Fehler abfangen
if (!$con) {
    die("Verbindungsfehler mit der Datenbank!");
}

if (isset($_POST["submit"])) {
    // mysqli_real_escape_string() sorgt dafür, dass eingegebener Text nicht als SQL-Befehl
    // verstanden werden kann (z.B. Anführungszeichen könnten sonst für Probleme sorgen)
    $vorname = mysqli_real_escape_string($con, $_POST["vorname"]);
    $nachname = mysqli_real_escape_string($con, $_POST["nachname"]);
    $beitrag = mysqli_real_escape_string($con, $_POST["beitrag"]);

    // SQL-Abfrage definieren
    $sql = "INSERT INTO gäste VALUES (default, '" . $vorname . "', '" . $nachname . "', '" . $beitrag . "')";

    // Abfrage durchführen
    $res = mysqli_query($con, $sql);

}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>Grillparty: Teil 3</title>
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
                // (Durch Formular): Prüfen, ob INSERT-Abfrage erfolgreich
                elseif (isset($res) && $res) {
                    echo "Du hast dich erfolgreich in die Liste eingetragen. Wir freuen uns auf Dich/Euch!";
                } else {
                    echo "Leider ist etwas schief gegangen: <code>" . mysqli_error($con) . "</code>";
                }

                ?>
            </b>
        </p>

        <a href="index.php" class="button">Zurück zur Startseite</a>
    </main>
</div>
</body>
</html>