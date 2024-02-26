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
	$greska="";
	if(isset($_POST['planina_id'])){
		foreach($_POST as $key => $value)if(strlen($value)==0)$greska="Sva polja za unos su obavezna";
		if(empty($greska)){
			$planina_id=$_POST['planina_id'];
			$naziv=$_POST['naziv'];
			$opis=$_POST['opis'];
			$lokacija=$_POST['lokacija'];
			$geografska_sirina=$_POST['geografska_sirina'];
			$geografska_duzina=$_POST['geografska_duzina'];
		}
	}
	if(isset($_GET['planina'])){
		$planina_id=$_GET['planina'];
		$sql="SELECT * FROM planina WHERE planina_id='$planina_id'";
		$id=$_SESSION["aktivni_korisnik_id"];
		$rs=izvrsiUpit($bp,$sql);
		list($planina_id,$naziv,$opis,$lokacija,$geografska_sirina,$geografska_duzina)=mysqli_fetch_array($rs);
	}
	else{
		$naziv="";
		$opis="";
		$lokacija="";
		$sirina="";
		$duzina="";
	}
	if(isset($_POST['reset']))header("Location:planina_uredi.php");
?>
<form id="planina_uredi" method="POST" action="<?php if(isset($_GET['planina']))echo "planina.php?planina=$planina_id";else echo "planina_uredi.php";?>">
	<table>
		<tbody>
		<tr>
				<td colspan="2">
					<input type="hidden" name="planina_id" value="<?php if(!empty($planina_id))echo $planina_id;else echo 0;?>"/>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<label class="greska"><?php if($greska!="")echo $greska; ?></label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="naziv"><strong>Naziv:</strong></label>
				</td>
				<td>
					<input type="text" name="naziv" id="naziv"
						value="<?php if(!isset($_POST['naziv']))echo $naziv; else echo $_POST['naziv'];?>" size="30"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="opis"><strong>Opis:</strong></label>
				</td>
				<td>
					<input type="text" name="opis" id="opis" value="<?php if(!isset($_POST['opis']))echo $opis; else echo $_POST['opis'];?>"
						size="120" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="lokacija"><strong>Lokacija:</strong></label>
				</td>
				<td>
					<input type="text" name="lokacija" id="lokacija" value="<?php if(!isset($_POST['lokacija']))echo $lokacija; else echo $_POST['lokacija'];?>"
						size="120" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="geografska_sirina"><strong>Geografska širina:</strong></label>
				</td>
				<td>
					<input type="number" step="any" min="0" max="10000" name="geografska_sirina" id="geografska_sirina" value="<?php if(!isset($_POST['geografska_sirina']))echo $geografska_sirina; else echo $_POST['geografska_sirina'];?>"
						size="120" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="geografska_duzina"><strong>Geografska dužina:</strong></label>
				</td>
				<td>
					<input type="number" step="any" min="0" max="10000" name="geografska_duzina" id="geografska_duzina" value="<?php if(!isset($_POST['geografska_duzina']))echo $geografska_duzina; else echo $_POST['geografska_duzina'];?>"
						size="120" required="required"/>
				</td>
				<tr>
				<td>
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
