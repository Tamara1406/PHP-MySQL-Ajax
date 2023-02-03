<?php

require "../dbBroker.php";
require "../model/rezervacija.php";

if (isset($_POST['KorisnickoIme'])) {

    $status = Rezervacija::getByUserName($_POST['KorisnickoIme'], $conn);

    if ($status) {
        while ($red = $status->fetch_array()) {
            echo json_encode($red);
        }
    } else {
        echo $status;
        echo "Failed";
    }
}

?>