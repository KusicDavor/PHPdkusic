<?php
	include("zaglavlje.php");
	$bp=spojiNaBazu();
?>
<?php
	$greska="";
	if(isset($_POST['submit'])){
		foreach($_POST as $key => $value)if(strlen($value)==0)$greska="Sva polja za unos su obavezna";
		if(empty($greska)){
			$id=$_POST['novi'];
			$naziv=$_POST['naziv'];
			$opis=$_POST['opis'];
			$lokacija=$_POST['lokacija'];
			$sirina=$_POST['geografska_sirina'];
			$duzina=$_POST['geografska_duzina'];
			
			izvrsiUpit($bp,$sql);
			header("Location:planine.php");
		}
	}
	if(isset($_GET['planina'])){
		$id=$_GET['planina'];
		$sql="SELECT * FROM planina WHERE planina_id='$id'";
		$rs=izvrsiUpit($bp,$sql);
		list($id,$naziv,$opis,$lokacija,$sirina,$duzina)=mysqli_fetch_array($rs);
	}
	else{
		$naziv="";
		$opis="";
		$lokacija="";
		$sirina="";
		$duzina="";
	}
	if(isset($_POST['reset']))header("Location:planina.php");
?>
<form id="dodaj" method="POST" action="<?php if(isset($_GET['planina']))echo "planina_uredi.php?planina=$id";else echo "planina.php";?>">
	<table>
		<tbody>
		<tr>
				<td colspan="2">
					<input type="hidden" name="novi" value="<?php if(!empty($planina_id))echo $planina_id;else echo 0;?>"/>
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
					<input type="text" name="naziv" readonly=readonly id="naziv"
						<?php if(isset($id)) ?>
						value="<?php if(!isset($_POST['naziv']))echo $naziv; else echo $_POST['naziv'];?>" size="30"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="opis"><strong>Opis:</strong></label>
				</td>
				<td>
					<input type="text" name="opis" readonly=readonly id="opis" value="<?php if(!isset($_POST['opis']))echo $opis; else echo $_POST['opis'];?>"
						size="120" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="lokacija"><strong>Lokacija:</strong></label>
				</td>
				<td>
					<input type="text" name="lokacija" readonly=readonly id="lokacija" value="<?php if(!isset($_POST['lokacija']))echo $lokacija; else echo $_POST['lokacija'];?>"
						size="120" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="sirina"><strong>Geografska širina:</strong></label>
				</td>
				<td>
					<input type="text" name="sirina" readonly=readonly id="sirina" value="<?php if(!isset($_POST['sirina']))echo $sirina; else echo $_POST['sirina'];?>"
						size="120" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="duzina"><strong>Geografska dužina:</strong></label>
				</td>
				<td>
					<input type="text" name="duzina" readonly=readonly id="duzina" value="<?php if(!isset($_POST['duzina']))echo $duzina; else echo $_POST['duzina'];?>"
						size="120" required="required"/>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>