<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
?>
<?php
	$greska="";
	if(isset($_POST['submit'])){
		foreach($_POST as $key => $value)if(strlen($value)==0)$greska="Sva polja za unos su obavezna";
		if(empty($greska)){
			$slika_id=$_POST['slika_id'];
			$planina_id=$_POST['planina_id'];
			$korisnik_id=$_POST['korisnik_id'];
			$naziv=$_POST['naziv'];
			$url=$_POST['url'];
			$opis=$_POST['opis'];
			$datum_vrijeme_slikanja=$_POST['datum_vrijeme_slikanja'];
			$status=$_POST['status'];
			
			izvrsiUpit($bp,$sql);
			if($aktivni_korisnik_tip==0) {
				header("Location:sve_slike.php");	
				exit;
			}else if ($aktivni_korisnik_tip==2||$aktivni_korisnik_tip==1) {
				header("Location:slike.php");	
				exit;
			}
		}
	}
	if(isset($_GET['slika'])){
		$id=$_GET['slika'];
		$sql="SELECT slika.naziv,url,slika.opis,datum_vrijeme_slikanja,ime,slika.korisnik_id,prezime,planina.planina_id,planina.naziv
				FROM slika,korisnik,planina
				WHERE slika.korisnik_id = korisnik.korisnik_id AND slika.planina_id=planina.planina_id AND slika.slika_id='$id'";
		$rs=izvrsiUpit($bp,$sql);
		list($naziv,$url,$opis,$datum_vrijeme_slikanja,$ime,$slika,$prezime,$planina_id,$planina_naziv)=mysqli_fetch_array($rs);
	}
	else{
		$slika_id="";
		$planina_id="";
		$korisnik_id="";
		$naziv="";
		$url="";
		$opis="";
		$datum_vrijeme_slikanja="";
		$status="";
	}
	if(isset($_POST['reset']))header("Location:slika1p.php");
?>

<form method="POST" action="<?php if(isset($_GET['slika']))echo "slika1p.php?korisnik=$id";else echo "slika1p.php";?>">
	<table>
		<tbody>
			<tr>
				<td colspan="2">
					<input type="hidden" readonly=readonly name="slika_id" value="<?php if(!empty($slika_id))echo $slika_id;else echo 0;?>"/>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<label class="greska"><?php if($greska!="")echo $greska; ?></label>
				</td>
			</tr>
			<tr>
				<td class="lijevi">
					<label for="naziv"><strong>Naziv:</strong></label>
				</td>
				<td>
					<input type="text" name="naziv" id="naziv" readonly=readonly
						value="<?php if(!isset($_POST['naziv']))echo $naziv; else echo $_POST['naziv'];?>" size="80" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="opis"><strong>Opis:</strong></label>
				</td>
				<td>
					<input type="text" readonly=readonly name="opis" id="opis" value="<?php if(!isset($_POST['opis']))echo $opis; else echo $_POST['opis'];?>"
						size="100" required="required"/>
				</td>
			</tr>
				<tr>
				<td style="width: 300px">
					<label for="datum_vrijeme_slikanja"><strong>Datum i vrijeme slikanja:</strong></label>
				</td>
				<td>
					<input readonly=readonly type="text" name="datum_vrijeme_slikanja" id="datum_vrijeme_slikanja" value="<?php
		if(!isset($_POST['datum_vrijeme_slikanja']))echo $datum_vrijeme_slikanjadate=date("d.m.Y H:i:s",strtotime($datum_vrijeme_slikanja)); else echo $_POST['datum_vrijeme_slikanja'];?>"
						size="30" placeholder="YYYY-MM-DD HH:MM:SS" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="ime"><strong>Ime:</strong></label>
				</td>
				<td>
					<input readonly=readonly type="text" name="ime" id="ime" value="<?php if(!isset($_POST['ime']))echo $ime; else echo $_POST['ime'];?>"
						size="30" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="prezime"><strong>Prezime:</strong></label>
				</td>
				<td>
					<input readonly=readonly type="text" name="prezime" id="prezime" value="<?php if(!isset($_POST['prezime']))echo $prezime; else echo $_POST['prezime'];?>"
						size="30" required="required"/>
				</td>
				<td>
				<?php
				echo "<a class='link' href='korisnik_slike.php?slika=$prezime'>Korisnikove slike</a></td>";
				?>
				</td>
				<td>
			<tr>
				<td>
					<label for="planina_naziv"><strong>Planina:</strong></label>
				</td>
				<td style="width: 5px">
					<input readonly=readonly type="text" name="planina_naziv" id="planina_naziv" value="<?php if(!isset($_POST['planina_naziv']))echo $planina_naziv; else echo $_POST['planina_naziv'];?>"
						size="30" required="required"/>
				</td>
				<td>
				<?php
				if ($aktivni_korisnik_tip==0) {
				echo "<a class='link' href='planina_uredi.php?planina=$planina_id'>O planini</a></td>";
				echo "<td><a class='link' href='planine_filter.php?planina=$planina_id'>Više slika planine</a></td>"; }
				else {
					echo "<a class='link' href='planina_uredi_obicni.php?planina=$planina_id'>O planini</a></td>";
					echo "<td><a class='link' href='planine_filter.php?planina=$planina_id'>Više slika planine</a></td>";
				}
				?>
				</td>
			</tr>
				<?php
					echo "<tr><td><td><img src='$url' width='60%' alt='Slika'/></td></td></tr>";
				?>
				</td>
			</tr>
			
		</tbody>
	</table>
</form>
<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
