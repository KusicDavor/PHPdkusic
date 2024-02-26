<?php
	include("baza.php");
	if(session_id()=="")session_start();

	$putanja=$_SERVER['REQUEST_URI'];
	$aktivni_korisnik=0;
	$aktivni_korisnik_tip=-1;
	$vel_str=10;
	$vel_str_mod=20;
	$vel_str_planina=15;
	$vel_str_slika=8;


	if(isset($_SESSION['aktivni_korisnik'])){
		$aktivni_korisnik=$_SESSION['aktivni_korisnik'];
		$aktivni_korisnik_ime=$_SESSION['aktivni_korisnik_ime'];
		$aktivni_korisnik_tip=$_SESSION['aktivni_korisnik_tip'];
		$aktivni_korisnik_id=$_SESSION["aktivni_korisnik_id"];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Projektna aplikacija - Hrvatske planine</title>
		<meta name="autor" content="projekt"/>
		<meta name="datum" content="24.05.2021."/>
		<meta charset="utf-8"/>
		<link href="dkusic.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<h1 style="margin-top: 0px">
				Projektna aplikacija - Hrvatske planine
			</h1>
		</header>
	
	<nav id="navigacija" class="menu">
	<a href="index.php">Početna stranica</a>
	<a href="javne_slike.php">Javne slike</a>
	<?php if($aktivni_korisnik_tip==1||$aktivni_korisnik_tip==2){
	echo
	'<a href="logirani_korisnik.php">Moji podatci</a> 	
	<a href="slike.php">Moje slike</a>'; } ?>
	<?php if($aktivni_korisnik_tip==0){
	echo 	
	'<a href="moderatori.php">Moderatori</a>
	<a href="planine.php">Planine</a>
	<a href="sve_slike.php">Sve slike</a>
	<a href="korisnici.php">Korisnici</a>
	<a href="blokirani.php">Blokirani korisnici</a>'; } ?>
	<?php if($aktivni_korisnik_tip==1){
	echo '<a href="moderatori_tip1.php">Moderatori</a>
		<a href="blokirani.php">Blokirani korisnici</a>'; } ?>

		
		<p>
		<?php
		if($aktivni_korisnik===0){
			echo "<span style='color:black; font-weight:bold'>Neprijavljeni korisnik</span><a class='link1' href='login.php'>Prijava</a>";
		}
		else {
			echo "<span style='color:black; font-weight:bold'>$aktivni_korisnik_ime</span><a class='link1' href='login.php?logout=1'>Odjava</a>";
		}
		?>
		<a style="float:right; color:green; font-weight:bold" href="o_autoru.php">O autoru</a>
		</p>
	</nav>