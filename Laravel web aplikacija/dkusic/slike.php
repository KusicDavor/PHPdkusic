<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
?>

<?php
	$sql="SELECT COUNT(*) FROM slika WHERE korisnik_id='$_SESSION[aktivni_korisnik_id]'";
	$rs=izvrsiUpit($bp,$sql);
	$red=mysqli_fetch_array($rs);
	$broj_redaka=$red[0];
	$broj_stranica=ceil($broj_redaka/$vel_str_slika);

	
	$sql = "SELECT s.*, p.naziv as planina FROM slika s, planina p WHERE s.planina_id=p.planina_id AND s.korisnik_id='$_SESSION[aktivni_korisnik_id]' LIMIT ".$vel_str_slika;
	if(isset($_GET['stranica'])){
		$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_slika);
		$aktivna=$_GET['stranica'];
	}
	else $aktivna = 1;
?>

<?php
	$rs=izvrsiUpit($bp,$sql);
	echo "<table id='tablice'>";
	echo "<thead><tr>
			<th>Naziv</th>
			<th>Slika</th>
			<th>Opis</th>
			<th>Datum</th>";
	echo "</tr></thead>";
	
	echo "<tbody>";
	while(list($slika_id,$planina_id,$korisnik_id,$naziv,$url,$opis,$datum_vrijeme_slikanja,$status)=mysqli_fetch_array($rs)){
		if($datum_vrijeme_slikanja!=null)$datum_vrijeme_slikanja=date("d.m.Y. H:i:s",strtotime($datum_vrijeme_slikanja));
		echo "<tr>
			<td>$naziv</td>
			<td><figure><a href='slikap.php?slikap=$naziv'><img src='$url' width='70' height='100' alt='Slika'/></figure></td>
			<td>$opis</td>
			<td>$datum_vrijeme_slikanja</td>";
			if($aktivni_korisnik_tip==2||$aktivni_korisnik_tip==1) echo "<td><a class='link' href='slikaa.php?slika=$slika_id'>UREDI STATUS</a></td>";
			else if(isset($_SESSION["aktivni_korisnik_id"])&&$_SESSION["aktivni_korisnik_id"]==$id) echo "<td><a class='link' href='slikaa.php?korisnik=$slika_id'.'$_SESSION[aktivni_korisnik_id]'>UREDI</a></td>'";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";

	echo "<br/>";
	?>
	<?php
		if($aktivna!=1){
		$prethodna=$aktivna-1;
		echo "<a padding: 30px class='link' href=\"slike.php?stranica=".$prethodna."\">&lt;</a>";
	}
	for($i=1;$i<=$broj_stranica;$i++){
		echo "<a class='link";
		if($aktivna==$i)echo " aktivna";
		echo "' href=\"slike.php?stranica=".$i."\">$i</a>";
	}
	if($aktivna<$broj_stranica){
		$sljedeca=$aktivna+1;
		echo "<a class='link' href=\"slike.php?stranica=".$sljedeca."\">&gt;</a>";
	}
	echo "<br/>";
	echo "<br>"; ?>
	
<?php
	echo "<a class='link' style='margin-left: 45%; border: solid 2px white; color:red; font-size: 30px' href='slikapp.php?slika=$slika_id'>DODAJ SLIKU</a>";
	echo '</div>';
?>


<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
