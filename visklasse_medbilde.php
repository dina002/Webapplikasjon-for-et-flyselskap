<?php include("incl/start.php"); ?>

<article>

    </article>
    <br><br><br>
    <?php
    @session_start();
    @$innloggetbruker=$_SESSION["brukernavn"];

    if(!$innloggetbruker){
      print("Denne siden krever innlogging<br>");
    } else{
    ?>
<div class="col-sm-offset-2 col-sm-10">
  <br><br>
  <form method="post" id="form" class="form-horizontal" onsubmit="return validerRegistrerStudentdata()">
		<div class="form-group">
			<label for"klassekode" class="col-sm-2 control-label">Klassekode</label>
			 <div class="col-sm-10">
				 <select name="klassekode" id="klassekode" >
					 <?php include("listeboks-klasse.php"); ?>
				</select><br>
			</div>
		</div>
    <div class="form-group">
 		 <div class="col-sm-offset-2 col-sm-10">
 			 <input type="submit" class="btn btn-default" value="Fortsett" id="fortsett" name="fortsett" />
 			 <input type="reset" class="btn btn-default" value="Nullstill" name="nullstill" id="nullstill" /> <br />
 		 </div>
 	 </div>
  </form>
	<?php
  @$fortsett=$_POST["fortsett"];
  if($fortsett){
    $klassekode=$_POST["klassekode"];
    $del=explode(" ", $klassekode);
    $klassekod=$del[0];
    $fagnavn=$del[1];



    $sqlSetning="SELECT * FROM prg_student WHERE klassekode='$klassekod';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
    $antallRader=mysqli_num_rows($sqlResultat);

    print("<h3>Registrerte klasser</h3>");
    print("<table class='table table-striped'>");
    print("<thead><tr><th>Fornavn</th><th>Etternavn</th><th>Bilde</th></tr></thead><tbody><tr>");

	  for($r=1;$r<=$antallRader;$r++){
	    $rad=mysqli_fetch_array($sqlResultat);
      $klassekode=$rad["klassekode"];
      $fornavn=$rad["fornavn"];
      $etternavn=$rad["etternavn"];
      $bildenr=$rad["bildenr"];
      $sqlSetning1="SELECT * FROM prg_bilde WHERE bildenr='$bildenr';";
      $sqlResultat1=mysqli_query($db, $sqlSetning1) or die("Hei");
      $rad1=mysqli_fetch_array($sqlResultat1);
      $filnavn=$rad1["filnavn"];
      
	    print("<tr><td>$fornavn</td><td>$etternavn</td><td><a href='https://home.hbv.no/phptemp/146813/bilde/$filnavn'><img style='width:50px;'src='https://home.hbv.no/phptemp/146813/bilde/$filnavn' target='_blank'></a></td></tr>");
	  }
				print("</tr></tbody></table>");
  }
}
	?>




</div>
<?php include("incl/slutt.php"); ?>
