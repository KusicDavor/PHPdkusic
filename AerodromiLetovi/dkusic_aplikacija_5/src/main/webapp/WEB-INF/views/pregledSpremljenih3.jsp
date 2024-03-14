<!DOCTYPE html>
<%@page import="java.util.Date"%>
<%@page import="java.text.SimpleDateFormat"%>
<%@page
	import="org.foi.nwtis.dkusic.aplikacija_4.ws.WsLetovi.endpoint.LetAviona"%>
<%@page import="java.time.ZoneId"%>
<%@page import="java.time.ZonedDateTime"%>
<%@page import="java.time.format.DateTimeFormatter"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/fmt" prefix="f"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@page import="java.util.List"%>
<head>
<meta charset="UTF-8">
<title>Pregled spremljenih letova - Pogled 5.6.3</title>
</head>
<body>
	<%
	String icao = (String) request.getAttribute("icao");
	String datum = (String) request.getAttribute("datum");
	%>

	<h1>Pregled spremljenih letova - pogled 5.6.3</h1>
	<a href="${pageContext.servletContext.contextPath}/mvc/izbornik/letovi">Početna</a>
	<br />
	<%
	List<LetAviona> listaLetova = (List<LetAviona>) request.getAttribute("listaLetova");
	%>
	<c:choose>
		<c:when test="${empty listaLetova}">
			<%
			response.sendError(HttpServletResponse.SC_NOT_FOUND);
			%>
		</c:when>
		<c:otherwise>
			<table>
				<tr>
					<th>Odabir:</th>
					<th>Oznaka transpondera (heksadekadski):</th>
					<th>Vrijeme uzlijetanja:</th>
					<th>Aerodrom uzlijetanja:</th>
					<th>Vrijeme slijetanja:</th>
					<th>Aerodrom slijetanja:</th>
					<th>Pozivni znak:</th>
					<th>Horizontalna udaljenost od aerodroma polijetanja:</th>
					<th>Vertikalna udaljenost od aerodroma polijetanja</th>
					<th>Horizontalna udaljenost od aerodroma slijetanja:</th>
					<th>Vertikalna udaljenost od aerodroma slijetanja</th>
					<th>Broj aerodroma u blizini aerodroma polijetanja:</th>
					<th>Broj aerodroma u blizini aerodroma slijetanja:</th>
				</tr>
				<%
				for (LetAviona let : listaLetova) {
				  String vrijemePolijetanja =
				  new SimpleDateFormat("dd.MM.yyyy. HH:mm:ss").format(new Date(let.getFirstSeen() * 1000L));
				  String vrijemeSlijetanja =
				  new SimpleDateFormat("dd.MM.yyyy. HH:mm:ss").format(new Date(let.getLastSeen() * 1000L));
				%>
				<tr>
					<td><%=let.getIcao24()%></td>
					<td><%=vrijemePolijetanja%></td>
					<td><%=let.getEstDepartureAirport()%></td>
					<td><%=vrijemeSlijetanja%></td>
					<td><%=let.getEstArrivalAirport()%></td>
					<td><%=let.getCallsign()%></td>
					<td><%=let.getEstDepartureAirportHorizDistance()%></td>
					<td><%=let.getEstDepartureAirportVertDistance()%></td>
					<td><%=let.getEstArrivalAirportHorizDistance()%></td>
					<td><%=let.getEstArrivalAirportVertDistance()%></td>
					<td><%=let.getDepartureAirportCandidatesCount()%></td>
					<td><%=let.getArrivalAirportCandidatesCount()%></td>
					<%
					}
					%>
				</tr>
			</table>
		</c:otherwise>
	</c:choose>
</body>
</html>