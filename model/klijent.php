<?php

class Klijent{

    public $IdKlijenta;
    public $ImePrezime;
    public $KorisnickoIme;
    public $Lozinka;

    public function __construct($IdKlijenta, $ImePrezime, $KorisnickoIme, $Lozinka)
    {
        $this->IdKlijenta = $IdKlijenta;
        $this->ImePrezime = $ImePrezime;
        $this->KorisnickoIme = $KorisnickoIme;
        $this->Lozinka = $Lozinka;
    }

    public static function login($KorisnickoIme, $Lozinka, mysqli $conn){
        $q = "SELECT * FROM klijent WHERE KorisnickoIme= '$KorisnickoIme' AND Lozinka ='$Lozinka' LIMIT 1";
        return $conn->query($q);
    }
}

?>