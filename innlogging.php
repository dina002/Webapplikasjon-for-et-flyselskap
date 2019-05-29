<?php include("incl/start2.php"); ?>
<div class="col-md-6 col-md-offset-3">
<article>
	<h1 class="page-header">Logg inn</h1>
	<form method="post" id="form" class="form-horizontal" onsubmit="return validerRegistrerStudentdata()">
	<div class="form-group">
		<label for"fraflyplass" class="col-sm-2 control-label">Brukernavn</label><br><br>
		 <div class="col-sm-10">
			 <input type="text" class="form-control" name="brukernavn" id="brukernavn"  required/>
		 </div>
	 </div>
	<div class="form-group">
		<label for"tilflyplass" class="col-sm-2 control-label">Passord</label><br><br>
		 <div class="col-sm-10">
			 <input type="password" class="form-control"name="passord" id="passord" required/>
		 </div>
	 </div>
   <input type="submit" name="logginnKnapp" value="Logg inn">
   <input type="reset" name="nullstill" id="nullstill" value="Nullstill"> <br />
</form>
Ny bruker ? <br />
<a href="registrerbruker.php">Registrer deg her</a> <br /> <br />

    </article>
<div class="col-sm-offset-2 col-sm-10">
	<?php
	@session_start();
	@$innloggetbruker=$_SESSION["brukernavn"];

	if($innloggetbruker){
		print("<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>");
	}
	    @$logginnKnapp=$_POST ["logginnKnapp"];
	    if ($logginnKnapp)
	        {
	            $brukernavn=$_POST ["brukernavn"];
	            $passord=$_POST["passord"];  /* variable gitt verdier fra feltene i HTML-skjemaet */

	            include("sjekk.php");

	            if (!sjekkBrukernavnPassord($brukernavn, $passord))  /* brukernavn og passord er ikke korrekt */
	                {
	                    print("Feil brukernavn/passord <br />");
	                }
	            else  /* brukernavn og passord er korrekt */
	                {
	                    @session_start();
	                    $_SESSION["brukernavn"]=$brukernavn;
	                    print("<META HTTP-EQUIV='refresh' CONTENT='0;URL=loggetinn.php'>");
	            	}
	    	}
	?>

	<div id="melding"></div>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include("incl/slutt.php"); ?>
