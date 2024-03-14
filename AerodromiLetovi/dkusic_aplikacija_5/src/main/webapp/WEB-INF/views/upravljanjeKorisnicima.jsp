<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Aplikacija 5 - Pogled 5.2</title>

<style>
button {
	background-color: grey;
	color: white;
	font-size: 15px;
	padding: 3px 4px;
}
</style>
</head>

<body>
	<h1>Upravljanje korisnicima</h1>
	<a href="${pageContext.servletContext.contextPath}/mvc/izbornik/">Početna</a>
	<br />
	<br>
	<a
		href="${pageContext.servletContext.contextPath}/mvc/izbornik/korisnici/registracija">5.2.1
		Registracija korisnika</a>
	<br />
	<br>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/korisnici/prijava">
		<label for="korIme">Korisničko ime:</label> <input type="text"
			id="korIme" name="korIme"> <label for="lozinka">Lozinka:</label>
		<input type="password" id="lozinka" name="lozinka"> <label
			for="trazeniKorisnik">Traženi korisnik (korisničko ime):</label> <input
			type="text" id="trazeniKorisnik" name="trazeniKorisnik"> <input
			type="submit" value="5.2.2 Prijavljivanje korisnika">
	</form>
	<br />
	<br>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/korisnici/pregled">
		<label for="name">Ime:</label> <input type="text" id="ime" name="ime">
		<label for="prezime">Prezime:</label> <input type="text" id="prezime"
			name="prezime"> <input type="submit"
			onclick="postaviUrl('${pageContext.servletContext.contextPath}/mvc/izbornik/korisnici/pregled')"
			value="5.2.3 Pregled korisnika">
	</form>
</body>
</html>