<?php

require "../dbBroker.php";
require "../model/aranzman.php";

$result = Aranzman::sortTable($conn);

if ($result) {
    while ($red = $result->fetch_array()) {
        echo json_encode($red);
    }
} else {
    echo "Failed";
}