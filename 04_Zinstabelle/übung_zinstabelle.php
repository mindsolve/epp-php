<!doctype html>
<html lang="de">
<head>
    <title>04: Übung Zinstabelle mit Eingabefeldern</title>
    <meta charset="utf-8">
    <style>
        table, th, td {
            border: 1px solid black;
        }

        #container {
            width: 90%;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div id="container">
    <h1>Kapitel 4 - Übung Zinstabelle mit Eingabefeldern</h1>

    <p>
        Bitte geben Sie Ihre Werte ein:
    </p>

    <form action="übung_zinstabelle.php" method="post">
        <fieldset style="width: 30%">
            <label for="startkapital">Startkapital:</label><br>
            <input type="text" pattern="\d+(\.\d+)*" required name="startkapital" id="startkapital">
            <br><br>

            <label for="zinssatz">Zinssatz:</label><br>
            <input type="text" pattern="\d+(\.\d+)*" required name="zinssatz" id="zinssatz">
            <br><br>

            <label for="laufzeit">Laufzeit:</label><br>
            <input type="text" pattern="\d+" required name="laufzeit" id="laufzeit">
        </fieldset>
        <br>

        <input type="submit" name="submitted">
    </form>

    <br><br>

    <?php
    if (isset($_POST["submitted"])) {
        ?>

        <table>
            <colgroup>
                <col style="width: 10%">
                <col style="width: 30%">
                <col style="width: 10%">
                <col style="width: 30%">
            </colgroup>

            <thead>
            <tr>
                <th>Jahr</th>
                <th>Kapital Jahresanfang</th>
                <th>Zinsen</th>
                <th>Kapital Jahresende</th>
            </tr>
            </thead>

            <tbody>
            <?php

            // Hinweis: (variablentyp)variablenname:
            // konvertiert von einem Typ in einen anderen, hier von String (aus dem HTMl-Formular)
            // nach float (also einer Kommazahl).
            // Alternativ ließe sich die Funktion floatval() [nach float] oder intval() [nach integer] benutzen

            // PHP versucht automatisch den passenden Datentyp zu finden bzw. zu konvertieren.
            // Siehe: https://www.php.net/manual/de/language.types.type-juggling.php
            // In diesem Beispiel würde es also reichen, wenn wir nicht explizit konvertieren.
            // $kaptial = $_POST["statkapital"]
            // -> $kaptial ist jetzt ein `string`
            // echo(round($kapital))
            // -> $kaptial wird jetzt automatisch in einen int oder float konvertiert


            // Startkapital
            $kapital = (float)$_POST["startkapital"];

            // Zinssatz
            $zinssatz = (float)$_POST["zinssatz"];

            for ($jahr = 1; $jahr <= (int)$_POST["laufzeit"]; $jahr++) {
                echo("<tr>");

                // Jahr
                echo("<td>" . $jahr . "</td>");

                // Kapital Jahresanfang
                echo("<td>" . round($kapital, 2) . "</td>");

                // Zinsen
                $zinsen = ($kapital * $zinssatz) / 100;
                echo("<td>" . round($zinsen, 2) . "</td>");

                // Kapital Jahresende
                $kapital += $zinsen;
                echo("<td>" . round($kapital, 2) . "</td>");

                echo("</tr>");
            }

            ?>
            </tbody>

        </table>

        <?php
    }
    ?>
</div>

</body>
</html>

