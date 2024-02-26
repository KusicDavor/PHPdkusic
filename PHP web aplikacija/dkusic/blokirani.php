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
	$sql="SELECT COUNT(*) FROM korisnik";
	$rs=izvrsiUpit($bp,$sql);
	$red=mysqli_fetch_array($rs);
	$broj_redaka=$red[0];
	$broj_stranica=ceil($broj_redaka/$vel_str_mod);

	
	$sql="SELECT * FROM korisnik ORDER BY korisnik_id LIMIT ".$vel_str_mod;
	if(isset($_GET['stranica'])){
		$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_mod);
		$aktivna=$_GET['stranica'];
	}
	else $aktivna = 1;
?>
<div style="margin-left: 650px">
<?php
	$rs=izvrsiUpit($bp,$sql);
	echo "<table id='tablice'>";
	echo "<thead><tr>
			<th>Korisničko ime</th>
			<th>Blokiran</th>";
	echo "</tr></thead>";
	
	echo "<tbody>";
	while(list($id,$tip,$kor_ime,$lozinka,$ime,$prezime,$email,$blokiran, $slika)=mysqli_fetch_array($rs)){
		echo "<tr>
			<td>$kor_ime</td>
			<td>$blokiran</td>";
			if($aktivni_korisnik_tip==0||$aktivni_korisnik_tip==1)echo "<td><a class='link' href='blokiraniuredi.php?korisnik=$id'>UREDI</a></td>";
			else if(isset($_SESSION["aktivni_korisnik_id"])&&$_SESSION["aktivni_korisnik_id"]==$id) echo '<td><a class="link" href="blokiraniuredi.php?korisnik='.$_SESSION["aktivni_korisnik_id"].'">UREDI</a></td>';
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "<br>";
	echo "<br>"; ?>
</div>

<div style="margin-left: 810px">
<?php
		if($aktivna!=1){
		$prethodna=$aktivna-1;
		echo "<a padding: 30px class='link' href=\"blokirani.php?stranica=".$prethodna."\">&lt;</a>";
	}
	for($i=1;$i<=$broj_stranica;$i++){
		echo "<a class='link";
		if($aktivna==$i)echo " aktivna";
		echo "' href=\"blokirani.php?stranica=".$i."\">$i</a>";
	}
	if($aktivna<$broj_stranica){
		$sljedeca=$aktivna+1;
		echo "<a class='link' href=\"blokirani.php?stranica=".$sljedeca."\">&gt;</a>";
	}
	echo "<br/>";
	echo "<br>"; ?>
</div>

<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
