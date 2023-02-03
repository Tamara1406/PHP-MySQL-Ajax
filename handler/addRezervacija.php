<?php

require "../dbBroker.php";
require "../model/rezervacija.php";

if (isset($_POST['KorisnickoIme']) && isset($_POST["Aranzman"])) {

    $status = Rezervacija::add($_POST['KorisnickoIme'], $_POST["Aranzman"], $conn);

    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed";
    }
}

?>