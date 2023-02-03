<?php

require 'model/klijent.php';
require 'dbBroker.php';

session_start();

if (isset($_POST['korisnickoIme']) && isset($_POST['lozinka'])) {
    $korIme = $_POST['korisnickoIme'];
    $lozinka = $_POST['lozinka'];

    $klijent = Klijent::login($korIme, $lozinka, $conn);

    if($klijent->num_rows==1){

		echo "Uspesno ste se prijavili!";
		
		$_SESSION['Id'] = $klijent->IdKlijenta;
		header("Location: home.php");
		exit();
	}else{
		echo "Niste dobro uneli lozinku ili korisnicko ime!";
	}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href = "css/style.css">
    <title>Putovanja</title>
</head>
<body>
<div class="prijava-form">
            <form method="POST" action="#">
                <div class="container">
                    <label class="korisnickoIme">Korisnicko ime</label>
                    <input type="text" name="korisnickoIme" class="form-control"  required>
                    <br>
                    <label for="lozinka">Lozinka</label>
                    <input type="password" name="lozinka" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-prijava" name="prijaviSe">Prijavi se</button>
                </div>

            </form>
        
    </div>
</body>
</html>