<?php
  include("db-tilkobling.php");

  $sqlSetning="SELECT * FROM prg_bilde ORDER BY bildenr;";

  $sqlResultat=mysqli_query($db, $sqlSetning) or die("Synj, db not wurk");
  $antallRader=mysqli_num_rows($sqlResultat);

  for($r=1;$r<=$antallRader;$r++){
    $rad=mysqli_fetch_array($sqlResultat);
    $bildenr=$rad["bildenr"];
    $opplastningsdato=$rad["opplastningsdato"];
    $filnavn=$rad["filnavn"];
    $beskrivelse=$rad["beskrivelse"];
    print("<option value='$bildenr $opplastningsdato $filnavn $beskrivelse'>$bildenr</option>");
  }

?>
