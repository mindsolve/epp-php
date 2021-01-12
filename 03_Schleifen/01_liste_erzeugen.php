<!doctype html>
<html lang="de">
<head>
    <title>03: 01 Liste Erzeugen</title>
    <meta charset="utf-8">
</head>
<body>

<ol>
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
</body>
</html>

