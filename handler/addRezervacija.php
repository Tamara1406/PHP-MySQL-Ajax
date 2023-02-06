<?php

require "../dbBroker.php";
require "../model/rezervacija.php";

if (isset($_POST["IdAranzmana"])) {

    $status = Rezervacija::add($_POST["IdAranzmana"], $conn);

    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed";
    }
}

?>