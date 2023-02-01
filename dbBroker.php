<?php

$host = "localhost";
$db = "putovanja";
$korisnickoIme = "root";
$lozinka = "";

$conn = new mysqli($host, $korisnickoIme, $lozinka, $db);

if($conn->connect_errno){
    exit("Neuspešna konekcija! >>"  . $conn->connect_errno);
}


?>