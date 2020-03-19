<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PROJECT WORK</title>
    <link rel="stylesheet" href="styles/style.css">
  </head>
  <body>
    <!-- Project-work2 je isti kao i prva verzija.Jedina razlika je što se ovdje
    tabela iscrtava php kodom koji se nalazi u fajlu icrtajtabelu.php -->
    <?php include "iscrtajtabelu.php";?>

    <!-- Javascript kod u fajlu calculator.js povezuje polja tabele sa akcijama korisnika, tj.
    poslije klika korisnika ispisuje rezultat na ekranu, nakon čega šalje podatke
    web serveru za upis operacije u bazu podataka.-->

    <script src="scripts/calculator1.js"></script>

    <!-- HTML element koji služi za informisanje korisnika o uspješnosti/neuspješnosti
    upisa podataka u bazu podataka na serveru. -->
    <p id="info"></p>
  </body>
</html>
