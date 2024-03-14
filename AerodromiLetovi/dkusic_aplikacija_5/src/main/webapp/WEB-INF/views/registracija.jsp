<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@page
	import="org.foi.nwtis.dkusic.aplikacija_4.ws.WsKorisnici.endpoint.Korisnik"%>
<!DOCTYPE html>
<html xmlns:h="http://java.sun.com/jsf/html">

<h:head>
	<script type="text/javascript">
		var wsocket;
		function connect() {
			wsocket = new WebSocket(
					"ws://localhost:8080/dkusic_aplikacija_4/info");
			wsocket.onmessage = onMessage;
		}

		function primiPorukuOdInfo() {
			wsocket.send("info");
		}

		function posaljiRegistracija() {
			wsocket.send("registracija");
		}

		function provjera() {
			const elementRezultat = document.getElementById('rezRegistracija');
			if (elementRezultat.innerHTML.trim() === '') {
				primiPorukuOdInfo();
			} else {
				posaljiRegistracija();
			}
		}

		function onMessage(evt) {
			var primljenaPoruka = evt.data;
			document.getElementById("porukaWebSocketa").innerHTML = primljenaPoruka;
		}

		window.addEventListener("load", connect, false);
	</script>
</h:head>

<meta charset="UTF-8">
<title>Registracija korisnika</title>
</head>
<body>
	<h1>Registracija korisnika</h1>
	<h:commandButton onclick="provjera()" value="primi poruku" />
	<div id="porukaWebSocketa"></div>

	<a
		href="${pageContext.servletContext.contextPath}/mvc/izbornik/korisnici">Početna</a>
	<br>
	<div id="rezRegistracija">${requestScope.rezultatRegistracija}</div>
	<br>
	<form id="formaID"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/korisnici/registracija"
		method="post" onsubmit="posaljiRegistracija()">
		<label for="korIme">Korisničko ime:</label> <br> <input
			type="text" id="korIme" name="korIme" required="required" /> <br>
		<br> <label for="ime">Ime:</label> <br> <input type="text"
			id="ime" name="ime" /> <br> <br> <label for="prezime">Prezime:</label>
		<br> <input type="text" id="prezime" name="prezime" /> <br>
		<br> <label for="lozinka">Lozinka:</label> <br> <input
			type="text" id="lozinka" name="lozinka" /> <br> <br> <label
			for="email">Email:</label> <br> <input type="text" id="email"
			name="email" /> <br> <br>
		<%
		if ("POST".equals(request.getMethod())) {
		  String korIme = request.getParameter("korIme");
		  String ime = request.getParameter("ime");
		  String prezime = request.getParameter("prezime");
		  String lozinka = request.getParameter("lozinka");
		  String email = request.getParameter("email");
		  Korisnik korisnik = new Korisnik();
		  korisnik.setKorIme(korIme);
		  korisnik.setIme(ime);
		  korisnik.setPrezime(prezime);
		  korisnik.setLozinka(lozinka);
		  korisnik.setEmail(email);
		  request.setAttribute("k", korisnik);
		}
		%>
		<input type='hidden' name='k' value=${ k } /> <input type="submit"
			value="Registracija" />
	</form>
</body>
</html>