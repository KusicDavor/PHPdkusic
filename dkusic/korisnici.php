<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
?>

<?php
	if(!$aktivni_korisnik_tip==0) {
		header("Location:index.php");	
		exit;
	}elseif (!isset($aktivni_korisnik_tip)) {
		header("Location:index.php");	
		exit;
	}
?>

<?php
	$sql="SELECT COUNT(*) FROM korisnik";
	$rs=izvrsiUpit($bp,$sql);
	$red=mysqli_fetch_array($rs);
	$broj_redaka=$red[0];
	$broj_stranica=ceil($broj_redaka/$vel_str);

	
	$sql="SELECT * FROM korisnik ORDER BY korisnik_id LIMIT ".$vel_str;
	if(isset($_GET['stranica'])){
		$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str);
		$aktivna=$_GET['stranica'];
	}
	else $aktivna = 1;
?>
<div style="margin-left: 300px">
<?php
	$rs=izvrsiUpit($bp,$sql);
	echo "<table id='tablice'>";
	echo "<thead><tr>
			<th>Korisničko ime</th>
			<th>Lozinka</th>
			<th>Ime</th>
			<th>Prezime</th>
			<th>E-mail</th>
			<th>Blokiran</th>
			<th>Slika</th>";
	echo "</tr></thead>";
	echo "<tbody>";
	while(list($id,$tip,$kor_ime,$lozinka,$ime,$prezime,$email,$blokiran,$slika)=mysqli_fetch_array($rs)){
		echo "<tr>
			<td>$kor_ime</td>
			<td>$lozinka</td>
			<td>$ime</td>";
	echo "<td>".(empty($prezime)?"&nbsp;":"$prezime")."</td>
			<td>".(empty($email)?"&nbsp;":"$email")."</td>
			<td>$blokiran</td>
			<td><figure><img src='$slika' width='70' height='100' alt='Slika korisnika $ime $prezime'/></figure></td>";
			if($aktivni_korisnik_tip==0||$aktivni_korisnik_tip==1)echo "<td><a class='link' href='korisnik.php?korisnik=$id'>UREDI</a></td>";
			else if(isset($_SESSION["aktivni_korisnik_id"])&&$_SESSION["aktivni_korisnik_id"]==$id) echo '<td><a class="link" href="korisnik.php?korisnik='.$_SESSION["aktivni_korisnik_id"].'">UREDI</a></td>';
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";

		if($aktivna!=1){
		$prethodna=$aktivna-1;
		echo "<a padding: 30px class='link' href=\"korisnici.php?stranica=".$prethodna."\">&lt;</a>";
	}
	for($i=1;$i<=$broj_stranica;$i++){
		echo "<a class='link";
		if($aktivna==$i)echo " aktivna";
		echo "' href=\"korisnici.php?stranica=".$i."\">$i</a>";
	}
	if($aktivna<$broj_stranica){
		$sljedeca=$aktivna+1;
		echo "<a class='link' href=\"korisnici.php?stranica=".$sljedeca."\">&gt;</a>";
	}
	echo "<br/>";
	if($aktivni_korisnik_tip==0||$aktivni_korisnik_tip==1)echo '<a class="link" style="margin-left: 500px" href="korisnik.php?moderator">DODAJ KORISNIKA</a>';
	if(isset($_SESSION["aktivni_korisnik_id"]))echo '<a class="link" href="korisnik.php?korisnik='.$_SESSION["aktivni_korisnik_id"].'">UREDI MOJE PODATKE</a>';
	echo '</div>';
?>
</div>

<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
