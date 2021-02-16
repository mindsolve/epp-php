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
    <title>Grillparty: Teil 2</title>
    <style>
        #submit {
            background-color: rgb(240, 107, 35);
            border-radius: 7px;
            border: 10px solid rgb(240, 107, 35);
            color: white;
            box-shadow: 2px 2px #808080;
        }

        #submit:hover {
            box-shadow: 3px 3px #444444;
        }
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
        <table>
            <thead>
            <tr>
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
                echo "<td>" . $row["gast_id"] . "</td>\n";
                echo "<td>" . htmlentities($row["vorname"]) . "</td>\n";
                echo "<td>" . htmlentities($row["nachname"]) . "</td>\n";
                echo "<td>" . htmlentities($row["beitrag"]) . "</td>\n";
                echo "</tr>\n";
            }

            ?>

            </tbody>
        </table>

        <div id="input-form">
            <p>
                <b>Trage dich in die Liste ein!</b>
            </p>
            <form action="index.php" method="post">
                <label for="vorname">Vorname:</label><br>
                <input type="text" id="vorname" name="vorname" placeholder="Dein Vorname" required>
                <br><br>

                <label for="nachname">Nachname:</label><br>
                <input type="text" id="nachname" name="nachname" placeholder="Dein Nachname" required>
                <br><br>

                <label for="beitrag">Ich bringe mit:</label><br>
                <input type="text" id="beitrag" name="beitrag" placeholder="Brot, Nudelsalat, Nachtisch..." required>
                <br><br>

                <input type="submit" id="submit" name="submit" value="Senden">
            </form>
        </div>

        <div id="after-submit">
            <p>
                <b>
                    <?php

                    if (isset($_POST["submit"])) {
                        // mysqli_real_escape_string() sorgt dafür, dass eingegebener Text nicht als SQL-Befehl
                        // verstanden werden kann (z.B. Anführungszeichen könnten sonst für Probleme sorgen)
                        $vorname = mysqli_real_escape_string($con, $_POST["vorname"]);
                        $nachname = mysqli_real_escape_string($con, $_POST["nachname"]);
                        $beitrag = mysqli_real_escape_string($con, $_POST["beitrag"]);

                        $res = mysqli_query($con,
                            "INSERT INTO gäste VALUES (default, '" . $vorname . "', '" . $nachname . "', '" . $beitrag . "')");

                        if ($res) {
                            echo "Du hast dich erfolgreich in die Liste eingetragen. Wir freuen uns auf Dich/Euch!";
                        } else {
                            echo "Leider ist etwas schief gegangen: <code>" . mysqli_error($con) . "</code>";
                        }
                    }

                    ?>
                </b>
            </p>
        </div>

    </main>
</div>
</body>
</html>