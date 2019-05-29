<?php include("incl/start2.php"); ?>
<article>
	<br><br><br>
	<h1 class="page-header">Registrer ny bruker</h1>
	<form method="post" id="form" class="form-horizontal" onsubmit="return validerRegistrerStudentdata()">
	<div class="form-group">
		<label for"fraflyplass" class="col-sm-2 control-label">Brukernavn</label>
		 <div class="col-sm-10">
			 <input type="text" class="form-control" name="brukernavn" id="brukernavn"  required/>  <br />
		 </div>
	 </div>
	<div class="form-group">
		<label for"tilflyplass" class="col-sm-2 control-label">Passord</label>
		 <div class="col-sm-10">
			 <input type="password" class="form-control"name="passord" id="passord" required/>  <br />
		 </div>
	 </div>
   <input type="submit" name="registrerBrukerKnapp" value="Registrer bruker">
   <input type="reset" name="nullstill" id="nullstill" value="Nullstill"> <br />
</form>

    </article>
<div class="col-sm-offset-2 col-sm-10">
	<?php
  @$registrerBrukerKnapp=$_POST ["registrerBrukerKnapp"];
  if ($registrerBrukerKnapp)
      {
          include("db-tilkobling.php");

          $brukernavn=$_POST ["brukernavn"];
          $passord=$_POST["passord"];  /* variable gitt verdier fra feltene i HTML-skjemaet */

          if (!$brukernavn || !$passord)  /* brukernavn og passord er ikke fylt ut */
              {
                  print ("Brukernavn og passord m&aring; fylles ut <br />");
              }
          else
              {
                  $sqlSetning="SELECT * FROM bruker WHERE brukernavn='$brukernavn';";
                  $sqlResultat=mysqli_query($db, $sqlSetning) or die("Kan ikke koble til database");

                  if (mysqli_num_rows($sqlResultat)!=0)  /* brukernavnet er registrert fra før */
                      {
                          print ("Brukernavnet er registrert fra f&oslash;r <br />");
                      }
                  else
                      {
                          $kryptertPassord=password_hash($passord, PASSWORD_DEFAULT);
                          $sqlSetning="INSERT INTO bruker VALUES ('$brukernavn', '$kryptertPassord');";
                          mysqli_query($db, $sqlSetning) or die("Ikke mulig å registrere");

                          print ("F&oslash; lgende data er n&aring; registrert: <br /> Brukernavn: $brukernavn <br /> Passord: $passord <br />  <br />");
                          print("<a href='innlogging.php'>Gå til innloggingsside</a>);");                        }

              }
      }

	?>
	<div id="melding"></div>
</div>
<?php include("incl/slutt.php"); ?>
