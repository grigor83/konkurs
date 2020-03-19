<?php
//Sve operacije potrebne za manipulisanje bazom podataka (kreiranje db, kreiranje
//tabele u bazi, upisivanje reda u tabelu) se nalaze u ovoj klasi.
//Prvom naredbom u skripti se kreira novi objekat klase calculator.Zatim se u
//samom konstruktoru klase kaskadno, u zavisnosti od rezultata komunikacije sa
//bazom, pokreće čitava procedura za upis nove operacije u tabelu.
$digitron=new calculator();

                  //Klasa calculator i njene funkcije
class calculator{

	function __construct (){
		$this->unesiOperaciju();
	}

	public function unesiOperaciju(){
		$path = $_SERVER['DOCUMENT_ROOT'] . "/mojiprojekti/project-work/includes/config.php";
		require_once $path;

		try{
			//uspostavi konekciju
			$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="use $dbname";
			$db->exec($sql);
			echo " <br>Uspjesno ste se konektovali";
			$this->umetniRed($servername,$username,$password,$dbname,$tablename,
                              $sqlKreirajTabelu,$sqlKreirajDB, $db);
		}
		catch(PDOException $e){
      			$db=null;
			echo ("Konektovanje na DB nije uspjelo:<br>" . $e->getMessage());
			echo ("<br>....Kreiram novu DB.....");
			$this->kreirajDBiTabelu($servername,$username,$password,$dbname,$tablename,
                              $sqlKreirajTabelu,$sqlKreirajDB, $db);
		}
	}

    //Ova funkcija se poziva samo u slučaju da nije uspostavljena konekcija sa
    //mysql serverom, ili ako sama baza još uvijek nije kreirana.
	public function kreirajDBiTabelu($servername,$username,$password,$dbname,$tablename,
                                    $sqlKreirajTabelu,$sqlKreirajDB, $db){
		try{
			$db = new PDO("mysql:host=$servername", $username, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//kreiraj DB ako je nema
			$db->exec($sqlKreirajDB);
			echo "<br>DB je uspješno kreirana";
			$sql="use $dbname";
			$db->exec($sql);
			//i kreiraj tabelu u njoj ako je nema
			$db->exec($sqlKreirajTabelu);
			//zatim unesi novi red u db
			$this->umetniRed($servername,$username,$password,$dbname,$tablename,
                              $sqlKreirajTabelu,$sqlKreirajDB, $db);
		}
		catch(PDOException $e){
      			$db=null;
			die ("<br>Kreiranje DB nije uspjelo : " . $e->getMessage());
		}
	}

	public function umetniRed($servername,$username,$password,$dbname,$tablename,
                          $sqlKreirajTabelu,$sqlKreirajDB, $db){
					//Prvo se raščlanjuju podaci pristigli od klijenta.
		$data = $_POST["red"];
		$klik = explode(" ",$data);
		$prvicinilac=$klik[0];
		$drugicinilac=$klik[1];
		$rezultat=$prvicinilac*$drugicinilac;
		$datumKlika=$klik[2]." ".$klik[3];

		try{
			$sql="INSERT INTO $tablename (factor1, factor2,operation,result,operation_date)
											VALUES ($prvicinilac, $drugicinilac, '*', $rezultat, '$datumKlika')";
			$db->exec($sql);
						echo " <br>Izvrsena operacija je unijeta u db";
			$db=null;
		}
		catch(PDOException $e){
      		$db=null;
			echo ("<br>Umetanje reda u tabelu DB nije uspjelo:<br>" . $e->getMessage());
      $this->kreirajDBiTabelu($servername,$username,$password,$dbname,$tablename,
                              $sqlKreirajTabelu,$sqlKreirajDB, $db);
		}
	}
}
?>
