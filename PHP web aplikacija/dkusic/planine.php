<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
?>
<?php
	$sql="SELECT COUNT(*) FROM planina";
	$rs=izvrsiUpit($bp,$sql);
	$red=mysqli_fetch_array($rs);
	$broj_redaka=$red[0];
	$broj_stranica=ceil($broj_redaka/$vel_str_planina);

	$sql="SELECT * FROM planina ORDER BY planina_id LIMIT ".$vel_str_planina;
	if(isset($_GET['stranica'])){
		$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_planina);
		$aktivna=$_GET['stranica'];
	}
	else $aktivna=1;
?>
<div style="margin-left: 10px">
<?php
	$rs=izvrsiUpit($bp,$sql);
	echo "<table id='tablice'>";
	echo "<thead><tr>
		<th>Ime planine</th>
		<th>Opis</th>
		<th>Lokacija</th>
		<th>Geografska širina</th>
		<th>Geografska dužina</th>";
	echo "</tr></thead>";
	echo "<tbody>";
	while(list($id,$naziv,$opis,$lokacija,$sirina,$duzina)=mysqli_fetch_array($rs)){
		echo "<tr>
			<td>$naziv</td>
			<td>$opis</td>
			<td>$lokacija</td>
			<td>$sirina</td>
			<td>$duzina</td>";
		if($aktivni_korisnik_tip==0||$aktivni_korisnik_tip==1)echo "<td><a class='link' href='planina_uredi.php?planina=$id'>UREDI</a></td>";
			else if(isset($_SESSION["aktivni_korisnik_id"])&&$_SESSION["aktivni_korisnik_id"]==$id) echo '<td><a class="link" href="planina_uredi.php?planina='.$_SESSION["aktivni_korisnik_id"].'">UREDI</a></td>';
			echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	
	if($aktivna!=1){
		$prethodna=$aktivna-1;
		echo "<a padding: 30px class='link' href=\"planine.php?stranica=".$prethodna."\">&lt;</a>";
	}
	for($i=1;$i<=$broj_stranica;$i++){
		echo "<a class='link";
		if($aktivna==$i)echo " aktivna";
		echo "' href=\"planine.php?stranica=".$i."\">$i</a>";
	}
	if($aktivna<$broj_stranica){
		$sljedeca=$aktivna+1;
		echo "<a class='link' href=\"planine.php?stranica=".$sljedeca."\">&gt;</a>";
	}
	
	echo "<br>";
	if($aktivni_korisnik_tip==0||$aktivni_korisnik_tip==1)echo "<a class='link' style='margin-left: 500px' href='planina_uredi.php?planina=$id'>DODAJ PLANINU</a>";
	echo '</div>';
?>
</div>
<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>