<!DOCTYPE html>
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
<title>Pregled udaljenosti - Pogled 5.5.7</title>
</head>
<body>
	<h1>Pregled udaljenosti - pogled 5.5.7</h1>
	<a href="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi">Početna</a>
	<br />
	<c:choose>
		<c:when test="${empty listaUdaljenosti}">
			<%
			response.sendError(HttpServletResponse.SC_NOT_FOUND);
			%>
		</c:when>
		<c:otherwise>
			<table>
				<tr>
					<th>Aerodrom</th>
					<th>Država</th>
					<th>Udaljenost (km)</th>
				</tr>
				<c:forEach var="u" items="${listaUdaljenosti}">
					<tr>
						<td>${u.icao()}</td>
						<td>${u.drzava()}</td>
						<td>${u.km()} km</td>
					</tr>
				</c:forEach>
			</table>
		</c:otherwise>
	</c:choose>
</body>
</html>