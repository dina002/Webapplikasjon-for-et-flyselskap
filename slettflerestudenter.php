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
  <form method="post" id="slettStudentSkjema" name="slettStudentSkjema" onsubmit="return bekreft()">
    <h3>Slett Studenter</h3>
      <?php include("checkboks-student.php");?>
    <input type="submit" value="Slett Studenter" name="slettStudenterKnapp" id="slettStudenterKnapp">
  </form>
  <?php
  @$slettOppgaveKnapp=$_POST["slettStudenterKnapp"];

  if($slettOppgaveKnapp){

  $inn=$_POST["brukernavn"];
  $antall=count($inn);
  if($antall==0){
    print("ingen valg");
  }
  else{

  for($r=0;$r<$antall;$r++){

  $del=explode(";", $inn[$r]);
  $brukernavn=$del[0];
  $fornavn=$del[1];
  $etternavn=$del[2];
  $klassekod=$del[3];

  $sqlSetning="DELETE FROM prg_student WHERE brukernavn='$brukernavn' AND klassekode='$klassekode';";
  mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette fra database!!!");
  print("Følgende studenter er slettet: $brukernavn $fornavn $etternavn $klassekode  <br>");
  }
  }
  }
}
  ?>
</div>
<?php include("incl/slutt.php"); ?>
