<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Utility
 *
 * @author PECA
 */
class Utility {
    public static function alertBox($text)
    {
        echo '<script type="text/javascript"> window.alert("' . $text . '");</script>';
    }
}
