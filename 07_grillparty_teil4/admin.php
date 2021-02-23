<?php

// Datenbankverbindung öffnen
$con = mysqli_connect("localhost", "root", null, "grillparty");

// Fehler abfangen
if (!$con) {
    die("Verbindungsfehler mit der Datenbank!");
}

// SQL-Abfrage definieren
$sql = "SELECT * FROM gäste";

// SQL-Abfrage durchführen
$res = mysqli_query($con, $sql);

// Anzahl der Datensätze ermitteln
$num = mysqli_num_rows($res);


?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>Grillparty: Teil 4</title>
    <style>

    </style>
</head>
<body>
<div class="wrapper">
    <main>
        <img src="img/banner_grillparty.jpg" alt="Banner: Grillparty">
        <h1>Einladung zur Grillparty</h1>

        <h2>Wir planen eine große Grillparty - sei dabei!</h2>
        <p>
            Hallo, wir planen eine große Grillparty.
            Es gibt reichlich Essen, Trinken und Musik.
            Die Feier soll am Samstag in zwei Wochen ab 15 Uhr bei uns im Garten stattfinden.
            Ihr seid herzlich eingeladen. Wir würden uns sehr über Deine/Eure Zusage freuen.
            Außerdem fänden wir es toll, wenn jeder eine Kleinigkeit zum Büffet beitragen könnte.
            (Grillgut, Salat, Brot, Dips, Nachtisch, ...).
            Grill und Getränke besorgen wir!
            Bitte tragt euch in die Liste ein!
        </p>
        <p><strong>Liebe Grüße, Anna und Thilo.</strong></p>

        <h2>Bisherige Zusagen:</h2>
        <form action="delete.php" method="post">
            <table>
                <thead>
                <tr>
                    <th>Auswahl</th>
                    <th>Nummer</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Ich bringe mit</th>
                </tr>
                </thead>
                <tbody>
                <!-- Ausgabe der Datensätze */  -->

                <?php

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>\n";
                    echo "<td><input type='checkbox' name='delete[]' value='{$row["gast_id"]}'></td>";
                    echo "<td>" . $row["gast_id"] . "</td>\n";
                    echo "<td>" . htmlentities($row["vorname"]) . "</td>\n";
                    echo "<td>" . htmlentities($row["nachname"]) . "</td>\n";
                    echo "<td>" . htmlentities($row["beitrag"]) . "</td>\n";
                    echo "</tr>\n";
                }

                ?>

                </tbody>
            </table>

            <input type="submit" name="submit" value="Auswahl löschen" class="button button-red">
        </form>

    </main>
</div>
</body>
</html>