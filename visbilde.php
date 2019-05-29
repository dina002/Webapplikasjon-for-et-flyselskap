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
  print("
  <thead>
    <tr>
      <th>Bildenr</th>
      <th>Opplastningsdato</th><th>Filnavn</th><th>Beskrivelse</th></tr></thead><tbody><tr>");
	  include("db-tilkobling.php");
	  $sqlSetning="SELECT * FROM prg_bilde ORDER BY bildenr;";
	  $sqlResultat=mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
	  $antallRader=mysqli_num_rows($sqlResultat);

	  print("<h3>Registrerte Bilder</h3>");
	  for($r=1;$r<=$antallRader;$r++){
	    $rad=mysqli_fetch_array($sqlResultat);
	    $bildenr=$rad["bildenr"];
	    $opplastningsdato=$rad["opplastningsdato"];
      $beskrivelse=$rad["beskrivelse"];
      $filnavn=$rad["filnavn"];
	    print("<tr><td>$bildenr</td> <td>$opplastningsdato</td><td><a href='https://home.hbv.no/phptemp/146813/bilde/$filnavn'><img style='width:50px;'src='https://home.hbv.no/phptemp/146813/bilde/$filnavn' target='_blank'></a></td><td>$beskrivelse</td></tr>");
	  }
				print("</tr></tbody></table>");
      }
	?>




</div>
<?php include("incl/slutt.php"); ?>
