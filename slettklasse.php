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
    <h3>Slett Klasse</h3>
    <select id='klassekode' name='klassekode'>
      <?php include("listeboks-klasse.php");?>

    </select><br><br>
    <input type="submit" value="Slett Klasse" name="slettKlasseKnapp" id="slettKlasseKnapp">
  </form>
<?php
@$slettKlasseKnapp=$_POST["slettKlasseKnapp"];

if($slettKlasseKnapp){
@$klassekode=$_POST["klassekode"];
$del=explode(" ", $klassekode);
$klassekod=$del[0];
$fagnavn=$del[1];

$sqlSetning="DELETE FROM prg_klasse WHERE klassekode='$klassekod' AND fagnavn='$fagnavn';";
mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette fra database!!!");
print("Følgende klasse er slettet: $klassekod $fagnavn<br>");
}
}
?>
</div>
<?php include("incl/slutt.php"); ?>
