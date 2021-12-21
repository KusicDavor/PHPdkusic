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
	$sql="SELECT COUNT(*) FROM slika";
	$rs=izvrsiUpit($bp,$sql);
	$red=mysqli_fetch_array($rs);
	$broj_redaka=$red[0];
	$broj_stranica=ceil($broj_redaka/$vel_str_slika);

	
$sql = "SELECT k.ime as ime, k.prezime as prezime, COUNT(*) as broj_slika FROM korisnik k, slika s WHERE status=1 and k.korisnik_id=s.korisnik_id AND blokiran='0' GROUP BY k.korisnik_id ORDER BY k.prezime";
	if(isset($_GET['stranica'])){
		$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_slika);
		$aktivna=$_GET['stranica'];
	}
	else $aktivna = 1;
?>

<?php
	if(!isset($_GET['reset'])){
		if(isset($_GET['slika'])){
			$id=$_GET['slika'];
		}
	}
	
	$rs=izvrsiUpit($bp,$sql);
	
echo "<table id='tablice'>";
	echo "<thead><tr>
			<th>Ime</th>
			<th>Prezime</th>
			<th>Broj javnih slika</th>";
	echo "</tr></thead>";
	date_default_timezone_set("Europe/Zagreb");

	echo "<tbody>";
	while(list($slika_id,$planina_id,$korisnik_id)=mysqli_fetch_array($rs)){
		echo "<tr>
			<td>$slika_id</td>
			<td>$planina_id</td>
			<td>$korisnik_id</td>";
			echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	
	echo '</div>';
?>
</div>

<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>