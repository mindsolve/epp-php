<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <link rel="stylesheet" type="text/css"   href="style.css" />
        <title>Aufgabe Weitsprung</title>
    </head>
    <body>
        <div class = "wrapper">
            <main>
                <h1>PHP-Kurs</h1>
                <h2>Kapitel 05 - Aufgabe zu var_dump()</h2>

                <h3>Pizza-Bestellung</h3>
                <form action = "index.php" method = "post">
                    <p>Gib deine Bestellung auf.</p>
                   
                    <div class = "inputbox">
                        <p><b>Dein Name</b></p>
                        <input type ="text"  maxlength = "30" placeholder ="Dein Name" required/>
                    </div>

                    <div class = "inputbox">
                    <p><b>Abholen oder Liefern?</b></p>
                        <select>
                            <option selected = "selected">Bitte wählen Sie!</option>
                            <option>Ich hole die Pizza ab</option>
                            <option>Die Bestellung bitte liefern</option>
                        </select>
                    </div>

                    <div class = "inputbox">
                    <p><b>Welche Pizza möchtest du?</b></p>
                        <label>Margherita</label><input type ="radio"/>
                        <label>Salami</label><input type ="radio"/>
                        <label>Spinat</label><input type ="radio"/>
                    </div>

                    <div class = "inputbox">
                    <p><b>Ein Getränk dazu?</b></p>
                        <label>Wasser</label><input type ="checkbox"/>
                        <label>Cola</label><input type ="checkbox"/>
                        <label>Fanta</label><input type ="checkbox"/>
                    </div>
                  
                    <div class = "inputbox">
                        <input type = "submit" name = "submit"/>
                    </div>
                </form>

                             
                <?php
                    if(isset($_POST["submit"]))
                    {
                        var_dump($_POST);     
                    }  

                ?>
                
        </main>
    </div>

    </body>
</html>