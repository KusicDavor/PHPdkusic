<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
?>
<?php

if(isset($_GET['slika'])){
		$slika_id=$_GET['slika'];
		$sql="SELECT * FROM slika WHERE slika_id='$slika_id'";
		$rs=izvrsiUpit($bp,$sql);
		list($slika_id,$planina_id,$korisnik_id,$naziv,$url,$opis,$datum_vrijeme_slikanja,$status)=mysqli_fetch_array($rs);
	
			$planina_id=$_POST['planina_id'];
			$korisnik_id=$_POST['korisnik_id'];
			$naziv=$_POST['naziv'];
			$url=$_POST['url'];
			$opis=$_POST['opis'];
			$datum_vrijeme_slikanja=strtotime($_POST['datum_vrijeme_slikanja']);
			$datum_vrijeme_slikanja=date('Y-m-d H:i:s',$datum_vrijeme_slikanja);
			$status=$_POST['status'];

		if($slika_id==0){
				$sql="INSERT INTO slika
				(planina_id,korisnik_id,naziv,url,opis,datum_vrijeme_slikanja,status)
				VALUES
				('$planina_id','$korisnik_id','$naziv','$url','$opis','$datum_vrijeme_slikanja','$status');
				";
			}
			else{
			$sql="UPDATE slika SET
					`planina_id`='$planina_id',
					`naziv`='$naziv',
					`url`='$url',
					`opis`='$opis',
					`datum_vrijeme_slikanja`='$datum_vrijeme_slikanja',
					`status`='$status'
					WHERE slika_id='$slika_id'
				";
			}
			izvrsiUpit($bp,$sql);
		}
			header("Location:sve_slike.php");
?>
<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
