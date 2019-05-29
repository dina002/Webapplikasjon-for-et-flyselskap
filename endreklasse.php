<?php include("incl/start.php"); ?>
<div class="col-sm-offset-2 col-sm-10">
  <br><br><br>
  <?php
	@session_start();
  @$innloggetbruker=$_SESSION["brukernavn"];

  if(!$innloggetbruker){
    print("Denne siden krever innlogging<br>");
  } else{
	?>
  <h3> Endre Klasse</h3>
  <form method="post">
    <select name="endreKlasse">
      <?php include("listeboks-klasse.php"); ?>
    </select>
    <input type="submit" value="Endre klasse" name="finnKlasseKnapp" id="finnKlasseKnapp">
  </form>
  <?php
  @$finnKlasseKnapp=$_POST["finnKlasseKnapp"];

  if($finnKlasseKnapp){
    $endreKlasse=$_POST["endreKlasse"];
    $del=explode(" ", $endreKlasse);
    $klassekod=$del[0];
    $fagnavn=$del[1];



    $sqlSetning="SELECT * FROM prg_klasse WHERE klassekode='$klassekod';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die("Hei");
    $rad=mysqli_fetch_array($sqlResultat);
    $klassekode=$rad["klassekode"];
    $klassenavn=$rad["fagnavn"];

    print("<form method='post'>");
    print("Klassekode<input type='text' name='klassekode' id='klassekode' value='$klassekod' readonly><br>");
    print("Klassenavn<input type='text' name='klassenavn' id='klassenavn' value='$klassenavn' required><br>");
    print("<input type='submit' value='Endre klasse' name='endreKlasseKnapp' id='endreKlasseKnapp'><br>");
    print("</form>");
  }

  @$endreKlasseKnapp=$_POST["endreKlasseKnapp"];

  if($endreKlasseKnapp){
    $klassekode=$_POST["klassekode"];
    $klassenavn=$_POST["klassenavn"];

    if(!$klassekode || !$klassenavn){
      print("Alle felt må fylles ut");
    }
    else{
      $sqlSetning="UPDATE prg_klasse SET fagnavn='$klassenavn' WHERE klassekode='$klassekode';";
      mysqli_query($db, $sqlSetning) or die("ikke mulig å endre");
      print("Klasse endret");
    }

  }
}
  ?>
</div>
<?php include("incl/slutt.php"); ?>
