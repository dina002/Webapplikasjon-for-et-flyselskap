<?php
  include("db-tilkobling.php");

  $sqlSetning="SELECT * FROM prg_student ORDER BY brukernavn;";

  $sqlResultat=mysqli_query($db, $sqlSetning) or die("Synj, db not wurk");
  $antallRader=mysqli_num_rows($sqlResultat);

  for($r=1;$r<=$antallRader;$r++){
    $rad=mysqli_fetch_array($sqlResultat);
    $brukernavn=$rad["brukernavn"];
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];
    $nlfrist=$rad["neste_leveringsfrist"];
    $bildenr=$rad["bildenr"];
    print("<option value='$brukernavn $fornavn $etternavn $klassekode $nlfrist $bildenr'>$brukernavn $fornavn $etternavn $klassekode</option>");
  }

?>
