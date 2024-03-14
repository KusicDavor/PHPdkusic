<!DOCTYPE html>
<%@page
	import="org.foi.nwtis.dkusic.aplikacija_4.ws.WsAerodromi.endpoint.Aerodrom"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@page import="java.util.List"%>
<html xmlns:h="http://java.sun.com/jsf/html">
<head>
<meta charset="UTF-8">
<title>Pregled svih aerodroma</title>
</head>
<body>
	<%
	List<Aerodrom> listaAerodroma = (List<Aerodrom>) request.getAttribute("listaAerodroma");
	String traziNaziv = (String) request.getAttribute("traziNaziv");
	String traziDrzavu = (String) request.getAttribute("traziDrzavu");
	int odBroja = (int) request.getAttribute("odBroja");
	int broj = (int) request.getAttribute("broj");

	int prethodna = odBroja - broj;
	if (prethodna <= 0) {
	  prethodna = 1;
	}

	if (broj == 0) {
	  broj = 20;
	}
	int sljedeća = odBroja + broj;

	request.setAttribute("traziNaziv", traziNaziv);
	request.setAttribute("traziDrzavu", traziDrzavu);
	request.setAttribute("prethodna", prethodna);
	request.setAttribute("sljedeća", sljedeća);
	request.setAttribute("broj", broj);
	%>
	<a
		href="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi">Početak</a>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/svi">
		<input type="hidden" id="traziNaziv" name="traziNaziv"
			value=${ traziNaziv }> <input type="hidden" id="traziDrzavu"
			name="traziDrzavu" value=${ traziDrzavu }> <input
			type="hidden" id="odBroja" name="odBroja" value=${ prethodna }>
		<input type="hidden" id="broj" name="broj" value=${ broj }> <input
			type="submit" value="Prethodna">
	</form>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/svi">
		<input type="hidden" id="traziNaziv" name="traziNaziv"
			value=${ traziNaziv }> <input type="hidden" id="traziDrzavu"
			name="traziDrzavu" value=${ traziDrzavu }> <input
			type="hidden" id="odBroja" name="odBroja" value=${ sljedeća }>
		<input type="hidden" id="broj" name="broj" value=${ broj }> <input
			type="submit" value="Sljedeća">
	</form>
	<br />
	<h1>Pregled svih aerodroma</h1>
	<table>
		<thead>
			<tr>
				<th>ICAO:</th>
				<th>Naziv:</th>
				<th>Država:</th>
				<th>1. Postavljanje preuzimanja</th>
				<th>2. Pregled podataka aerodroma</th>
			</tr>
		</thead>
		<tbody>
			<%
			for (Aerodrom aero : listaAerodroma) {
			%>
			<tr>
				<td><%=aero.getIcao()%></td>
				<td><%=aero.getNaziv()%></td>
				<td><%=aero.getDrzava()%></td>

				<%
				request.setAttribute("icao", aero.getIcao());
				%>
				<td>
					<form
						action="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/dodajAerodrom"
						method="post">
						<input type='hidden' name='icao' value="${ icao }" /> <input
							type="submit" value="Dodaj za preuzimanje" />
					</form>
				</td>

				<td>
					<form
						action="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi/pregledAerodroma"
						method="post">
						<input type='hidden' name='icao' value="${ icao }" /> <input
							type="submit" value="Pregled aerodroma" />
					</form>
				</td>
				<%
				}
				%>
			
		</tbody>
	</table>
</body>
</html>