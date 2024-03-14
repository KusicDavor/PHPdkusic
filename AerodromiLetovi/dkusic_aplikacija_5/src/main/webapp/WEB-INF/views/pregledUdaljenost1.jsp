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
<title>Pregled udaljenosti - Pogled 5.5.4</title>
</head>
<body>
	<h1>Pregled udaljenosti - pogled 5.5.4</h1>
	<a href="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi">Početna</a>
	<br />
	<c:choose>
		<c:when test="${empty udaljenosti}">
			<%
			response.sendError(HttpServletResponse.SC_NOT_FOUND);
			%>
		</c:when>
		<c:otherwise>
			<h1>Udaljenost između dva aerodroma po državama</h1>
			<table>
				<tr>
					<th>Država</th>
					<th>Udaljenost</th>
				</tr>
				<c:forEach var="u" items="${udaljenosti}">
					<c:set var="ukupno" value="${ukupno + u.km()}" />
					<tr>
						<td>${u.drzava()}</td>
						<td>${u.km()} km</td>
					</tr>
				</c:forEach>
			</table>
			<f:formatNumber value="${ukupno + u.km()}" pattern="#0.00"
				var="ukupno2dec" />
			<p>Ukupna udaljenost: ${ukupno2dec} km</p>
		</c:otherwise>
	</c:choose>
</body>
</html>