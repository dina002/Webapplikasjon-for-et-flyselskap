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
		print("<table class='table table-striped'>
	<thead>
	<tr>
	<th>Brukernavn</th>
	<th>Fornavn</th>
	<th>Etternavn</th>
  <th>klassekode</th>
  <th>Neste leveringsfrist</th>
  <th>Bildenr</th>
	</tr>
	</thead><tbody><tr>");
	  include("db-tilkobling.php");
	  $sqlSetning="SELECT * FROM prg_student";
	  $sqlResultat=mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
	  $antallRader=mysqli_num_rows($sqlResultat);

	  print("<h3>Registrerte studenter</h3>");
	  for($r=1;$r<=$antallRader;$r++){
	    $rad=mysqli_fetch_array($sqlResultat);
	    $brukernavn=$rad["brukernavn"];
	    $fornavn=$rad["fornavn"];
			$etternavn=$rad["etternavn"];
      $klassekode=$rad["klassekode"];
      $nlfrist=$rad["neste_leveringsfrist"];
      $bildenr=$rad["bildenr"];
	    print("<tr><td>$brukernavn</td> <td>$fornavn</td> <td>$etternavn</td><td>$klassekode</td><td>$nlfrist</td><td>$bildenr</td></tr>");
	  }
		print("</tr></tbody></table>");
  }
	?>
</div>
<?php include("incl/slutt.php"); ?>
