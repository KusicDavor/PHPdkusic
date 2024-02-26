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
	$sql="SELECT moderator.korisnik_id, moderator.planina_id, korisnik.ime,korisnik.prezime FROM korisnik,moderator WHERE moderator.korisnik_id=korisnik.korisnik_id GROUP BY moderator.korisnik_id";
	if(isset($_GET['stranica'])){
		$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_mod);
		$aktivna=$_GET['stranica'];
	}
	else $aktivna = 1;
?>
<div style="margin-left: 700px">
<?php
	$rs=izvrsiUpit($bp,$sql);
	echo "<table id='tablice'>";
	echo "<thead><tr>
			<th>Korisnik</th>";
	echo "</tr></thead>";
	echo "<tbody>";
	while(list($planina_id,$korisnik_id,$ime,$prezime)=mysqli_fetch_array($rs)){
		echo "<tr><td>$ime $prezime</td>";
			echo "<td><a class='link' href='moderator.php?moderator=$planina_id'>Pogledaj</a></td>";
			echo "<td><a class='link' href='dodaj_planinu.php?dodaj_planinu=$planina_id'>Dodaj</a></td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "<br/>";
	
	echo "<td><a class='link' href='dodaj_planinu1.php?dodaj_planinu=$planina_id'>Dodaj</a></td>";
?> 
</div>
<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
