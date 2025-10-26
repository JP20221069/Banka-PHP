<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of RacunController
 *
 * @author PECA
 */
include_once "../Model/Racun.php";
include_once "../Broker/DBBroker.php";
class RacunController {
    
    private $dbb;
    public function __construct() 
    {
        $this->dbb = new DBBroker("banka", "root", "", "localhost");
    }
    
    function VratiRacun(string $brojRacuna)
    {
        $query = "SELECT * FROM Racun WHERE brojracuna='$brojRacuna';";
        $rezultat = $this->dbb->executeQuery($query);
        if(count($rezultat)==0)
        {
            die("Greska: Los broj racuna");
        }
        $red = $rezultat[0];
        return new Racun($red["brojracuna"], $red["ime"], $red["prezime"], $red["stanje"]);
    }
    
    function VratiStanje(string $brojRacuna)
    {
        $query = "SELECT stanje FROM Racun WHERE brojracuna='$brojRacuna';";
        $rezultat = $this->dbb->executeQuery($query);
        if(count($rezultat)==0)
        {
            die("Greska: Los broj racuna");
        }
        $red = $rezultat[0];
        return $red["stanje"];
    }
    
    function AzurirajStanje(string $brojRacuna,int $novoStanje)
    {
        $query = "UPDATE racuni SET stanje=$novoStanje WHERE brojracuna=$brojRacuna;";
        $rezultat = $this->dbb->executeNonQuery($query);
        if($rezultat==false)
        {
            die("Greska: Neuspesno azurirano stanje!");
        }
    }
    
    function Uplati(int $novac,string $brojRacuna)
    {
        
    }
    
    function Podigni(int $novac,string $brojRacuna)
    {
        
    }
    
    function Prenesi(int $novac,string $brojRacuna1,string $brojRacuna2)
    {
        
    }
    
    
}
