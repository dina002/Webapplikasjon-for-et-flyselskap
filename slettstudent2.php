<?php include("incl/start.php"); ?>

<script src="incl/funksjon.js"></script>
<div class="col-sm-offset-2 col-sm-10">
  <br><br><br>
  <?php
  session_start();
  @$innloggetbruker=$_SESSION["brukernavn"];

  if(!$innloggetbruker){
    print("Denne siden krever innlogging<br>");
  } else{
   ?>
  <form method="post" id="slettStudentSkjema" name="slettStudentSkjema" onsubmit="return bekreft()">
    <h3>Slett Student</h3>
    <select id='student' name='student'>
      <?php include("listeboks-student.php");?>

    </select><br><br>
    <input type="submit" value="Slett Student" name="slettStudentKnapp" id="slettStudentKnapp">
  </form>
<?php
@$slettStudentKnapp=$_POST["slettStudentKnapp"];

if($slettStudentKnapp){
$student=$_POST["student"];

$sqlSetning="DELETE FROM student WHERE brukernavn='$student';";
mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette fra database!!!");
print("Følgende student er slettet: $student<br>");
}
}
?>
</div>
<?php include("incl/slutt.php"); ?>
