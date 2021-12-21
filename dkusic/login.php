<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
?>

<?php
	if(isset($_GET['logout'])){
		unset($_SESSION["aktivni_korisnik"]);
		unset($_SESSION['aktivni_korisnik_ime']);
		unset($_SESSION["aktivni_korisnik_tip"]);
		unset($_SESSION["aktivni_korisnik_id"]);
		session_destroy();
		header("Location:index.php");
	}

	$greska= "";
	if(isset($_POST['submit'])){
		$korisnik=mysqli_real_escape_string($bp,$_POST['korisnicko_ime']);
		$lozinka=mysqli_real_escape_string($bp,$_POST['lozinka']);

		if(!empty($korisnik)&&!empty($lozinka)){
			$sql="SELECT korisnik_id,tip_korisnika_id,ime,prezime FROM korisnik WHERE korisnicko_ime='$korisnik' AND lozinka='$lozinka'";
			$rs=izvrsiUpit($bp,$sql);
			if(mysqli_num_rows($rs)==0)$greska="Ne postoji korisnik s navedenim korisničkim imenom i lozinkom";
			else{
				list($id,$tip,$ime,$prezime)=mysqli_fetch_array($rs);
				$_SESSION['aktivni_korisnik']=$korisnik;
				$_SESSION['aktivni_korisnik_ime']=$ime." ".$prezime;
				$_SESSION["aktivni_korisnik_id"]=$id;
				$_SESSION['aktivni_korisnik_tip']=$tip;
				header("Location:index.php");
			}
		}
		else $greska = "Molim unesite korisničko ime i lozinku";
	}
?>
<br>
<div align="center">
<form id="prijava" name="prijava" method="POST" action="login.php" onsubmit="return validacija();">
	<label for="korisnicko_ime"><strong>Korisničko ime:</strong></label>
	<input name="korisnicko_ime" id="korisnicko_ime" type="text" size="40"/><br>
	<label for="lozinka"><strong>Lozinka:</strong></label>
	<input style="margin-left: 85px" name="lozinka" id="lozinka" type="password" size="40"/>
	<br>
	<label class="greska" style="font-size: 25px; color: red; font-weight: bold">
	<?php if($greska!="")echo $greska ?>
	</label>
	<br>
	<input name="submit" type="submit" value="Prijavi se" style="font-size: 25px"/>
</form>
</div>

<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
