<?php

require "../dbBroker.php";
require "../model/rezervacija.php";

if (isset($_POST["Aranzman"])) {

    $status = Rezervacija::delete($_POST["Aranzman"], $conn);

    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed";
    }
}

?>