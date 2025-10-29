<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Racun
 *
 * @author PECA
 */
class Racun {
    
    private $brojRacuna;
    private $ime;
    private $prezime;
    private $stanje;
    
    public function getBrojRacuna() {
        return $this->brojRacuna;
    }

    public function getIme() {
        return $this->ime;
    }

    public function getPrezime() {
        return $this->prezime;
    }

    public function getStanje() {
        return $this->stanje;
    }

    public function setBrojRacuna($brojRacuna) {
        $this->brojRacuna = $brojRacuna;
    }

    public function setIme($ime) {
        $this->ime = $ime;
    }

    public function setPrezime($prezime) {
        $this->prezime = $prezime;
    }

    public function setStanje($stanje) {
        $this->stanje = $stanje;
    }
        
    public function __construct($brojRacuna, $ime, $prezime, $stanje) {
        $this->setBrojRacuna($brojRacuna);
        $this->setIme($ime);
        $this->setPrezime($prezime);
        $this->setStanje($stanje);
    }

    
}
