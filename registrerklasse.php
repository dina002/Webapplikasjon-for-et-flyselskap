<?php include("incl/start.php"); ?>

<article>
	<br><br><br>
	<?php
	@session_start();
  @$innloggetbruker=$_SESSION["brukernavn"];

  if(!$innloggetbruker){
    print("Denne siden krever innlogging<br>");
  } else{
	?>
	<h1 class="page-header">Registrer klasse</h1>
    <form method="post" id="form" class="form-horizontal" onsubmit="return validerRegistrerKlassedata()">
			<div class="form-group">
				<label for"klassekode" class="col-sm-2 control-label">Klassekode</label>
				 <div class="col-sm-10">
					 <input type="text" class="form-control" name="klassekode" id="klassekode" required/>  <br />
				</div>
			</div>
		<div class="form-group">
			<label for"fraflyplass" class="col-sm-2 control-label">Klassenavn</label>
			 <div class="col-sm-10">
				 <input type="text" class="form-control" name="fagnavn" id="fagnavn" required/>  <br />
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

	function lovligKlassekode($klassekode){
		$lovligKlassekode=true;
		$siste=$klassekode[strlen($klassekode)-1];
		if(!$klassekode){
			$lovligKlassekode=false;
		}
		else if(strlen($klassekode)<3){
			$lovligKlassekode=false;
		}
		else if(!is_numeric($siste)){
			$lovligKlassekode=false;
		}
		else{
			$klassekodeLengde=strlen($klassekode)-2;
			for($r=0;$r<=$klassekodeLengde;$r++){
				$char=$klassekode[$r];
				if($char<"A"||$char>"Z"){
					$lovligKlassekode=false;
				}
			}
			if(!is_numeric(strlen($klassekode)-1)){
				$lovligKlassekode=false;
			}
		}
		return $lovligKlassekode;
	}

	if($fortsett){
	  @$klassekode=$_POST["klassekode"];
	  @$fagnavn=$_POST["fagnavn"];
		$lovligKlassekode=lovligKlassekode($klassekode);

	  if(!$lovligKlassekode){
	    print("Klassekode ikke korrekt fylt ut");

	  }
		else if(!$fagnavn){
			print("Fagnavn må fylles ut");
		}
		else if(strlen($klassekode)<3){
			print("Klassekode må bestå av minst tre tegn!");
		}

	  else{
	    include("db-tilkobling.php");
	    $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
	    $sqlResultat=mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra database");
	    $antallRader=mysqli_num_rows($sqlResultat);/*0=finnes ikke 1=finnes fra før*/

	    if($antallRader!=0){
	      print("Synj, faget er allerede registrert");

	    }
	    else{
	      $sqlSetning="INSERT INTO klasse VALUES('$klassekode', '$fagnavn');";
	      mysqli_query($db, $sqlSetning) or die("Ikke mulig å registrere til database");
	      print("Deily, fag er nå registrert");
	    }

	  }
}
}
	?>
	<div id="melding"></div>
</div>
<?php include("incl/slutt.php"); ?>
