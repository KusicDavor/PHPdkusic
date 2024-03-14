<!DOCTYPE html>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@page
	import="org.foi.nwtis.dkusic.aplikacija_4.ws.WsKorisnici.endpoint.Korisnik"%>
<%@page import="java.util.List"%>
<html xmlns:h="http://java.sun.com/jsf/html">
<head>
<meta charset="UTF-8">
<title>Pregled korisnika</title>
</head>
<body>
	<h1>Pregled korisnika</h1>
	<a
		href="${pageContext.servletContext.contextPath}/mvc/izbornik/korisnici">Početna</a>
	<br>
		<script type="text/javascript">
		var wsocket;
		function connect() {
			wsocket = new WebSocket(
					"ws://localhost:8080/dkusic_aplikacija_4/info");
			wsocket.onmessage = onMessage;
		}

		function posaljiRegistracija() {
			wsocket.send("registracija");
		}

		function onMessage(evt) {
			var primljenaPoruka = evt.data;
			document.getElementById("porukaWebSocketa").innerHTML = primljenaPoruka;
		}

		window.addEventListener("load", connect, false);
	</script>

	<%
	List<Korisnik> listaKorisnika = (List<Korisnik>) request.getAttribute("listaKorisnika");
	%>
	<h:commandButton onclick="posaljiRegistracija()" value="primi poruku" />
	<div id="porukaWebSocketa"></div>
	<table>
		<tr>
			<th>Korisničko ime:</th>
			<th>Ime:</th>
			<th>Prezime:</th>
			<th>Lozinka:</th>
			<th>Email:</th>
		</tr>
		<%
		for (Korisnik k : listaKorisnika) {
		%>
		<tr>
			<td><%=k.getKorIme()%></td>
			<td><%=k.getIme()%></td>
			<td><%=k.getPrezime()%></td>
			<td><%=k.getLozinka()%></td>
			<td><%=k.getEmail()%></td>
			<%
			}
			%>
		</tr>
	</table>
</body>
</html>