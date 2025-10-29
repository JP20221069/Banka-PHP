<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Banka</title>
        <link rel="stylesheet" href="style/mystyle.css"/>
    </head>
    <body>
       <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="isplata.php">Isplata</a></li>
        <li><a href="uplata.php">Uplata</a></li>
        <li><a href="prenos.php">Prenos</a></li>
        <li><a href="stanje.php">Stanje</a></li>
    </ul> 
        <?php
            include_once "Controller\RacunController.php";
            include_once "Utility.php";
            if(isset($_POST["dugme"]))
            {
                $r = new RacunController();
                $r->Podigni($_POST["novac"], $_POST["br_racuna"]);
                Utility::alertBox("Uspesno ste isplatili novac!");
            }
        ?>
        <form method="POST" class="forma">
            Broj racuna: <input type="text" name="br_racuna" id="br_racuna"/> <br> <br>
            Iznos: <input type="number" name="novac" id="novac"/> <br> <br>
            <input type="submit" name="dugme" value="Isplati"/>
        </form>
    </body>
</html>
