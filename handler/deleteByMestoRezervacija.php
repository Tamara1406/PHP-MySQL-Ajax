<?php

require "../dbBroker.php";
require "../model/rezervacija.php";

if (isset($_POST["Naziv"])) {

    $status = Rezervacija::deleteByMesto($_POST["Naziv"], $conn);

    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed";
    }
}

?>