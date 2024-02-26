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

	
	$sql = "SELECT * FROM slika LIMIT ".$vel_str_slika;
	if(isset($_GET['stranica'])){
		$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_slika);
		$aktivna=$_GET['stranica'];
	}
	else $aktivna = 1;
?>

<?php
	echo '<br>';
	echo '<a style="margin-left: 920px; font-size: 30px; border: solid 2px black; background-color: white; color: crimson" href="statistika.php">STATISTIKA</a>';
	echo '<br>';echo '<br>';echo '<br>';
	$rs=izvrsiUpit($bp,$sql);
	echo "<table id='tablice' width=100%>";
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
			<td>$datum_vrijeme_slikanja</td>
			<td><a href='slika_uredi.php?slika=$slika_id'>Uredi</td>";
			echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";

		if($aktivna!=1){
		$prethodna=$aktivna-1;
		echo "<a padding: 30px class='link' href=\"sve_slike.php?stranica=".$prethodna."\">&lt;</a>";
	}
	for($i=1;$i<=$broj_stranica;$i++){
		echo "<a class='link";
		if($aktivna==$i)echo " aktivna";
		echo "' href=\"sve_slike.php?stranica=".$i."\">$i</a>";
	}
	if($aktivna<$broj_stranica){
		$sljedeca=$aktivna+1;
		echo "<a class='link' href=\"sve_slike.php?stranica=".$sljedeca."\">&gt;</a>";
	}
	echo "<br/>";
	echo '</div>';
?>

<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
