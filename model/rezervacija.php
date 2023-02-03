<?php

class Rezervacija{

    public $Idrezervacije;
    public $KorisnickoIme;
    public $Aranzman;

    public function __construct($Idrezervacije, $KorisnickoIme, $Aranzman)
    {
        $this->Idrezervacije = $Idrezervacije;
        $this->KorisnickoIme = $KorisnickoIme;
        $this->Aranzman = $Aranzman;
    }

    public static function add($Aranzman, mysqli $conn){
        $q = "INSERT INTO rezervacija(Aranzman) VALUES($Aranzman)";
        return $conn->query($q);
    }

    public static function getAll($conn){
        $q = "SELECT * FROM Rezervacija";
        return $conn->query($q);
    }

    public static function deleteById($IdRezervacije, mysqli $conn)
    {
        $q = "DELETE FROM Rezervacija WHERE IdRezervacije=$IdRezervacije";
        return $conn->query($q);
    }
}


?>