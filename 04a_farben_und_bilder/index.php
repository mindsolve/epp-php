<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>PHP-Kurs Kapitel 04</title>
    <style>
        <?php if (isset($_POST["back-color"])) { ?>
        .wrapper {
            background-color: <?php echo($_POST["back-color"]) ?>;
        }
        <?php } ?>

        <?php if (isset($_POST["text-color"])) { ?>
        p {
            color: <?php echo($_POST["text-color"]) ?>;
        }
        <?php } ?>

        <?php

        switch ($_POST["image"]) {
            default:
            case "murray":
                $bild = "https://assets.cdn.moviepilot.de/files/58554a4997548bee5cef3437711d8b0368c7375c743bc4a6eeb09578fabe/fill/1200/576/Murmeltier.jpg";
                break;
            case "cage":
                $bild = "https://filmpluskritik.files.wordpress.com/2019/11/nick-cage-conair.jpg";
                break;
            case "hanks":
                $bild = "https://media.tegna-media.com/assets/WQAD/images/0b0bb3e8-97ef-4b1b-8048-6e9249b1cd4f/0b0bb3e8-97ef-4b1b-8048-6e9249b1cd4f_750x422.jpg";
                break;
        }
        ?>

    </style>
</head>
<body>
<div class="wrapper">
    <main>
        <h1>PHP-Kurs</h1>
        <h2>Kapitel 04 - Übung 1</h2>

        <h3>Webseite einrichten</h3>
        <form action="index.php" method="post">
            <h4>Welche Hintergrundfarbe soll die Webseite haben?</h4>
            <div class="inputbox">
                <label><input type="radio" name="back-color" value="lightgreen" checked/>Hellgrün</label>
                <label><input type="radio" name="back-color" value="orange"/>Orange</label>
                <label><input type="radio" name="back-color" value="lightblue"/>Hellblau</label>

            </div>

            <h4>Welche Schriftfarbe ist gewünscht?</h4>
            <div class="inputbox">
                <label><input type="radio" name="text-color" value="black" checked/>Schwarz</label>
                <label><input type="radio" name="text-color" value="gray"/>Grau</label>
                <label><input type="radio" name="text-color" value="blueviolet"/>Lila</label>
            </div>

            <h4>Welches Foto soll angezeigt werden?</h4>
            <div class="inputbox">
                <label><input type="radio" name="image" value="murray" checked/>Bill Murray</label>
                <label><input type="radio" name="image" value="cage"/>Nicolas Cage</label>
                <label><input type="radio" name="image" value="hanks"/>Tom Hanks</label>
            </div>

            <div class="inputbox">
                <input type="submit" name="submit"/>
            </div>
        </form>

        <h3>Text</h3>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
            At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
            no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
            magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
            Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>

        <h3>Bild</h3>
        <img src="<?php echo($bild); ?>" alt="Dynamisches Bild"/>

    </main>
</div>

</body>
</html>