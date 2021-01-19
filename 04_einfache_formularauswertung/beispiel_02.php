<!doctype html>
<html lang="de">
<head>
    <title>04: Beispiel 2</title>
    <meta charset="utf-8">
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<form action="beispiel_02.php" method="post">
    <fieldset style="width: 30%">
        <legend>Ihren Namen bitte:</legend>
        <label for="vorname">Vorname:</label><br>
        <input type="text" required name="vorname" id="vorname">
        <br><br>

        <label for="nachname">Nachname:</label><br>
        <input type="text" required name="nachname" id="nachname">
    </fieldset>
    <br>

    <fieldset style="width: 30%">
        <legend>Ihren Getränkewunsch bitte:</legend>

        <input type="radio" name="trinken" value="wasser" id="trinken-wasser" checked>
        <label for="trinken-wasser">Wasser</label><br>

        <input type="radio" name="trinken" value="tee" id="trinken-tee">
        <label for="trinken-tee">Tee</label><br>

        <input type="radio" name="trinken" value="cola" id="trinken-cola">
        <label for="trinken-cola">Cola</label><br>
    </fieldset>
    <br>

    <input type="submit" name="submitted">
</form>

<p>
    <?php

    if (isset($_POST["submitted"])) {

        $firstname = $_POST["vorname"];
        $lastname = $_POST["nachname"];
        $drink = ucfirst($_POST["trinken"]);


        echo("Hallo " . $firstname . " " . $lastname . ", ");
        echo("Sie hätten also gerne " . $drink . "?");

    }

    ?>
</p>

</body>
</html>