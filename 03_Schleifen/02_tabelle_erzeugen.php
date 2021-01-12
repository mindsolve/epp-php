<!doctype html>
<html lang="de">
<head>
    <title>03: 02 Tabelle Erzeugen</title>
    <meta charset="utf-8">
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<table>
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
    $kapital = 1000;

    // Zinssatz
    $zinssatz = 1.25;

    for ($jahr = 1; $jahr <= 15; $jahr++) {
        echo("<tr>");

        // Jahr
        echo("<td>" . $jahr . "</td>");

        // Kapital Jahresanfang
        echo("<td>" . $kapital . "</td>");

        // Zinsen
        $zinsen = ($kapital * $zinssatz) / 100;
        echo("<td>" . $zinsen . "</td>");

        // Kapital Jahresende
        $kapital += $zinsen;
        echo("<td>" . $kapital . "</td>");

        echo("</tr>");
    }

    ?>
    </tbody>

</table>
</body>
</html>

