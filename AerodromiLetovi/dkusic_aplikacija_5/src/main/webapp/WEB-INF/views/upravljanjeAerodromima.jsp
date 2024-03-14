<!DOCTYPE html>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<html xmlns:h="http://java.sun.com/jsf/html">
<head>
<meta charset="UTF-8">
<title>Aplikacija 5 - Pogled 5.1</title>

<script type="text/javascript">
	var wsocket;
	function connect() {
		wsocket = new WebSocket("ws://localhost:8080/dkusic_aplikacija_4/info");
		wsocket.onmessage = onMessage;
	}

	function dodajAerodrom() {
		wsocket.send("dodaj");
	}

	function onMessage(evt) {
		var primljenaPoruka = evt.data;
		document.getElementById("dodavanje").innerHTML = primljenaPoruka;
	}

	window.addEventListener("load", connect, false);
</script>

<style>
button {
	background-color: grey;
	color: white;
	font-size: 15px;
	padding: 3px 4px;
}
</style>
</head>

<body onclick="dodajAerodrom();">
	<h1>Upravljanje aerodromima</h1>
	<div id="dodavanje"></div>
	<a href="${pageContext.servletContext.contextPath}/mvc/izbornik/">Početna</a>

	<br />
	<br>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/svi">
		<label for="traziNaziv">Naziv aerodroma:</label> <input type="text"
			id="traziNaziv" name="traziNaziv"> <label for="traziDrzavu">Naziv
			države:</label> <input type="text" id="traziDrzavu" name="traziDrzavu">
		<label for="odBroja">Od broja:</label> <input type="number"
			id="odBroja" name="odBroja"> <label for="broj">Broj:</label>
		<input type="number" id="broj" name="broj"> <input
			type="submit" value="5.5.1 Pregled svih aerodroma uz filtriranje">
	</form>
	<br />
	<br>
	<a
		href="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/pregledPreuzimanje">5.5.3
		Pregled aerodroma za koje se za preuzimaju podaci o polascima</a>
	<br />
	<br>

	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/pregledUdaljenost1">
		<label for=icaoOd>ICAO od:</label> <input required type="text" id="icaoOd"
			name="icaoOd"> <label for="icaoDo">ICAO do:</label> <input required
			type="text" id="icaoDo" name="icaoDo"> <input type="submit"
			value="5.5.4 Pregled udaljenosti između dva aerodroma preko kojih se leti te ukupna
		udaljenost">
	</form>
	<br />
	<br>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/pregledUdaljenost2">
		<label for=icaoOd>ICAO od:</label> <input required type="text" id="icaoOd"
			name="icaoOd"> <label for="icaoDo">ICAO do:</label> <input required
			type="text" id="icaoDo" name="icaoDo"> <input type="submit"
			value="5.5.5 Pregled udaljenosti između dva aerodroma">
	</form>
	<br />
	<br>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/pregledUdaljenost3">
		<label for=icaoOd>ICAO od:</label> <input type="text" id="icaoOd" required
			name="icaoOd"> <label for="icaoDo">ICAO do:</label> <input
			type="text" id="icaoDo" name="icaoDo"> <input required type="submit"
			value="5.5.6 Pregled aerodroma i udaljenosti do polaznog aerodroma unutar države odredišnog aerodroma">
	</form>
	<br />
	<br>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/pregledUdaljenost4">
		<label for=icaoOd>ICAO od:</label> <input type="text" id="icaoOd" required
			name="icaoOd"> <label for="drzava">Država:</label> <input required
			type="text" id="drzava" name="drzava"> <label for="km">Kilometara:</label> <input required type="text" id="km" name="km"> <input
			type="submit"
			value="5.5.7 Pregled aerodroma i udaljenosti do polaznog aerodroma unutar zadane države koje su manje od zadane udaljenosti">
	</form>
</body>
</html>