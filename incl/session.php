<?php
@session_start();
@$innloggetbruker=$_SESSION["brukernavn"];

if(!$innloggetbruker){
  print("Denne siden krever innlogging<br>");
}
else
{
?>
