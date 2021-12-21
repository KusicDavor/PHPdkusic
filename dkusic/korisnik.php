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
			
			if($aktivni_korisnik_tip==0) {
				header("Location:korisnici.php");	
				exit;
			}else if ($aktivni_korisnik_tip==2||$aktivni_korisnik_tip==1) {
				header("Location:logirani_korisnik.php");	
				exit;
			}
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
	if(isset($_POST['reset']))header("Location:korisnik.php");
?>
<form id="dodaj" method="POST" action="<?php if(isset($_GET['korisnik']))echo "korisnik.php?korisnik=$id";else echo "korisnik.php";?>">
	<table>
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
						value="<?php if(!isset($_POST['kor_ime']))echo $kor_ime; else echo $_POST['kor_ime'];?>" size="120" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="ime"><strong>Ime:</strong></label>
				</td>
				<td>
					<input type="text" name="ime" id="ime" value="<?php if(!isset($_POST['ime']))echo $ime; else echo $_POST['ime'];?>"
						size="120" minlength="1" maxlength="50" placeholder="Ime treba započeti velikim početnim slovom" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="prezime"><strong>Prezime:</strong></label>
				</td>
				<td>
					<input type="text" name="prezime" id="prezime" value="<?php if(!isset($_POST['prezime']))echo $prezime; else echo $_POST['prezime'];?>"
						size="120" minlength="1" maxlength="50" placeholder="Prezime treba započeti velikim početnim slovom" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="lozinka"><strong>Lozinka:</strong></label>
				</td>
				<td>
					<input <?php if(!empty($lozinka))echo "type='text'"; else echo "type='password'";?>
						name="lozinka" id="lozinka" value="<?php if(!isset($_POST['lozinka']))echo $lozinka; else echo $_POST['lozinka'];?>"
						size="120" minlength="8" maxlength="50"
						placeholder="Lozinka treba sadržati minimalno 8 znakova"
						required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="email"><strong>E-mail:</strong></label>
				</td>
				<td>
					<input type="email" name="email" id="email" value="<?php if(!isset($_POST['email']))echo $email; else echo $_POST['email'];?>"
						size="120" minlength="5" maxlength="50" placeholder="Ispravan oblik elektroničke pošte je nesto@nesto.nesto" required="required"/>
				</td>
				<tr>
				<td>
					<label for="blokiran"><strong>Blokiran:</strong></label>
				</td>
				<td>
				<select id="blokiran" name="blokiran" style="font-size: 20px">
						<?php
							if(isset($_POST['blokiran'])){
								echo '<option value="0"';if($_POST['blokiran']==1)echo " selected='selected'";echo'>1</option>';
								echo '<option value="1"';if($_POST['blokiran']==0)echo " selected='selected'";echo'>0</option>';
							}
							else{
								echo '<option value="0"';if($blokiran==0)echo " selected='selected'";echo'>0</option>';
								echo '<option value="1"';if($blokiran==1)echo " selected='selected'";echo'>1</option>';
							}
						?>
				</td>
			</tr>
			
			<?php
				if($_SESSION['aktivni_korisnik_tip']==0){
			?>
			<tr>
				<td><label for="tip"><strong>Tip korisnika:</strong></label></td>
				<td>
					
					<?php
				$sql="SELECT tip_korisnika_id,naziv FROM tip_korisnika";
					echo "<select name=tip value='$tip'>Tip korisnika</option>";
					foreach ($rs=izvrsiUpit($bp,$sql) as $row){
						echo "<option value=$row[tip_korisnika_id]>$row[naziv]</option>"; 
						}
						 echo "</select>";
					?>
					
				</td>
			</tr>
			<?php
				}
			?>
			<tr>
				<td>
					<label for="slika"><strong>Slika:</strong></label>
				</td>
				<td>
				<?php
					$dir=scandir("korisnici");
					echo '<select id="slika" name="slika">';
					foreach($dir as $key => $value){
						if($key<2)continue;
						else if(strcmp((isset($_POST['slika'])?$_POST['slika']:$slika),"korisnici/".$value)==0){
							echo '<option value="'."korisnici/".$value.'"';
							echo ' selected="selected">'."korisnici/".$value;
							echo '</option>';
						}
						else{
							echo '<option value="'."korisnici/".$value.'">';
							echo "korisnici/".$value;
							echo '</option>';
						}
					}
					echo '</select>';
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
