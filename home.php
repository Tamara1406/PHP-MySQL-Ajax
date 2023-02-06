<?php

require "dbBroker.php";
require "model/aranzman.php";
require "model/rezervacija.php";

session_start();


//if(empty($_SESSION['user']) || $_SESSION['user'] == ''){
//	header("Location: login.php");
//	exit();
//}

$result = Aranzman::getAll($conn);

if(!$result){
	echo "Greska prilikom izvodjenja upita!";
	die();
}

if($result->num_rows == 0){
	echo "Nema dostupnih aranzmana!";
	die();
}

$result1 = Rezervacija::getAll($conn);

if(!$result1){
	echo "Greska prilikom izvodjenja upita!";
	die();
}

if($result1->num_rows == 0){
	echo "Nema zakazanih putovanja!";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <title>Document</title>
</head>
<body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/hom.js"></script>

	



<div class="naslovIza">
    <div class="col-md-3" style="color: black;"><h1>Zakažite svoje letovanje na vreme!</h1></div> 
</div> 



<div style= "margin-left: 500px; margin-right: 500px;" class="naslovIza" >
<div style="display: flex; justify-content: center;"><h1 class="naslov">Dostupni aranžmani</h1></div>
</div>
	<div class = "tabele">
		<section class="ftco-section">
		<div class="container" style="background-color: cadetblue; margin-top: 15px; margin-left: 40px; margin-right: 40px; border-radius: 15px;">

			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-bordered table-dark table-hover">
						  <thead>
						    <tr>
						      <th>#</th>
						      <th>Naziv</th>
						      <th>Cena</th>
						      <th>Broj dana</th>
						    </tr>
						  </thead>
						  <tbody class="tableBody">
						  <?php
								while($red = $result->fetch_array()){
							?>
						    <tr id = 'aranzman-<?php echo $red['IdAranzmana']?>'>
						      <th scope="row"><?php echo $red['IdAranzmana']?></th>
						      <td><?php echo $red['Naziv']?></td>
						      <td><?php echo $red['BrojDana']?></td>
							  <td><?php echo $red['Cena']?></td>
							  <td class="radio"><input type="radio" name = "izaberi" value=<?php echo $red["IdAranzmana"] ?>></td>
						    </tr>
							<?php }
							?>
						  </tbody>
						</table>
					</div>
                    
				</div>
			</div>
		</div>
		</section>
	</div>
</div>


<div class="meni" style="margin-left: 100px;">
	<div class="col-md-3">
        <button id="btn-zakazi"  class="dugme" onclick="dodajRezervaciju()" style="background-color: rgb(120, 197, 199); border: 1px solid white; "> 
					Zakaži putovanje</button>
		</div>
    <div class="col-md-3">
        <button id="btn-pretrazi" onclick="pretrazi()" type="button" class="dugme" style="background-color: rgb(120, 197, 199); border: 1px 
					solid white;" >Pretraži po mestu</button>
		<input id = "myInput" type="text" placeholder="Ime grada">
    </div>
    <div class="col-md-3">
	<button id="btn-izbrisi"  class="dugme"  onclick ="obrisi()"
                style="background-color: rgb(120, 197, 199); border: 1px solid white;" > Otkaži putovanje</button>
    </div>
</div>
	



<div style= "margin-left: 500px; margin-right: 500px; margin-top: 50px;" class="naslovIza" >
<div style="display: flex; justify-content: center;"><h1 class="naslov">Zakazana putovanja</h1></div>
</div>
	<div class = "tabele">
		<section class="ftco-section">
		<div class="container" style="background-color: cadetblue; margin-top: 15px; margin-left: 40px; margin-right: 400px; border-radius: 15px;">

			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table id = "tabela" class="table table-bordered table-dark table-hover">
						  <thead>
						    <tr>
							  <th>#</th>
						      <th>Aranžman</th>
							  <th>Broj dana</th>
						    </tr>
						  </thead>
						  <tbody class="tableBody1">
						  <?php
								while($red = $result1->fetch_array()){
							?>
						    <tr id = 'rezervacija-<?php echo $red['IdAranzmana']?>'>
						      <th scope="row"><?php echo $red['IdAranzmana']?></th>
						      <td><?php echo $red['Naziv']?></td>
						      <td><?php echo $red['BrojDana']?></td>
						    </tr>
							<?php }
							?>
						  </tbody>
						</table>
					</div>
                    
				</div>
			</div>
		</div>
		</section>
	</div>
</div>

<div class="modal-footer">
<a href = "logout.php" style="position:absolute; top: 10px; right: 10px;"><button type="button" class="btn btn-default" >Odjavi se</button></a>
                </div>

	
	
	


<script>



function pretrazi() {

event.preventDefault();

let text = $('#myInput')[0].value;

if(text == ""){
	alert("Unesite autora")
	return
}

$('.tableBody1').empty()
$('#myInput').val("")


$.post("handler/getByCity.php", "Naziv=" + text, function (data) {
	let array = data.split("}")
	array.pop()
	array.forEach(element => {
		element = element + "}"
		let obj = JSON.parse(data)

		let row = $(`#aranzman-${obj.IdAranzmana} td`);

		$('#tabela tbody').append(`
		<tr id = 'aranzman-${obj.IdAranzmana}'>
				<th scope="row">${obj.IdAranzmana}</th>
				<td>${obj.Naziv}</td>
				<td>${obj.BrojDana}</td>
			</tr>
		`)

	});
})
}



	</script>



</body>
</html>