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
        include_once 'Utility.php';
        include_once 'Controller\RacunController.php';
            if(isset($_POST["dugme"]))
            {
                if(isset($_POST["br_racuna"]))
                {
                    $k = new RacunController();
                    Utility::alertBox($k->VratiStanje($_POST["br_racuna"]));
                }
            }
        
        ?>
        <form method="POST" class="forma">
            Izaberite racun: 
            <select name="br_racuna" id="br_racuna">
            <?php
            include_once 'Controller\RacunController.php';
                $k = new RacunController();
              
                $racuni = $k->VratiSveRacune();
                foreach($racuni as $r)
                {
                    echo "<option value=\"".$r->getBrojRacuna()."\">".$r->getBrojRacuna()."</option>";
                }
               
            ?>
                 </select>
            <input type="submit" name="dugme" value="Proveri stanje"/>
        </form>
    </body>
</html>
