<?php include("incl/start.php"); ?>

<script src="incl/funksjon.js"></script>
<div class="col-sm-offset-2 col-sm-10">
  <br><br><br>
  <?php
  @session_start();
  @$innloggetbruker=$_SESSION["brukernavn"];

  if(!$innloggetbruker){
    print("Denne siden krever innlogging<br>");
  } else{
  ?>
  <form method="post" id="slettKlasseSkjema" name="slettKlasseSkjema" onsubmit="return bekreft()">
    <h3>Slett Bilde</h3>
    <select name="slettBilde">
      <?php include("listeboks-bilde.php"); ?>
    </select><br><br>
    <input type="submit" value="Slett Bilde" name="slettKlasseKnapp" id="slettKlasseKnapp">
  </form>
<?php
@$slettKlasseKnapp=$_POST["slettKlasseKnapp"];

if($slettKlasseKnapp){
@$slettBilde=$_POST["slettBilde"];
$del=explode(" ", $slettBilde);
$bildenr=$del[0];
$filnavn=$del[2];

$sqlSetning="DELETE FROM prg_bilde WHERE bildenr='$bildenr';";
mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette fra database!!!");

$mappenavn="D:\\Sites\\home.hbv.no\\phptemp\\146813/bilde/".$filnavn;
unlink($mappenavn) or die("HEi");
print("Følgende bilde er slettet: $bildenr<br>");
}
}
?>
</div>
<?php include("incl/slutt.php"); ?>
