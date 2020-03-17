var tabela = document. createElement("TABLE");
tabela.setAttribute("id", "mojaTabela");
tabela.createCaption();
tabela.caption.innerHTML="Tablica množenja";
document.body.appendChild(tabela);

//čim se prvi red doda tabeli, automatski se kreira tbody,
//zato se prvo poziva ova funkcija
//u suprotnom bi svi redovi bili dodati zaglavlju tabele
kreirajTijeloTabele();
kreirajZaglavlje();

function kreirajZaglavlje(){
	//kreiranje reda zaglavlja tabele
	let zaglavlje= tabela.createTHead();
	let red= zaglavlje.insertRow();
	//ubacivanje naslovnih kolona u zaglavlje tabele
	var tekst, th;
	for (var i=0; i<=10; i++){
		th=document.createElement("th");
		if (i==0){
			th.setAttribute("id", "rupa");
			tekst=document.createTextNode("");
		}
		else
			tekst=document.createTextNode(i);
		th.appendChild(tekst);
		red.appendChild(th);
	}
}

function kreirajTijeloTabele(){
	var red, th, td, tekst;
	//u vanjskoj petlji se kreiraju redovi tabele, jedan po jedan
	for (var i=1; i<=10; i++){
		red=tabela.insertRow();
		//u unutrašnjoj petlji se kreiraju ćelije i ubacuju u red
		for (var j=0;j<=10;j++){
			//prva ćelija u redu treba da bude naslovna
			if (j==0){
				th=document.createElement("th");
				tekst=document.createTextNode(i);
				th.appendChild(tekst);
				red.appendChild(th);
			}
			else
				td=red.insertCell();
		}
	}
}
