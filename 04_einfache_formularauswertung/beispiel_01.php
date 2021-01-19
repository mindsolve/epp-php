<!doctype html>
<html lang="de">
<head>
    <title>04: Beispiel 1</title>
    <meta charset="utf-8">
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<form action="beispiel_01.php" method="post">
    <label for="vorname">Vorname:</label><br>
    <input type="text" name="vorname" id="vorname">
    <br><br>

    <label for="nachname">Nachname:</label><br>
    <input type="text" name="nachname" id="nachname">
    <br><br>

    <input type="submit">
</form>

<p>
    <?php

    if (isset($_POST["vorname"], $_POST["nachname"])) {
        $firstname = $_POST["vorname"];
        $lastname = $_POST["nachname"];

        echo("Hallo " . $firstname . " " . $lastname . "!");

    }

    ?>
</p>

</body>
</html>