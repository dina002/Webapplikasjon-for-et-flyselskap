<?php
  include("db-tilkobling.php");

  $sqlSetning="SELECT * FROM prg_student ORDER BY brukernavn,klassekode;";

  $sqlResultat=mysqli_query($db, $sqlSetning) or die("Synj, db not wurk");
  $antallRader=mysqli_num_rows($sqlResultat);

  for($r=1;$r<=$antallRader;$r++){
    $rad=mysqli_fetch_array($sqlResultat);
    $brukernavn=$rad["brukernavn"];
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];
    print("<input type='checkbox' name='brukernavn[]' value='$brukernavn;$fornavn;$etternavn;$klassekode'/>$brukernavn $fornavn $etternavn $klassekode<br>");
  }

?>
