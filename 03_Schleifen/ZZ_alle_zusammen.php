<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Kapitel 03 - Übung zu Schleifen</title>

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <main>
        <h1>Kapitel 03 - Übung zu Schleifen</h1>
        <h2>1. Liste erzeugen (Variante 1: Zwei Schleifen)</h2>

        <ol>
            <!-- Variante 1: Zwei Schleifen -->
            <?php

            for ($i = 1; $i < 10; $i++) {
                echo("<li>");

                for ($j = 1; $j < $i; $j++) {
                    echo("Hey ");
                }

                echo("Hey");
                echo("</li>");
            }

            ?>
        </ol>

        <h2>1. Liste erzeugen (Variante 2: Eine Schleifen)</h2>

        <ol>
            <!-- Variante 2: Eine Schleife mit Text-Variable -->
            <?php

            $hey = "Hey";
            for ($i = 1; $i < 10; $i++) {
                echo("<li>");
                echo($hey);
                echo("</li>");

                $hey .= " Hey";
            }

            ?>
        </ol>


        <div class="balken"></div>
        <h2>2. Tabelle erzeugen</h2>

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

            // Startkapital
            $kapital = 1200;

            // Zinssatz
            $zinssatz = 1.25;

            for ($jahr = 1; $jahr <= 15; $jahr++) {
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

    </main>
</div>

</body>
</html>