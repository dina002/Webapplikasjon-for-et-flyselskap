<?php
  include("db-tilkobling.php");

  $sqlSetning="SELECT * FROM prg_klasse ORDER BY klassekode;";

  $sqlResultat=mysqli_query($db, $sqlSetning) or die("Synj, db not wurk");
  $antallRader=mysqli_num_rows($sqlResultat);

  for($r=1;$r<=$antallRader;$r++){
    $rad=mysqli_fetch_array($sqlResultat);
    $klassekode=$rad["klassekode"];
    $fagnavn=$rad["fagnavn"];
    print("<option value='$klassekode $fagnavn'>$klassekode $fagnavn</option>");
  }

?>
