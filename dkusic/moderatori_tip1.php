<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
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
	$sql="SELECT COUNT(*) FROM moderator";
	$rs=izvrsiUpit($bp,$sql);
	$red=mysqli_fetch_array($rs);
	$broj_redaka=$red[0];
	$broj_stranica=ceil($broj_redaka/$vel_str_mod);
	
	$sql="SELECT moderator.korisnik_id, moderator.planina_id, korisnik.ime,korisnik.prezime FROM korisnik,moderator WHERE korisnik.korisnik_id=$aktivni_korisnik_id AND moderator.korisnik_id=korisnik.korisnik_id GROUP BY korisnik.korisnik_id LIMIT ".$vel_str_mod;
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
			<th>Korisnik ID</th>";
	echo "</tr></thead>";
	
	echo "<tbody>";
	while(list($planina_id,$korisnik_id,$ime,$prezime)=mysqli_fetch_array($rs)){
		echo "<tr>
			<td>$ime $prezime</td>";
			echo "<td><a class='link' href='moderator.php?moderator=$planina_id'>Pogledaj</a></td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "<br/>";
?> 
</div>
<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
