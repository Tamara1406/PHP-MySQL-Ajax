<?php

require "../dbBroker.php";
require "../model/rezervacija.php";

if (isset($_POST['Naziv'])) {

    $status = Rezervacija::getByCity($_POST['Naziv'], $conn);
    
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