
<?php include("incl/start.php"); ?>

<article>
	<br><br><br>
	<h1 class="page-header">Logg ut</h1>
	<form method="post">
		<p>IKKE DRA</p>
		<input type="submit" name="loggut" value="Logg ut">
	</form>
	<?php  /* utlogging  */
	/*
	/*  Programmet logger ut en bruker fra applikasjonen
	*/@$loggut=$_POST["loggut"];
	if($loggut){
	    session_start();
	    session_destroy();  /* sesjonen avsluttes */

	    print("<META HTTP-EQUIV='Refresh' CONTENT='0;URL=innlogging.php'>");    /* redirigering tilbake til innloggings-siden (innlogging.php) */
	    //  header("Location: innlogging.php");
}
	?>
    </article>
<div class="col-sm-offset-2 col-sm-10">
	<div id="melding"></div>
</div>
<?php include("incl/slutt.php"); ?>
