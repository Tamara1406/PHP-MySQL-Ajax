<?php

class Aranzman{

    public $IdAranzmana;
    public $Naziv;
    public $Cena;
    public $BrojDana;

    public function __construct($IdAranzmana=null, $Naziv=null, $Cena=null, $BrojDana=null)
    {
        $this->IdAranzmana = $IdAranzmana;
        $this->Naziv = $Naziv;
        $this->Cena = $Cena;
        $this->BrojDana = $BrojDana;
    }

    public static function getAll(mysqli $conn){
        $q = "SELECT * FROM aranzmani";
        return $conn->query($q);
    }

    public static function add($Naziv, $Cena, $BrojDana, mysqli $conn)
    {
        $q = "INSERT INTO Aranzmani(Naziv, Cena, BrojDana) VALUES('$Naziv', $Cena, $BrojDana)";
        return $conn->query($q);
    }

    public static function deleteById($IdAranzmana, mysqli $conn)
    {
        $q = "DELETE FROM Aranzmani WHERE IdAranzmana=$IdAranzmana";
        return $conn->query($q);
    }
}

?>