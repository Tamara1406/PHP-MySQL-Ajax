<?php

require "../dbBroker.php";
require "../model/aranzman.php";

if (isset($_POST['naziv']) && isset($_POST['cena']) && isset($_POST['brojDana'])) {

    $status = Aranzman::add($_POST['naziv'], $_POST['cena'], $_POST['brojDana'], $conn);

    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed";
    }
}

?>