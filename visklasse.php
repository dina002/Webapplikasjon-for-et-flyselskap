<?php include("incl/start.php"); ?>

<article>

    </article>
<div class="col-sm-offset-2 col-sm-10">
  <br><br><br>
	<?php
  @session_start();
  @$innloggetbruker=$_SESSION["brukernavn"];

  if(!$innloggetbruker){
    print("Denne siden krever innlogging<br>");
  } else{
	print("<table class='table table-striped'>");
  print("<thead><tr><th>Klassekode</th><th>Klassenavn</th></tr></thead><tbody><tr>");
	  include("db-tilkobling.php");
	  $sqlSetning="SELECT * FROM prg_klasse ORDER BY klassekode";
	  $sqlResultat=mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
	  $antallRader=mysqli_num_rows($sqlResultat);

	  print("<h3>Registrerte klasser</h3>");
	  for($r=1;$r<=$antallRader;$r++){
	    $rad=mysqli_fetch_array($sqlResultat);
	    $klassekode=$rad["klassekode"];
	    $klassenavn=$rad["fagnavn"];
	    print("<tr><td>$klassekode</td> <td>$klassenavn</td></tr>");
	  }
				print("</tr></tbody></table>");
      }
	?>




</div>
<?php include("incl/slutt.php"); ?>
