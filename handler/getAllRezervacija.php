<?php

require "../dbBroker.php";
require "../model/rezervacija.php";


    $status = Rezervacija::getAll($conn);

    if ($status) {
        while ($red = $status->fetch_array()) {
            echo json_encode($red);
        }
    } else {
        echo $status;
        echo "Failed";
    }

?>