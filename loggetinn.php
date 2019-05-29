
<?php include("incl/start.php"); ?>

<article>
	<h1 class="page-header">Velkommen</h1>
	<br><br><br>
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
              print("<h3>Velkommen til startsiden (du er logget inn som $innloggetbruker) </h3> I menyen til venstre finner du ulike valg som kan utføres ved bruk av denne applikasjonen");
            /*  include("slutt.html");*/

?>
    </article>
<div class="col-sm-offset-2 col-sm-10">
	<div id="melding"></div>
</div>
<?php include("incl/slutt.php"); ?>
<?php
}
?>
