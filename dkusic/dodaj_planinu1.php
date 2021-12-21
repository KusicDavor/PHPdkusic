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
			$korisnik_id=$_POST['korisnik_id'];
			$planina_id=$_POST['planina_id'];

			if($id==0){
				$sql="INSERT INTO moderator
				(korisnik_id,planina_id)
				VALUES
				($korisnik_id,'$planina_id');
				";
			}
			else{
				$sql="UPDATE moderator SET
					korisnik_id='$korisnik_id',
					planina_id='$planina_id',
					WHERE korisnik_id='$id'
				";
			}
			izvrsiUpit($bp,$sql);
			header("Location:moderatori.php");
		}
	}
	if(isset($_GET['dodaj_planinu'])){
		$id=$_GET['dodaj_planinu'];
		if($aktivni_korisnik_tip==2)$id=$_SESSION["aktivni_korisnik_id"];
		$sql="SELECT korisnik.korisnik_id, moderator.korisnik_id, korisnik.korisnicko_ime FROM moderator,korisnik WHERE korisnik.korisnik_id='$id'";
		$rs=izvrsiUpit($bp,$sql);
		list($korisnik_id,$planina_id,$korisnicko_ime)=mysqli_fetch_array($rs);
	}
	else{
		$korisnik_id="";
		$planina_id="";
	}
	if(isset($_POST['reset']))header("Location:dodaj_planinu.php");
?>
<form id="dodaj" method="POST" action="<?php if(isset($_GET['moderator']))echo "dodaj_planinu.php?dodaj_planinu=$id";else echo "dodaj_planinu.php";?>">
	<table>
			<tr>
			<td>
				<label for="korisnik_id"><strong>Korisnik:</strong></label>
			</td>
				<td>
				<?php
				$sql="SELECT korisnik.korisnik_id,korisnik.ime,korisnik.prezime FROM korisnik";
					echo "<select name=korisnik_id value='$korisnik_id'>Korisnik</option>";
					foreach ($rs=izvrsiUpit($bp,$sql) as $row){
						echo "<option value=$row[korisnik_id]>$row[ime] $row[prezime]</option>"; 
						}
						 echo "</select>";
					?>
				</td>
			</tr>
			<tr>
				<td>
				<label for="planina_id"><strong>Planina:</strong></label>
				</td>
				<td>
					
					<?php
				$sql="SELECT planina.planina_id,planina.naziv FROM planina";
					echo "<select name=planina_id value='$planina_id'>Ime planine</option>";
					foreach ($rs=izvrsiUpit($bp,$sql) as $row){
						echo "<option value=$row[planina_id]>$row[naziv]</option>"; 
						}
						 echo "</select>";
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
