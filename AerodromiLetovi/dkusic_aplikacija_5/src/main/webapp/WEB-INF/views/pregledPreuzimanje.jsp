<!DOCTYPE html>
<%@page import="javax.swing.SortOrder"%>
<%@page import="java.util.Map"%>
<%@page
	import="org.foi.nwtis.dkusic.aplikacija_4.ws.WsAerodromi.endpoint.Aerodrom"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@page import="java.util.List"%>
<html xmlns:h="http://java.sun.com/jsf/html">
<head>
<meta charset="UTF-8">
<title>Pregled aerodroma za koje se preuzimaju podaci</title>

<script type="text/javascript">
	var wsocket;
	function connect() {
		wsocket = new WebSocket("ws://localhost:8080/dkusic_aplikacija_4/info");
		wsocket.onmessage = onMessage;
	}

	function posaljiBroj() {
		wsocket.send("dodaj");
	}

	function onMessage(evt) {
		var primljenaPoruka = evt.data;
		document.getElementById("brojAerodroma").innerHTML = primljenaPoruka;
	}

	window.addEventListener("load", connect, false);
</script>

</head>
<body onclick="posaljiBroj()">
	<div id="brojAerodroma"></div>
	<%
	Map<Aerodrom, String> mapa = (Map<Aerodrom, String>) request.getAttribute("mapa");
	%>
	<a
		href="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi">Početak</a>
	<br />
	<h1>Pregled aerodroma za koje se preuzimaju podaci</h1>
	<table id="tablica">
		<thead>
			<tr>
				<th>ICAO:</th>
				<th>Naziv:</th>
				<th>Država:</th>
				<td>Geografska širina:</td>
				<td>Geografska dužina:</td>
				<td>Status:</td>
			</tr>
		</thead>
		<tbody>
			<%
			for (Map.Entry<Aerodrom, String> entry : mapa.entrySet()) {
			  Aerodrom aero = entry.getKey();
			  String status = entry.getValue();

			  request.setAttribute("icao", aero.getIcao());
			%>
			<tr>
				<td><%=aero.getIcao()%></td>
				<td><%=aero.getNaziv()%></td>
				<td><%=aero.getDrzava()%></td>
				<td><%=aero.getLokacija().getLatitude()%></td>
				<td><%=aero.getLokacija().getLongitude()%></td>
				<td><%=status%></td>
				<td>
					<form
						action="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/aktivirajAerodrom"
						method="post">
						<input type='hidden' name='icao' value="${ icao }" /> <input
							type="submit" value="Aktiviraj preuzimanje"
							<%if (status.equals("Da")) {%> disabled <%}%> />
					</form>
				</td>
				<td>
					<form
						action="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/pauzirajAerodrom"
						method="post">
						<input type='hidden' name='icao' value="${ icao }" /> <input
							type="submit" value="Pauziraj preuzimanje"
							<%if (status.equals("Pauza")) {%> disabled <%}%> />
					</form>
				</td>
			</tr>
			<%
			}
			%>
		</tbody>
	</table>
</body>
</html>