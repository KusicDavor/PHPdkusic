<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
?>

<?php
	$id = $_GET['moderator'];
	$sql = "DELETE FROM moderator
	WHERE korisnik_id='$id'";
	$rs=izvrsiUpit($bp,$sql);
	header("Location:moderatori.php");
?>

<?php
	if($aktivni_korisnik_tip==2) {
		header("Location:index.php");	
		exit;
	}else if (!isset($aktivni_korisnik_id)) {
		header("Location:index.php");	
		exit;
	}
?>

<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>