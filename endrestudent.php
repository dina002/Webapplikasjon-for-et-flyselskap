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
  <h3> Endre Student</h3>
  <form method="post">
    <select name="endreStudent">
      <?php include("listeboks-student.php"); ?>
    </select>
    <input type="submit" value="Endre student" name="finnStudentKnapp" id="finnStudentKnapp">
  </form>
  <?php
  @$finnStudentKnapp=$_POST["finnStudentKnapp"];

  if($finnStudentKnapp){
    $endreStudent=$_POST["endreStudent"];
    $del=explode(" ", $endreStudent);
    $brukernavnet=$del[0];
    $fornavnet=$del[1];
    $etternavnet=$del[2];
    $klassekoden=$del[3];
    $nlfrist=$del[4];
    $bildenret=$del[5];

    $sqlSetning="SELECT * FROM prg_student WHERE brukernavn='$brukernavnet';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die("Hei");
    $rad=mysqli_fetch_array($sqlResultat);
    $brukernavn=$rad["brukernavn"];
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];


    print("<form method='post'>");
    print("Brukernavn<input type='text' name='brukernavn' id='brukernavn' value='$brukernavnet' readonly><br>");
    print("Fornavn <input type='text' name='fornavn' id='fornavn' value='$fornavnet' required><br>");
    print("Etternavn <input type='text' name='etternavn' id='etternavn' value='$etternavnet' required><br>");
    print("Klassekode <select name='klassekode' id='klassekode' value='$klassekode'>");
    include("listeboks-klasse2.php");
    print("<option value='$klassekoden' selected='selected'>$klassekoden</option>");
    print("</select><br>");
    print("Neste leveringsfrist <input type='text' name='nlfrist' id='nlfrist' value='$nlfrist' required><br>");
    print("Bildenr <select name='bildenr' id='bildenr' value='$bildenr'>");
    include('listeboks-bilde.php');
    print("<option value='$bildenret' selected='selected'>$bildenret</option>");
    print("</select><br>");
    print("<input type='submit' value='Endre student' name='endreStudentKnapp' id='endreStudentKnapp'><br>");
    print("</form>");
  }

  @$endreStudentKnapp=$_POST["endreStudentKnapp"];

  if($endreStudentKnapp){
    $brukernavn=$_POST["brukernavn"];
    $fornavn=$_POST["fornavn"];
    $etternavn=$_POST["etternavn"];
    $klassekode=$_POST["klassekode"];
    $nlfrist=$_POST["nlfrist"];
    $bildenr=$_POST["bildenr"];
    $i=explode(" ", $klassekode);
    $r=$i[0];
    $y=explode(" ", $bildenr);
    $h=$y[0];

    if(!$brukernavn || !$etternavn || !$fornavn || !$klassekode || !$nlfrist || !$bildenr){
      print("Alle felt må fylles ut");
    }
    else{
      $sqlSetning="UPDATE prg_student SET fornavn='$fornavn', etternavn='$etternavn', klassekode='$r', neste_leveringsfrist='$nlfrist', bildenr='$h' WHERE brukernavn='$brukernavn';";
      mysqli_query($db, $sqlSetning) or die("ikke mulig å endre");
      print("Studenten endret");
      print("<META HTTP-EQUIV='refresh' CONTENT='2;URL=endrestudent.php'>");
    }

  }
}
  ?>
</div>
<?php include("incl/slutt.php"); ?>
