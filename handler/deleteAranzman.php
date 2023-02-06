<?php

require "../dbBroker.php";
require "../model/aranzman.php";

if (isset($_POST["IdAranzmana"])) {

    $status = Aranzman::deleteById($_POST['IdAranzmana'], $conn);

    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed";
    }
}

?>