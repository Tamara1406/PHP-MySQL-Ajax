<?php

require "../dbBroker.php";
require "../model/rezervacija.php";

if (isset($_POST['IdRezervacije'])) {

    $status = Rezervacija::deleteById($_POST['IdRezervacije'], $conn);

    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed";
    }
}

?>