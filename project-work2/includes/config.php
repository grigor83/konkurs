<?php
	$servername="localhost";
	$dbname="digitronDB";
	$tablename="tabelaDB";
	$username="root";
	$password="";
	$sqlKreirajDB="CREATE DATABASE IF NOT EXISTS $dbname";
	$sqlKreirajTabelu="CREATE TABLE IF NOT EXISTS $tablename (
					id 		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					factor1 INT(1) NOT NULL,
					factor2 INT(1) NOT NULL,
					operation VARCHAR(1) NOT NULL,
					result	INT(3)	NOT NULL,
					operation_date VARCHAR(20) NOT NULL
			)";
?>
