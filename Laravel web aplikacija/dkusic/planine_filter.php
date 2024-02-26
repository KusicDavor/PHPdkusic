<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
?>

<?php
	$sql="SELECT * FROM slika";
	$rs=izvrsiUpit($bp,$sql);
	$red=mysqli_fetch_array($rs);
	$broj_redaka=$red[0];
	$broj_stranica=ceil($broj_redaka/$vel_str_slika);

	
$sql = "SELECT * FROM slika,korisnik WHERE status='1' AND planina_id='$_GET[planina]' GROUP BY naziv";
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
			<th>Naziv</th>
			<th>Slika</th>
			<th>Opis</th>
			<th>Datum</th>";
	echo "</tr></thead>";
	date_default_timezone_set("Europe/Zagreb");

	echo "<tbody>";
	while(list($slika_id,$planina_id,$korisnik_id,$naziv,$url,$opis,$datum_vrijeme_slikanja,$status)=mysqli_fetch_array($rs)){
		if($datum_vrijeme_slikanja!=null)$datum_vrijeme_slikanja=date("d.m.Y. H:i:s",strtotime($datum_vrijeme_slikanja));
		echo "<tr>
			<td>$naziv</td>
			<td><figure><a href='slikap1.php?slika=$slika_id'><img src='$url' width='70' height='100' alt='Slika'/></figure></a></td>
			<td>$opis</td>
			<td>$datum_vrijeme_slikanja</td>";
			echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	
		if($aktivna!=1){
		$prethodna=$aktivna-1;
		echo "<a padding: 30px class='link' href=\"javne_slike.php?stranica=".$prethodna."\">&lt;</a>";
	}
	for($i=1;$i<=$broj_stranica;$i++){
		echo "<a class='link";
		if($aktivna==$i)echo " aktivna";
		echo "' href=\"javne_slike.php?stranica=".$i."\">$i</a>";
	}
	if($aktivna<$broj_stranica){
		$sljedeca=$aktivna+1;
		echo "<a class='link' href=\"javne_slike.php?stranica=".$sljedeca."\">&gt;</a>";
	}
	echo "<br/>";
	echo '</div>';
?>

<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>