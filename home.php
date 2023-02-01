

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
    
<div class="naslovIza">
    <div class="col-md-3" style="color: black;"><h1>Zakažite svoje letovanje na vreme!</h1></div> 
</div> 

<div class="meni">
    <div class="col-md-2">
        <button id="btn-zakazi" class="dugme" 
        style="background-color: teal; border: 1px solid white; "> Zakaži putovanje</button>
    </div>
    <div class="col-md-4">
        <button id="btn-prikazi" type="button" class="dugme"
                style="background-color: teal; border: 1px solid white;" >Prikaži zakazana putovanja</button>

    </div>
    <div class="col-md-5">
        <button id="btn-obrisi" class="dugme"
                style="background-color:  teal; border: 1px solid white;" > Otkaži putovanje</button>
        <input type="text" id="myInput" onkeyup="funkcijaZaPretragu()" placeholder="Pretrazi kolokvijume po predmetu" hidden>
    </div>
</div>


<section class="ftco-section">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-bordered table-dark table-hover">
						  <thead>
						    <tr>
						      <th>#</th>
						      <th>Naziv aranžmana</th>
						      <th>Cena</th>
						      <th>Broj dana</th>
						    </tr>
						  </thead>
						  <tbody class="tableBody">
							
						    <tr id = 'ar-<?php echo $red['IdAranzmana']?>'>
						      <th scope="row"><?php echo $red['IdAranzmana']?></th>
						      <td><?php echo $red['Naziv']?></td>
						      <td><?php echo $red['Cena']?></td>
						      <td><?php echo $red['BrojDana']?></td>
							  <td class="radio"><input type="radio" name = "izaberi" value=<?php echo $red["IdAranzmana"] ?>></td>
						    </tr>
													
						  </tbody>
						</table>
					</div>
                    
				</div>
			</div>
		</div>
	</section>





</body>
</html>