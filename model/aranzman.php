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

    public static function sortTable($conn){
        $q = "SELECT * FROM Aranzmani ORDER BY Cena ASC";
        return $conn->query($q);
    }

    
}

?>