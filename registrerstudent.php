<?php include("incl/start.php"); ?>

<article>
	<br><br><br>
	<?php
	@session_start();
  @$innloggetbruker=$_SESSION["brukernavn"];
	$dagensDato=date("Y-m-d");
  if(!$innloggetbruker){
    print("Denne siden krever innlogging<br>");
  } else{
	?>
	<h1 class="page-header">Registrer student</h1>
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
		<label for"fraflyplass" class="col-sm-2 control-label">Brukernavn</label>
		 <div class="col-sm-10">
			 <input type="text" class="form-control" name="brukernavn" id="brukernavn"  required/>  <br />
		 </div>
	 </div>
	<div class="form-group">
		<label for"tilflyplass" class="col-sm-2 control-label">Fornavn</label>
		 <div class="col-sm-10">
			 <input type="text" class="form-control"name="fornavn" id="fornavn" required/>  <br />
		 </div>
	 </div>
	 <div class="form-group">
 		<label for"tilflyplass" class="col-sm-2 control-label">Etternavn</label>
 		 <div class="col-sm-10">
 			 <input type="text" class="form-control"name="etternavn" id="etternavn" required/>  <br />
 		 </div>
 	 </div>
	 <div class="form-group">
 		<label for"tilflyplass" class="col-sm-2 control-label">Neste leveringsfrist</label>
 		 <div class="col-sm-10">
 			 <input type="text" name="lfrist" id="lfrist" required value="<?php echo"$dagensDato" ?>">  <br />
 		 </div>
 	 </div>
	 <div class="form-group">
 		<label for"tilflyplass" class="col-sm-2 control-label">Bildenr</label>
 		 <div class="col-sm-10">
			 <select name="bildenr">
				 <?php include("listeboks-bilde.php"); ?>
			 </select>  <br />
 		 </div>
 	 </div>
	 <div class="form-group">
		 <div class="col-sm-offset-2 col-sm-10">
			 <input type="submit" class="btn btn-default" value="Fortsett" id="fortsett" name="fortsett" />
			 <input type="reset" class="btn btn-default" value="Nullstill" name="nullstill" id="nullstill" /> <br />
		 </div>
	 </div>
</form>

    </article>
<div class="col-sm-offset-2 col-sm-10">
	<?php
		@$fortsett=$_POST["fortsett"];

		if($fortsett){
		@$klassekode=$_POST["klassekode"];
		$del=explode(" ", $klassekode);
		$klassekode1=$del[0];
		@$brukernavn=$_POST["brukernavn"];
		@$fornavn=$_POST["fornavn"];
		@$etternavn=$_POST["etternavn"];
		$lfrist=$_POST["lfrist"];
		$bildenr=$_POST["bildenr"];
		$del=explode(" ", $bildenr);
		$bildenr1=$del[0];

		if(!$klassekode||!$brukernavn||!$fornavn || !$etternavn||!$lfrist||!$bildenr1){
			print("Synj, alle felt må fylles ut");

		}
		else{
			include("db-tilkobling.php");
			$sqlSetning="SELECT * FROM prg_student WHERE klassekode='$klassekode1' AND brukernavn='$brukernavn';";
			$sqlResultat=mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra database");
			$antallRader=mysqli_num_rows($sqlResultat);/*0=finnes ikke 1=finnes fra før*/

			if($antallRader!=0){
				print("Synj, studenten er allerede registrert");

			}
			else{
				$sqlSetning="INSERT INTO prg_student VALUES('$brukernavn', '$fornavn', '$etternavn', '$klassekode1', '$lfrist', '$bildenr1' );";
				print("$brukernavn, $fornavn, $etternavn, $klassekode1, $lfrist, $bildenr1<br>");
				mysqli_query($db, $sqlSetning) or die("Ikke mulig å registrere til database");
				print("Deily, studenten er nå registrert");
			}

		}
	}
}
	?>
	<div id="melding"></div>
</div>
<?php include("incl/slutt.php"); ?>
