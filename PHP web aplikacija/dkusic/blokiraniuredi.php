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
	$greska="";
	if(isset($_POST['submit'])){
		foreach($_POST as $key => $value)if(strlen($value)==0)$greska="Sva polja za unos su obavezna";
		if(empty($greska)){
			$id=$_POST['novi'];
			$tip=$_POST['tip'];
			$kor_ime=$_POST['kor_ime'];
			$lozinka=$_POST['lozinka'];
			$ime=$_POST['ime'];
			$prezime=$_POST['prezime'];
			$email=$_POST['email'];
			$blokiran=$_POST['blokiran'];
			$slika=$_POST['slika'];

			if($id==0){
				$sql="INSERT INTO korisnik
				(tip_korisnika_id,korisnicko_ime,lozinka,ime,prezime,email,blokiran,slika)
				VALUES
				($tip,'$kor_ime','$lozinka','$ime','$prezime','$email','$blokiran','$slika');
				";
			}
			else{
				$sql="UPDATE korisnik SET
					tip_korisnika_id='$tip',
					ime='$ime',
					prezime='$prezime',
					lozinka='$lozinka',
					email='$email',
					blokiran='$blokiran',
					slika='$slika'
					WHERE korisnik_id='$id'
				";
			}
			izvrsiUpit($bp,$sql);
			header("Location:blokirani.php");
		}
	}
	if(isset($_GET['korisnik'])){
		$id=$_GET['korisnik'];
		if($aktivni_korisnik_tip==2)$id=$_SESSION["aktivni_korisnik_id"];
		$sql="SELECT * FROM korisnik WHERE korisnik_id='$id'";
		$rs=izvrsiUpit($bp,$sql);
		list($id,$tip,$kor_ime,$lozinka,$ime,$prezime,$email,$blokiran,$slika)=mysqli_fetch_array($rs);
	}
	else{
		$tip=2;
		$kor_ime="";
		$lozinka="";
		$ime="";
		$prezime="";
		$email="";
		$blokiran="";
		$slika="";
	}
	if(isset($_POST['reset']))header("Location:blokiraniuredi.php");
?>
<form id="dodaj" method="POST" action="<?php if(isset($_GET['korisnik']))echo "blokiraniuredi.php?korisnik=$id";else echo "blokiraniuredi.php";?>">
	<table style="margin-left: 350px">
		<tbody>
			<tr>
				<td colspan="2">
					<input type="hidden" name="novi" value="<?php if(!empty($id))echo $id;else echo 0;?>"/>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<label class="greska"><?php if($greska!="")echo $greska; ?></label>
				</td>
			</tr>
			<tr>
				<td class="lijevi">
					<label for="kor_ime"><strong>Korisničko ime:</strong></label>
				</td>
				<td>
					<input type="text" name="kor_ime" id="kor_ime"
						<?php if(isset($id))echo "readonly='readonly'";?>
						value="<?php if(!isset($_POST['kor_ime']))echo $kor_ime; else echo $_POST['kor_ime'];?>" size="40" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="ime"><strong>Ime:</strong></label>
				</td>
				<td>
					<input type="text" name="ime" id="ime" <?php if(isset($id))echo "readonly='readonly'";?>
					value="<?php if(!isset($_POST['ime']))echo $ime; else echo $_POST['ime'];?>"
						size="40" minlength="1" maxlength="50" placeholder="Ime treba započeti velikim početnim slovom" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="prezime"><strong>Prezime:</strong></label>
				</td>
				<td>
					<input type="text" name="prezime" id="prezime" <?php if(isset($id))echo "readonly='readonly'";?>
					value="<?php if(!isset($_POST['prezime']))echo $prezime; else echo $_POST['prezime'];?>"
						size="40" minlength="1" maxlength="50" placeholder="Prezime treba započeti velikim početnim slovom" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
				<?php if($aktivni_korisnik_tip==1) { 
					echo '<label for="blokiran"><strong>Blokiraj:</strong></label>';
				}else {
					echo '<label for="blokiran"><strong>Blokiran:</strong></label>';
				} ?>
				</td>
				<td>
				<select id="blokiran" name="blokiran" style="font-size: 20px">
				<?php if($aktivni_korisnik_tip==1) {
							if(isset($_POST['blokiran'])){
								echo '<option value="0"';if($_POST['blokiran']==0)echo " selected='selected'";echo'>0</option>';
							}
							else{
								echo '<option value="1"';if($blokiran==1)echo " selected='selected'";echo'>1</option>';
							}
						}
				?>
				
				<?php if($aktivni_korisnik_tip==0) {
							if(isset($_POST['blokiran'])){
								echo '<option value="0"';if($_POST['blokiran']==0)echo " selected='selected'";echo'>0</option>';
								echo '<option value="1"';if($_POST['blokiran']==1)echo " selected='selected'";echo'>1</option>';
							}
							else{
								echo '<option value="1"';if($blokiran==1)echo " selected='selected'";echo'>1</option>';
								echo '<option value="0"';if($blokiran==0)echo " selected='selected'";echo'>0</option>';
							}
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