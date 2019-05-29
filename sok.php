<?php include("incl/start.php"); ?>

<article>
  <br><br><br>
  <?php
  @session_start();
  @$innloggetbruker=$_SESSION["brukernavn"];

  if(!$innloggetbruker){
    print("Denne siden krever innlogging<br>");
  } else{ ?>
  <h1 class="page-header">Søk i databasen</h1>
<form method="post">
  <label for="text">Tekststreng:</label>
<input type="text" id="tekst" name="tekst">
<input type="submit" id="fortsett" value="Søk" name="fortsett">
</form>
</article>

<?php
@session_start();
@$innloggetbruker=$_SESSION["brukernavn"];

if(!$innloggetbruker){
  print("Denne siden krever innlogging<br>");
}
else
{

  @$fortsett=$_POST["fortsett"];
  if($fortsett){
    $sokestreng=$_POST["tekst"];
    include("db-tilkobling.php");
    $sqlSetning="SELECT * FROM prg_klasse WHERE klassekode LIKE '%$sokestreng%' OR fagnavn LIKE '%$sokestreng%';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die("Synj, itte mulig å hente");

    $antallRader=mysqli_num_rows($sqlResultat);

    if($antallRader==0){
      print("<p style='color:red;'>Ingen treff i Klasse-tabellen</p><br>");
    }
    else{
      print("<p style='color:darkgreen;'>Treff i klasse-tabellen</p>");

      print("<table class='table table-striped'>");
      print("<thead><tr><th>Klassekode</th><th>Fagnavn</th></tr></thead><tbody><tr>");
      for($r=1;$r<=$antallRader;$r++){
        $rad=mysqli_fetch_array($sqlResultat);
        $klassekode=$rad["klassekode"];
        $klassenavn=$rad["fagnavn"];

        $tekst="<tr><td>$klassekode</td> <td>$klassenavn</td></tr><br>";
        $tekstlengde=strlen($tekst);
        $sokestrenglengde=strlen($sokestreng);
        $startpos=stripos($tekst, $sokestreng);

        $hode=substr($tekst, 0, $startpos);
        $sok=substr($tekst, $startpos, $sokestrenglengde);
        $hale=substr($tekst, $startpos+$sokestrenglengde, $tekstlengde-$startpos-$sokestrenglengde);

        print("$hode <strong>$sok</strong>$hale");

      }
      print("</tr></tbody></table>");
      print("<br><br>");
    }

    $sqlSetning="SELECT * FROM prg_student WHERE brukernavn LIKE '%$sokestreng%' OR fornavn LIKE '%$sokestreng%' OR etternavn LIKE '%$sokestreng%' OR klassekode LIKE '%$sokestreng%';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die("Synj, itte mulig å hente");

    $antallRader=mysqli_num_rows($sqlResultat);

    if($antallRader==0){
      print("<p style='color:red;'>Ingen treff i Student-tabellen</p><br>");
    }
    else{
      print("<p style='color:darkgreen;'>Treff i Student-tabellen</p>");
      print("<table class='table table-striped'>
    <thead>
    <tr>
    <th>Brukernavn</th>
    <th>Fornavn</th>
    <th>Etternavn</th>
    <th>klassekode</th>
    </tr>
    </thead><tbody><tr>");
      for($r=1;$r<=$antallRader;$r++){
        $rad=mysqli_fetch_array($sqlResultat);
        $brukernavn=$rad["brukernavn"];
        $fornavn=$rad["fornavn"];
        $etternavn=$rad["etternavn"];
        $klassekode=$rad["klassekode"];

        $tekst="<tr><td>$brukernavn</td> <td>$fornavn</td> <td>$etternavn</td><td>$klassekode</td></tr>";
        $tekstlengde=strlen($tekst);
        $sokestrenglengde=strlen($sokestreng);
        $startpos=stripos($tekst, $sokestreng);

        $hode=substr($tekst, 0, $startpos);
        $sok=substr($tekst, $startpos, $sokestrenglengde);
        $hale=substr($tekst, $startpos+$sokestrenglengde, $tekstlengde-$startpos-$sokestrenglengde);

        print("$hode <strong>$sok</strong>$hale");

      }
      print("</tr></tbody></table>");
    }


    $sqlSetning="SELECT * FROM prg_bilde WHERE bildenr LIKE '%$sokestreng%' OR opplastningsdato LIKE '%$sokestreng%' OR filnavn LIKE '%$sokestreng%' OR beskrivelse LIKE '%$sokestreng%';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die("Synj, itte mulig å hente");

    $antallRader=mysqli_num_rows($sqlResultat);

    if($antallRader==0){
      print("<p style='color:red;'>Ingen treff i Student-tabellen</p><br>");
    }
    else{
      print("<p style='color:darkgreen;'>Treff i Student-tabellen</p>");
      print("<table class='table table-striped'>
    <thead>
    <tr>
    <th>Bildenr</th>
    <th>Opplastningsdato</th>
    <th>Filnavn</th>
    <th>Beskrivelse</th>
    </tr>
    </thead><tbody><tr>");
      for($r=1;$r<=$antallRader;$r++){
        $rad=mysqli_fetch_array($sqlResultat);
        $bildenr=$rad["bildenr"];
        $opplastningsdato=$rad["opplastningsdato"];
        $filnavn=$rad["filnavn"];
        $beskrivelse=$rad["beskrivelse"];

        $tekst="<tr><td>$bildenr</td> <td>$opplastningsdato</td> <td>$filnavn</td><td>$beskrivelse</td></tr>";
        $tekstlengde=strlen($tekst);
        $sokestrenglengde=strlen($sokestreng);
        $startpos=stripos($tekst, $sokestreng);

        $hode=substr($tekst, 0, $startpos);
        $sok=substr($tekst, $startpos, $sokestrenglengde);
        $hale=substr($tekst, $startpos+$sokestrenglengde, $tekstlengde-$startpos-$sokestrenglengde);

        print("$hode<strong>$sok</strong>$hale");

      }
      print("</tr></tbody></table>");
    }
  }
  }
}
?>
<?php include("incl/slutt.php"); ?>
