var tabela=document.getElementById("mojaTabela");
var indeksReda, indeksKolone;

//U for-petlji se povezuju ćelije tabele sa onclick() događajem. Nakon klika
//na željeno polje tabele, podaci se prikazuju u toj ćeliji.
for (var i=1; i<tabela.rows.length; i++)
	for (var j=1; j<tabela.rows[i].cells.length; j++){
		tabela.rows[i].cells[j].onclick= function(){
			indeksReda=this.parentElement.rowIndex;
			indeksKolone=this.cellIndex;
			tabela.rows[indeksReda].cells[indeksKolone].innerHTML=indeksReda+" * "+ indeksKolone
																	+" = "+indeksReda*indeksKolone;
			//nakon što se podaci prikažu na ekranu, podaci se šalju serveru
			
			console.log(indeksReda+" "+ indeksKolone);

			posaljiPodatkeServeru(indeksKolone, indeksReda);
		}
	}

//Funkcija koja Ajax-om šalje prikupljene podatke serveru. Server upisuje podatke
//u bazu podataka i  nakon toga šalje informaciju klijentu o rezultatima upisa.
//Informacije o manipulaciji bazom podataka se upisuju u HTML pasus element "demo"
// bez ponovnog učitavanja sadržaja cijele stranice.
function posaljiPodatkeServeru(indeksKolone, indeksReda){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var pasus=document.getElementById("info");
			pasus.innerHTML =this.responseText;
		}
		};
  //Bilježenje vremena klika na tabelu u zadatom formatu.
	var d= new Date();
	var datum= d.toISOString().split("T")[0];
	var vrijeme=d.toISOString().split("T")[1].split(".")[0];
	vrijeme=d.getHours()+":"+vrijeme.slice(3);
	var vrijemeKlika=datum+" "+vrijeme;

  //Podaci se šalju web serveru upakovani u jedan string. Znak " " će se
  //koristiti za raščlanjivanje elemenata stringa sa serverske strane.
	xhttp.open("POST", "class/calculator.class.php", true);
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send("red="+indeksReda+" "+indeksKolone+" "+vrijemeKlika);
}
