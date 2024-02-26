<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();


	$greska="";
	if(isset($_POST['slika_id'])){
		foreach($_POST as $key => $value);if(strlen($value)==0)$greska="Sva polja za unos su obavezna";
		if(empty($greska)){
			$slika_id=$_POST['nova'];
			$planina_id=$_POST['planina_id'];
			$korisnik_id=$_POST['korisnik_id'];
			$naziv=$_POST['naziv'];
			$url=$_POST['url'];
			$opis=$_POST['opis'];
			$datum_vrijeme_slikanja = $_POST['datum_vrijeme_slikanja'];
			$status=$_POST['status'];

	}}
	if(isset($_GET['slika'])){
		$slika_id=$_GET['slika'];
		$sql="SELECT * FROM slika WHERE slika_id='$slika_id'";
		$id=$_SESSION["aktivni_korisnik_id"];
		$rs=izvrsiUpit($bp,$sql);
		list($slika_id,$korisnik_id,$planina_id,$naziv,$url,$opis,$datum_vrijeme_slikanja,$status)=mysqli_fetch_array($rs);
	}
	else{
		$planina_id="";
		$naziv="";
		$url="";
		$opis="";
		$datum_vrijeme_slikanja="";
		$status="";
	}
	if(isset($_POST['reset']))header("Location:slikapp.php");
?>

<form id="dodajslika" method="POST" action="<?php if(isset($_GET['slika']))echo "slika.php?slika=$slika_id";else echo "slikapp.php";?>">
	<table>
		<tbody>
			<tr>
				<td colspan="2">
					<input type="hidden" name="nova" value="<?php if(!empty($slika_id))echo $slika_id;else echo 0;?>"/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="korisnik_id" id="korisnik_id"
						value="<?php if(!isset($_POST['korisnik_id']))echo $id; else echo $_POST['korisnik_id'];?>" size="120" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="planina_id" id="planina_id" readonly=readonly value="<?php if(!isset($_POST['planina_id']))echo $planina_id; else echo $_POST['planina_id'];?>"
						size="120" required="required"/>
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
						value="<?php if(!isset($_POST['naziv']))echo $naziv; else echo $_POST['naziv'];?>" size="120" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="url"><strong>URL:</strong></label>
				</td>
				<td>
					<input type="text" name="url" id="url" readonly=readonly value="<?php if(!isset($_POST['url']))echo $url; else echo $_POST['url'];?>"
						size="120" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="opis"><strong>Opis:</strong></label>
				</td>
				<td>
					<input type="text" name="opis" id="opis" readonly=readonly value="<?php if(!isset($_POST['opis']))echo $opis; else echo $_POST['opis'];?>"
						size="120" required="required"/>
				</td>
			</tr>
				<tr>
				<td>
					<label for="datum_vrijeme_slikanja"><strong>Datum i vrijeme slikanja:</strong></label>
				</td>
				<td>
					<input type="text" name="datum_vrijeme_slikanja" id="datum_vrijeme_slikanja" readonly=readonly value="<?php if(!isset($_POST['datum_vrijeme_slikanja'])) echo $datum_vrijeme_slikanja=date("d.m.Y. H:i:s",strtotime($datum_vrijeme_slikanja)); else echo $_POST['datum_vrijeme_slikanja'];?>"
						size="120" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="status"><strong>Status:</strong></label>
				</td>
				<td>
				<select id="status" name="status" style="font-size: 20px">
						<?php
							if(isset($_POST['status'])){
								echo '<option value="0"';if($_POST['status']==1)echo " selected='selected'";echo'>1</option>';
								echo '<option value="1"';if($_POST['status']==0)echo " selected='selected'";echo'>0</option>';
							}
							else{
								echo '<option value="0"';if($status==0)echo " selected='selected'";echo'>0</option>';
								echo '<option value="1"';if($status==1)echo " selected='selected'";echo'>1</option>';
							}
						?>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<?php
						if(isset($id)&&$aktivni_korisnik_id==$id||!empty($id))echo '<input type="submit" name="submit" value="Pošalji"/>';
						else echo '<input type="submit" name="reset" value="Izbriši"/><input type="submit" name="submit" value="Pošalji"/>';
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