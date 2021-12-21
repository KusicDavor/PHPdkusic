<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
?>

<?php
	if($aktivni_korisnik_tip==2||$aktivni_korisnik_tip==1) {
		header("Location:index.php");	
		exit;
	}else if (!isset($aktivni_korisnik_id)) {
		header("Location:index.php");	
		exit;
	}
?>

<?php
	if(isset($_GET['planina'])){
		$planina_id=$_GET['planina'];
		echo $planina_id;
		$sql="SELECT * FROM planina WHERE planina_id='$planina_id'";
		$rs=izvrsiUpit($bp,$sql);
		list($planina_id,$naziv,$opis,$lokacija,$geografska_sirina,$geografska_duzina)=mysqli_fetch_array($rs);
		
			$planina_id=$_POST['planina_id'];
			$naziv=$_POST['naziv'];
			$opis=$_POST['opis'];
			$lokacija=$_POST['lokacija'];
			$geografska_sirina=$_POST['geografska_sirina'];
			$geografska_duzina=$_POST['geografska_duzina'];
	
			if($planina_id==0){
				$sql="INSERT INTO planina
				(naziv,opis,lokacija,geografska_sirina,geografska_duzina)
				VALUES
				('$naziv','$opis','$lokacija','$geografska_sirina','$geografska_duzina');
				";
			}
			else{
			$sql="UPDATE planina SET
					`naziv`='$naziv',
					`opis`='$opis',
					`lokacija`='$lokacija',
					`geografska_sirina`='$geografska_sirina',
					`geografska_duzina`='$geografska_duzina'
					WHERE planina_id='$planina_id'
				";
			}
			izvrsiUpit($bp,$sql);
	}
			header("Location:planine.php");
?>

<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
