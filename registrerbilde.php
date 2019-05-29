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
	<h1 class="page-header">Registrer Bilde</h1>
    <form method="post" id="form" class="form-horizontal" onsubmit="return validerRegistrerKlassedata()" enctype="multipart/form-data">
			<div class="form-group">
				<label for"klassekode" class="col-sm-2 control-label">Bildenr</label>
				 <div class="col-sm-10">
					 <input type="text" class="form-control" name="bildenr" id="bildenr" required/>  <br />
				</div>
			</div>
			<div class="form-group">
				<label for"fraflyplass" class="col-sm-2 control-label">Fil</label>
				 <div class="col-sm-10">
					 <input type="file" id="fil" name="fil" size="60"><br />
				 </div>
			 </div>
		<div class="form-group">
			<label for"fraflyplass" class="col-sm-2 control-label">Beskrivelse</label>
			 <div class="col-sm-10">
				 <input type="text" class="form-control" name="beskrivelse" id="beskrivelse" required/>  <br />
			 </div>
		 </div>
		 <div class="form-group">
			 <div class="col-sm-offset-2 col-sm-10">
				 <input type="submit" class="btn btn-default" value="Registrer bilde" id="fortsett" name="fortsett" />
				 <input type="reset" class="btn btn-default" value="Nullstill" name="nullstill" id="nullstill" /> <br />
			 </div>
		 </div>
	</form>

    </article>
<div class="col-sm-offset-2 col-sm-10">
	<?php
	@$registrerBildeknapp=$_POST["fortsett"];

	function lovligBildenr($bildenr){
		$lovligBildenr=true;
		if(!$bildenr){
			$lovligBildenr=false;
		}
		else if(strlen($bildenr)<3){
			$lovligBildenr=false;
		}
		else if(!is_numeric($bildenr)){
			$lovligBildenr=false;
		}
		return $lovligBildenr;
	}

	if($registrerBildeknapp){
	  @$bildenr=$_POST["bildenr"];
		@$lovligBildenr=lovligBildenr($bildenr);
	  @$beskrivelse=$_POST["beskrivelse"];
	  $filnavn=$_FILES["fil"]["name"];
	  $filtype=$_FILES["fil"]["type"];
	  $filstorrelse=$_FILES["fil"]["size"];
	  $tmpnavn=$_FILES["fil"]["tmp_name"];
	  $nyttnavn="D:\\Sites\\home.hbv.no\\phptemp\\146813/bilde/".$filnavn;

	  if(!$lovligBildenr || !$beskrivelse || !$filnavn){
	    print("Alle felt fyll ut");
			print("$bildenr $filnavn $beskrivelse");
	  }
	  else{
	    if($filtype !="image/gif" && $filtype != "image/jpeg" && $filtype!="image/png"){
	      print("Bare bilder takk");

	    }
	    else if($filstorrelse>5000000){
	      print("Bildet er for stort");

	    }else{
	      include("db-tilkobling.php");
	      $sqlSetning="SELECT * FROM prg_bilde WHERE bildenr='$bildenr';";
	      $sqlResultat=mysqli_query($db, $sqlSetning) or die("Hei");
	      $antallRader=mysqli_num_rows($sqlResultat);

	      if($antallRader!=0){
	        print("Bildet eksisterer");
	      }
	      else{
					$dagensDato=date("Y-m-d");
	        move_uploaded_file($tmpnavn, $nyttnavn) or die("ikke mulig å laste opp");
	        $sqlSetning="INSERT INTO prg_bilde (bildenr, opplastningsdato, filnavn, beskrivelse) VALUES('$bildenr', '$dagensDato', '$filnavn', '$beskrivelse');";
	        mysqli_query($db, $sqlSetning) or die("Ikke mulig å registrer bilde til database");

	        print("Følgende bilde er nå registrert: <br>Bildenr: $bildenr <br>Opplastningsdato: $dagensDato<br>Filnavn: $filnavn <br> Beskrivelse:$beskrivelse");
	      }
	    }
	  }
	}
}
	?>

	<div id="melding"></div>
</div>
<?php include("incl/slutt.php"); ?>
