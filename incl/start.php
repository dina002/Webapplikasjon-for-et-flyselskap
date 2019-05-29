
<html>
    <html lang="no">
<head>
    <meta charset="utf-8"/>
    <script src="incl/kalender.js"> </script>

  <script src="incl/datepicker.js"> </script>
  <link rel="stylesheet" type="text/css" href="incl/datepicker.css" />

    <script src="incl/funksjon.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet" type="text/css">
    <title>Bjarum Airlines</title>
</head>
<body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">  STUDENTWEB</a>

        </div>

      </div>
    </nav>
        <div class="container-fluid wrap">
            <div class="row">
              <div class="col-sm-3 col-md-2 sidebar">
                <?php
                  function active($currect_page){
                    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
                    $url = end($url_array);
                    if($currect_page == $url){
                      echo 'active'; //class name in css
                    }
                  }
                ?>
                <ul class="nav nav-sidebar">
                  <li class="<?php active('index.php');?>"><a href="index.php">Hjem <span class="sr-only">(current)</span></a></li>
                  <li class="<?php active('innlogging.php');?>"><a href="innlogging.php">Logg inn</a></li>
                  <li class="<?php active('loggut.php');?>"><a href="loggut.php">Logg ut</a></li>
                <ul class="nav nav-sidebar">
                  <?php
                  @session_start();
                  @$innloggetbruker=$_SESSION["brukernavn"];

                  if(!$innloggetbruker){
                    print("<META HTTP-EQUIV='refresh' CONTENT='0;URL=innlogging.php'>");
                  }
                  ?>
                  <li class="h3"><h3>Registrer</h3></li>
                  <li class="<?php active('registrerklasse.php');?>"><a href="registrerklasse.php">Registrer klasse</a></li>
                  <li class="<?php active('registrerstudent.php');?>"><a href="registrerstudent.php">Registrer student</a></li>
                  <li class="<?php active('registrerbilde.php');?>"><a href="registrerbilde.php">Registrer bilde</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                  <li class="h3"><h3>Vis</h3></li>
                  <li class="<?php active('visklasse.php');?>"><a href="visklasse.php">Vis Registrerte klasser</a></li>
                  <li class="<?php active('visklasse_medbilde.php');?>"><a href="visklasse_medbilde.php">Vis Registrerte klasser med bilde</a></li>
                  <li class="<?php active('visstudent.php');?>"><a href="visstudent.php">Vis Registrerte studenter</a></li>
                  <li class="<?php active('visbilde.php');?>"><a href="visbilde.php">Vis Registrerte bilder</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                  <li class="h3"><h3>Slett</h3></li>
                  <li class="<?php active('slettklasse.php');?>"><a href="slettklasse.php">Slett klasse</a></li>
                  <li class="<?php active('slettstudent.php');?>"><a href="slettstudent.php">Slett student</a></li>
                  <li class="<?php active('slettflerestudenter.php');?>"><a href="slettflerestudenter.php">Slett studenter</a></li>
                  <li class="<?php active('slettbilde.php');?>"><a href="slettbilde.php">Slett bilde</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                  <li class="h3"><h3>Endre</h3></li>
                  <li class="<?php active('endreklasse.php');?>"><a href="endreklasse.php">Endre klasse</a></li>
                  <li class="<?php active('endrestudent.php');?>"><a href="endrestudent.php">Endre student</a></li>
                  <li class="<?php active('endrebilde.php');?>"><a href="endrebilde.php">Endre bilde</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                  <li class="h3"><h3>Søk</h3></li>
                  <li class="<?php active('sok.php');?>"><a href="sok.php">Søk i databasen</a></li>
                </ul>
              </div>
            </div>
            <div class="row">

              <div class="col-md-6 col-md-offset-3">
