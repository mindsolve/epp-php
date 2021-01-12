<!doctype html>
<html lang="de">
<head>
    <title>03: 01 Liste Erzeugen</title>
    <meta charset="utf-8">
</head>
<body>

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
</body>
</html>

