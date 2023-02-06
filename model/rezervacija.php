<?php

class Rezervacija{

    public $Idrezervacije;
    public $Aranzman;

    public function __construct($Idrezervacije, $Aranzman)
    {
        $this->Idrezervacije = $Idrezervacije;
        $this->Aranzman = $Aranzman;
    }

    public static function add($Aranzman, mysqli $conn){
        $q = "INSERT INTO rezervacija(Aranzman) VALUES($Aranzman)";
        return $conn->query($q);
    }

    public static function getAll($conn){
        $q = "SELECT IdAranzmana, Naziv, BrojDana from Aranzmani where IdAranzmana in (select Aranzman from Rezervacija)";
        return $conn->query($q);
    }

    public static function delete($Aranzman, mysqli $conn)
    {
        $q = "DELETE FROM Rezervacija WHERE Aranzman=$Aranzman";
        return $conn->query($q);
    }

    public static function getByCity($Naziv, $conn){
        $q = "SELECT * FROM Aranzmani WHERE IdAranzmana IN (SELECT Aranzman FROM Rezervacija) AND Naziv = '$Naziv';";
        return $conn->query($q);
    }
}


?>