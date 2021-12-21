<?php
	include("zaglavlje.php");
?>

<article>
	<br>
	<div style="border: solid 3px white; padding: 3px; font-size: 25px">
	Sustav omogućuje kreiranje javne i privatne galerije slika hrvatskih planina. <br>Sustav mora imati mogućnost prijave i odjave korisnika sa sustava. <br>U sustavu postoji jedan ugrađeni administrator (korisničko ime: admin, lozinka: foi). <br>Administrator je prijavljeni korisnik koji ima vrstu jednaku jedan. <br>Sustav obavezno sadrži stranicu o_autoru.html (poveznica na stranicu mora biti u zaglavlju svake stranice) u kojoj se nalaze osobni podaci autora (svi podaci su obavezni): ime, prezime, broj indeksa, mail (obavezno FOI mail), centar, godina (akademska godina prvog upisa kolegija IWA) i slika JPG formata veličine 300x400px (npr. kao na osobnoj iskaznici ili indeksu).<br>Napomena: Svi datumi moraju se unositi od strane korisnika i prikazati korisniku u formatu „d.m.Y“, a vrijeme (00:00:00 – 23:59:59) u obliku „H:i:s“ (ne koristiti date i time HTML tip za input element). Format „d.m.Y” predstavlja kod PHP date funkciji i preslikava se na hrvatski format „dd.mm.gggg”. Format „H:i:s” predstavlja kod PHP date funkciji i preslikava se na hrvatski format „hh.mm.ss”.<br>Poslužitelj se naziva localhost a baza podataka je iwa_2020_vz_projekt.<br>Korisnik za pristup do baze podataka naziva se iwa_2020 a lozinka je foi2020.<br>Kod izrade projektnog rješenja treba se točno držati uputa i NE SMIJE se mijenjati (naziv poslužitelja, baze podataka, struktura tablica, korisnik i lozinka).<br>Završeno rješenje projektnog zadatka treba poslati kroz sustav za predaju rješenja nakon čega slijedi obavijest i dogovor o obrani projekta.<br>Obrana projektnog rješenja se obavlja na računalu i bazi podataka nastavnika.
	</div>
	<br>
	<table style="border: solid 5px black">
		<thead>
			<tr>
				<th class="lijevi">Popis uloga</th>
				<th>Opis uloga</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="text-align: center">Administrator</td>
				<td>Administrator uz svoje funkcionalnosti ima i sve funkcionalnosti kao i moderator. <br>Unosi, ažurira i pregledava korisnike sustava te definira i ažurira njihove tipove. <br>Unosi, pregledava i ažurira planine (npr. Dinara, Velebit, ...) te dodjeljuje moderatore za planinu. <br>Jedna planina može imati jednog ili više moderatora, jedan moderator može biti zadužen za više planina. <br>Administrator vidi popis blokiranih korisnika (blokiran=1) te ih može od blokirati (blokiran=0). <br>Administrator vidi statistiku broja privatnih i javnih slika po korisniku sortirano prezimenu korisnika.</td>
			</tr>
			<tr>
				<td style="text-align: center">Moderator</td>
				<td>Moderator uz svoje funkcionalnosti ima i sve funkcionalnosti kao i registrirani korisnik te dodano vidi popis svih planina za koje je zadužen. <br>Odabirom planine može vidjeti popis svih javnih slika koje su dodane za tu planinu sa imenom i prezimenom osobe koja je tu sliku postavila. <br>Klikom na prezime dobiva galeriju javnih slika odabranog korisnika. <br>Ako želi može blokirati korisnika (blokiran=1) čime sve njegove slike postaju privatne i korisnik ne može dodavati nove slike dok ga administrator ne od blokira (blokiran=0).</td>
			</tr>
			<tr>
				<td style="text-align: center">Registrirani korisnik</td>
				<td>Registrirani korisnik uz svoje funkcionalnosti ima i sve funkcionalnosti kao i neprijavljeni korisnik. <br>Korisnik može dodavati nove slike planina. <br>Prilikom dodavanja bira planinu, unosi url do slike na webu, definira datum i vrijeme slikanja, daje naziv i opis slici, automatski se status slike postavlja na 1 (javna). <br>Korisnik vidi popis svih svojih slika sa informacijom o statusu. <br>Korisnik može ažurirati podatke o slici pri čemu može promijeniti status slike (0 - privatna) ili (1 – javna).</td>
			</tr>
			<tr>
				<td style="text-align: center">Anonimni/neregistrirani korisnik</td>
				<td>Anonimni/neregistrirani korisnik može vidjeti galeriju javnih slika hrvatskih planina sortirano silazno po datumu i vremenu slikanja. <br>Može filtrirati podatke na temelju naziva planine i/ili vremenskog razdoblja slikanja. <br>Vremensko razdoblje se definira datumom i vremenom od i do. <br>Klikom na sliku dobivaju se detaljne informacije o slici sa informacijama o planini u koju slika pripada te imenom i prezimenom korisnika koji je postavio sliku. <br>Korisnik može kliknuti na naziv planine te se vraća na galeriju slika i odmah vidi samo slike te planine. <br>Korisnik može kliknuti na prezime korisnika i dobiva galeriju javnih slika tog korisnika te opet može kliknuti na sliku i doći do detaljnih informacija slike.</td>
			</tr>
		</tbody>
	</table>
</article>

<?php
	include("podnozje.php");
?>
