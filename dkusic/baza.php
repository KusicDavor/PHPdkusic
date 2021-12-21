<?php
	define("POSLUZITELJ","localhost");
	define("BAZA","iwa_2020_vz_projekt");
	define("BAZA_KORISNIK","iwa_2020");
	define("BAZA_LOZINKA","foi2020");

	function spojiNaBazu(){
		$veza=mysqli_connect(POSLUZITELJ,BAZA_KORISNIK,BAZA_LOZINKA);
		if(!$veza)echo "POGREŠKA: Problem kod spajanja! Provjeri baza.php ".mysqli_connect_error();
		mysqli_select_db($veza,BAZA);
		if(mysqli_error($veza)!=="")echo "POGREŠKA: Problem kod odabira baze. Provjeri baza.php ".mysqli_error($veza);
		mysqli_set_charset($veza,"utf8");
		if(mysqli_error($veza)!=="")echo "POGREŠKA: Problem sa charsetom. Provjeri baza.php ".mysqli_error($veza);
		return $veza;
	}

	function izvrsiUpit($veza,$upit){
		$rezultat=mysqli_query($veza,$upit);
		if(mysqli_error($veza)!=="")echo "POGREŠKA: Problem sa upitom: ".$upit." ".mysqli_error($veza);
		return $rezultat;
	}

	function zatvoriVezuNaBazu($veza){
		mysqli_close($veza);
	}
?>
