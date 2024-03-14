<!DOCTYPE html>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%><%@page
	import="java.util.List"%>

<head>
<meta charset="UTF-8">
<title>Pregled udaljenosti - Pogled 5.5.5</title>
</head>
<body>
	<h1>Pregled udaljenosti - pogled 5.5.5</h1>
	<a
		href="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi">Početna</a>
	<br />
	<c:choose>
		<c:when test="${empty udaljenost}">
			<%
			response.sendError(HttpServletResponse.SC_NOT_FOUND);
			%>
		</c:when>
		<c:otherwise>
			<h1>Udaljenost između dva aerodroma (AP1 UDALJENOST)</h1>
			<table>
				<tr>
					<th>Udaljenost</th>
				</tr>
				<tr>
					<td>${icaoOd}</td>
					<td>${icaoDo}</td>
					<td>${udaljenost} km</td>
				</tr>
			</table>
		</c:otherwise>
	</c:choose>
</body>
</html>