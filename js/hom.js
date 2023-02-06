function obrisi() {
	event.preventDefault();

    var dugme = $("input[type=radio]:checked");
	let IdAranzmana =dugme[0].value
    request = $.ajax({
      url: "handler/deleteRezervacija.php",
      type: "post",
      data: "Aranzman=" + IdAranzmana
    });
    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        alert("Rezervacija je obrisana");
        checked.closest("tr").remove();
        console.log("Rezervacija je obrisana ");
        
      } else {
        console.log("Rezervacija nije obrisana " + response);
        alert("Rezervacija nije obrisana");
      }
    });
  };

  function dodajRezervaciju(){
			
    event.preventDefault();

    var dugme = $("input[type=radio]:checked")
    let IdAranzmana =dugme[0].value

    request = $.ajax({
          url: "handler/addRezervacija.php",
          type: "post",
           data: "IdAranzmana=" + IdAranzmana
      });

      request.done(function (response, textStatus, jqXHR) {

          if (response === "Success") {
              alert("Rezervacija je dodata")
       append(IdAranzmana);

        } else {
              alert("Rezervacija nije dodata")
        }
      })

        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.log("Desila se greska: " + textStatus, errorThrown)
      })
    

}

function append(IdAranzmana){

    let row = $(`#aranzman-${IdAranzmana} td`);

    console.log(row);

    $("#tabela tbody").append(`
      <tr id = 'aranzman-${IdAranzmana}'>
        <th scope="row">${IdAranzmana}</th>	
        <td>${row[0].outerText}</td>			  
      </tr>
    `)
}
  