<?php
$brojRedova=10;
$brojKolona=10;

echo "<table id='mojaTabela'>";
echo "<caption>Tablica množenja</caption>";

ištampajZaglavlje($brojKolona);
ištampajTijeloTabele($brojRedova, $brojKolona);
echo "</table>";

function ištampajZaglavlje($brojKolona){
	echo "<thead>";

	for ($i=0; $i<=$brojKolona; $i++)
		if ($i==0)
			echo "<th id='rupa'></th>";
		else
			echo "<th>$i</th>";

	echo "</thead>";
}

function ištampajTijeloTabele($brojRedova, $brojKolona){
	echo "<tbody>";

	for ($red=1; $red<=$brojRedova; $red++){
		echo "<tr>";
		for ($kolona=0; $kolona<=$brojKolona; $kolona++)
			if ($kolona==0)
				echo "<th>$red</th>";
			else
				echo "<td></td>";
		echo "</tr>";
	}

	echo "</tbody>";
}
?>
