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
include_once "Model\Racun.php";
include_once "Broker\DBBroker.php";
class RacunController {
    
    private $dbb;
    public function __construct() 
    {
        $this->dbb = new DBBroker("banka", "root", "", "localhost");
    }
    
    function VratiRacun(string $brojRacuna)
    {
        $query = "SELECT * FROM racuni WHERE brojracuna='$brojRacuna';";
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
        $query = "SELECT stanje FROM racuni WHERE brojracuna='$brojRacuna';";
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
        $query = "UPDATE racuni SET stanje=$novoStanje WHERE brojracuna='$brojRacuna';";
        $rezultat = $this->dbb->executeNonQuery($query);
        if($rezultat==false)
        {
            die("Greska: Neuspesno azurirano stanje!");
        }
    }
    
    function VratiSveRacune()
    {
        $query = "SELECT * FROM racuni;";
        $rezultat = $this->dbb->executeQuery($query);
        $vracanje = [];
        for($i=0;$i<count($rezultat);$i++)
        {
            $red = $rezultat[$i];
            $vracanje[] = new Racun($red["brojracuna"], $red["ime"], $red["prezime"], $red["stanje"]);
        }
        return $vracanje;
    }
    
    function Uplati(int $novac,string $brojRacuna)
    {
        $racun = $this->VratiRacun($brojRacuna);
        $this->AzurirajStanje($racun->getBrojRacuna(), $racun->getStanje()+$novac);
        
    }
    
    function Podigni(int $novac,string $brojRacuna)
    {
        $racun = $this->VratiRacun($brojRacuna);
        if($racun->getStanje()>=$novac) // OK
        {
            $this->AzurirajStanje($racun->getBrojRacuna(), $racun->getStanje()-$novac);
        }
        else
        {
            die("Greska: Nema dovoljno sredstava na racunu.");
        }
    }
    
    function Prenesi(int $novac,string $brojRacuna1,string $brojRacuna2)
    {
        $racun1 = $this->VratiRacun($brojRacuna1);
        $racun2 = $this->VratiRacun($brojRacuna2);
        if($racun1->getBrojRacuna()==$racun2->getBrojRacuna())
        {
            die("Greska: Nemoguc prenos.");
        }
        if($racun1->getStanje()>=$novac) // OK
        {
            $this->AzurirajStanje($racun1->getBrojRacuna(), $racun1->getStanje()-$novac);
            $this->AzurirajStanje($racun2->getBrojRacuna(), $racun2->getStanje()+$novac);
        }
        else
        {
            die("Greska: Nema dovoljno sredstava na racunu sa kog prenosite sretstva.");
        }
    }
    
    
}
