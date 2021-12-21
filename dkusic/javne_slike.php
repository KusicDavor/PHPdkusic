<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
?>

<?php
	$sql="SELECT * FROM slika ";
	$rs=izvrsiUpit($bp,$sql);
	$red=mysqli_fetch_array($rs);
	$broj_redaka=$red[0];
	$broj_stranica=ceil($broj_redaka/$vel_str_slika);

		echo '<form method="GET" action="javne_slike.php">
				<table style="margin-left: 100px"><tbody><tr>';
		echo '<td><label for="korisnik">Ime ili prezime:</label>';
		echo '<input type="text" value="';if(isset($_GET['korisnik'])&&!isset($_GET['reset']))echo $_GET['korisnik'];
		echo '" name="korisnik" id="korisnik"/></td>
			<td><label for="slika">Naziv slike:</label>';
		echo '<input type="text" value="';if(isset($_GET['slika'])&&!isset($_GET['reset']))echo $_GET['slika'];
		echo '" name="slika" id="slika"/></td>';
		echo '<td><label for="od">Od datuma:</label>';
		echo '<input type="text" value="';if(isset($_GET['od'])&&!isset($_GET['reset']))echo $_GET['od'];
		echo '" name="od" id="od" size="10" onclick="postaviDatum(this)"/></td>
			<td><label for="do">Do datuma:</label>';
		echo '<input type="text" value="';if(isset($_GET['do'])&&!isset($_GET['reset']))echo $_GET['do'];
		echo '" name="do" id="do" size="10"</td>
			<td><input type="submit" name="reset" value="Izbriši"/></td>
			<td><input type="submit" name="submit" value="Filter"/></td>
			</tr></tbody>
			</table></form><br>
		';
			
	$sql="SELECT ime,prezime AS korisnik, naziv,url,opis,datum_vrijeme_slikanja AS od,datum_vrijeme_slikanja AS do,status FROM slika,korisnik WHERE slika.korisnik_id=korisnik.korisnik_id AND status='1'
	";

	if(!isset($_GET['reset'])){
		if(isset($_GET['korisnik'])){
			$korisnik=mysqli_real_escape_string($bp,$_GET['korisnik']);
			$sql=$sql." AND (korisnik.ime like'%$korisnik%' OR korisnik.prezime like'%$korisnik%') ";
		}
		if(isset($_GET['slika'])&&!empty($_GET['slika'])){
			$naziv=$_GET['slika'];
			$sql=$sql." AND slika.naziv like'%$naziv%'";
		}
		if(isset($_GET['od'])&&strlen($_GET['od']>0)){
		  $od = strtotime($_GET['od']);
		  $od=date('Y-m-d H:i:s',$od );
			$sql=$sql." AND datum_vrijeme_slikanja > '$od'";
		}
		if(isset($_GET['do'])&&strlen($_GET['do']>0)){
			$do=strtotime($_GET['do']);
		  $do=date('Y-m-d H:i:s',$do);
			$sql=$sql." AND datum_vrijeme_slikanja IS NOT NULL AND datum_vrijeme_slikanja < '$do'";
		}
		if(isset($_GET['sort']))$sql=$sql." ORDER BY ".$_GET['sort'];
	}
	$rs=izvrsiUpit($bp,$sql);
	$par=$putanja.(strpos($putanja,"?")?"&":"?");

	
	echo "<table id=tablice style='margin-left: 220px'>";
	echo "<thead><tr>";
	echo "<th><a href='".$par."sort=korisnik' class='sortable'>Korisnik</a></th>";
	echo "<th><a href='".$par."sort=korisnik' class='sortable'>Naziv</a></th>";
	echo "<th width=50%><a href'".$par."sort=korisnik' class='sortable'>URL</a></th>";
	echo "<th><a href='".$par."sort=od' class='sortable'>Poslikano</a></th>";
	echo "</tr></thead>";
	date_default_timezone_set("Europe/Zagreb");
	echo "<tbody>";
	while(list($ime,$prezime,$slika,$url,$opis,$datum_vrijeme_slikanja)=mysqli_fetch_array($rs)){
		if($datum_vrijeme_slikanja!=null)$datum_vrijeme_slikanja=date("d.m.Y. H:i:s",strtotime($datum_vrijeme_slikanja));
		echo "<tr>
			<td>$ime $prezime</td>
			<td>$slika</td>
			<td><figure><a href='slikap.php?slikap=$slika'><img src='$url' width='200' height='200' alt='Slika'/></figure></a></td>
			<td>$datum_vrijeme_slikanja</td>
		</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	
	echo "<br/>";
	echo '</div>';
?>

<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>