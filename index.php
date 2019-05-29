<?php
    include("incl/start.php");
 ?>

<?php  /* hoved  */
/*
/*  Programmet inneholder hovedsiden
*/

    @session_start();
    @$innloggetbruker=$_SESSION["brukernavn"];

    if(!$innloggetbruker){
      print("Denne siden krever innlogging<br>");
    }
    else{
            /*include("start.html");*/
            print("<h1 class='page-header'>Velkommen til startsiden (du er logget inn som $innloggetbruker) </h1> I menyen til venstre finner du ulike valg som kan utføres ved bruk av denne applikasjonen");
          /*  include("slutt.html");*/
        }

?>
<?php include("incl/slutt.php"); ?>
