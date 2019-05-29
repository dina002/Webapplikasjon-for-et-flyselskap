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
  <h3> Endre Bilde</h3>
  <form method="post">
    <select name="endreBilde">
      <?php include("listeboks-bilde.php"); ?>
    </select>
    <input type="submit" value="Endre bilde" name="finnBildeKnapp" id="finnBildeKnapp">
  </form>
  <?php
  @$finnBildeKnapp=$_POST["finnBildeKnapp"];

  if($finnBildeKnapp){
    $endreBilde=$_POST["endreBilde"];
    $del=explode(" ", $endreBilde);
    $bildenr=$del[0];
    $opplastningsdato=$del[1];
    @$filnavn=$del[2];
    @$beskrivelse=$del[3];



    $sqlSetning="SELECT * FROM prg_bilde WHERE bildenr='$bildenr';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die("Hei");
    $rad=mysqli_fetch_array($sqlResultat);
    $bildenr=$rad["bildenr"];
    $opplastningsdato=$rad["opplastningsdato"];
    $beskrivelse=$rad["beskrivelse"];
    $filnavn=$rad["filnavn"];

    print("<form method='post'>");
    print("Bildenr<input type='text' class='form-control' name='bildenr' id='bildenr' value='$bildenr'readonly><br>");
    print("Opplastningsdato: $opplastningsdato<br>");
    print("Bilde<a href='https://home.hbv.no/phptemp/146813/bilde/$filnavn'><img style='width:50px;'src='https://home.hbv.no/phptemp/146813/bilde/$filnavn' target='_blank'></a><br>");
    print("Beskrivelse<input type='text' class='form-control' name='beskrivelse' id='beskrivelse' value='$beskrivelse' required><br>");
    print("<input type='submit' value='Endre bilde' name='endreKlasseKnapp' id='endreKlasseKnapp'><br>");
    print("</form>");
  }

  @$endreKlasseKnapp=$_POST["endreKlasseKnapp"];

  if($endreKlasseKnapp){
    $bildenr=$_POST["bildenr"];
    $beskrivelse=$_POST["beskrivelse"];

    if(!$beskrivelse){
      print("Alle felt må fylles ut");
    }
    else{
      $sqlSetning="UPDATE prg_bilde SET beskrivelse='$beskrivelse' WHERE bildenr='$bildenr';";
      mysqli_query($db, $sqlSetning) or die("ikke mulig å endre");
      print("Bilde endret");
    }

  }
}
  ?>
</div>
<?php include("incl/slutt.php"); ?>
