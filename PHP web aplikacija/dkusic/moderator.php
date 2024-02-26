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
			$id=$_SESSION["aktivni_korisnik_id"];
			$korisnik_id=$_POST['korisnik_id'];
					
			if($korisnik_id==0){
				$sql="INSERT INTO moderator
				(korisnik_id,planina_id)
				VALUES
				($korisnik_id,$planina_id);
				";
			}
			else{
				$sql="UPDATE moderator SET
					korisnik_id='$korisnik_id',
					planina_id='$planina_id',
					WHERE korisnik_id='$id'
				";
			}
		}
	}
	if(isset($_GET['moderator'])){
		$id=$_GET['moderator'];
		if($aktivni_korisnik_tip==2)$id=$_SESSION["aktivni_korisnik_id"];
		$sql="SELECT p.naziv as planina, korisnicko_ime FROM korisnik, planina p, moderator m WHERE m.planina_id=p.planina_id AND korisnik.korisnik_id = $id GROUP BY naziv";
		$rs=izvrsiUpit($bp,$sql);
		list($planina_id,$korisnik_id)=mysqli_fetch_array($rs);
	}
	else{
		$korisnik_id="";
		$planina_id="";
	}
	if(isset($_POST['reset']))header("Location:moderatori.php");
?>
<form id="dodajmoderatora" method="POST" action="<?php if(isset($_GET['moderator']))echo "moderator.php?moderator=$id";else echo "moderator.php";?>">
	<table id="tablice">
		<tbody>
			<tr>
				<td>
					<label for="korisnik_id"><strong>Korisničko ime:</strong></label>
				</td>
				<td>
					<input type="text" name="korisnik_id" id="korisnik_id"
						<?php
							if(isset($korisnik_id))echo "readonly='readonly'";?>
						value="<?php if(!isset($_POST['korisnik_id']))echo $korisnik_id; else echo $_POST['korisnik_id'];?>" size="20" required="required"/>
				</td>
			</tr>
		<tr>
				<td>
				
				<?php
				$sql="SELECT planina.planina_id,planina.naziv,moderator.planina_id FROM moderator,planina,korisnik WHERE moderator.korisnik_id=$id AND moderator.planina_id=planina.planina_id GROUP BY planina.planina_id";
				$rs=izvrsiUpit($bp,$sql);
				foreach ($rs=izvrsiUpit($bp,$sql) as $row){
				echo "<tr><td><td>$row[naziv]</td></td>"; 
			}
			echo "<a style='color:red; margin-left: 800px; font-size: 30px; color: crimson; border: solid 2px white' href=moderator_planina.php?moderator=$id>Obriši moderatora</a>";
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