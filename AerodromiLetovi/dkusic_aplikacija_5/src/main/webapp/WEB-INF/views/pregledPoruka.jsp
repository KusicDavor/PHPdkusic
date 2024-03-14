<!DOCTYPE html>
<%@page import="org.foi.nwtis.dkusic.zrna.Sakupljac"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@page
	import="org.foi.nwtis.dkusic.aplikacija_4.ws.WsKorisnici.endpoint.Korisnik"%>
<%@page import="java.util.List"%>
<html xmlns:h="http://java.sun.com/jsf/html">
<head>
<meta charset="UTF-8">
<title>Pregled poruka</title>
</head>
<body>
	<h1>Pregled poruka</h1>
	<a href="${pageContext.servletContext.contextPath}/mvc/izbornik">Početna</a>
	<br>

	<%
	List<String> listaPoruka = (List<String>) request.getAttribute("listaPoruka");
	%>
	
	<form action="${pageContext.servletContext.contextPath}/mvc/izbornik/porukeO">
	<input type="submit" value="Obriši poruke">
	</form>

	<table>
		<tr>
			<th>Poruka</th>
		</tr>
		<%
		for (String s : listaPoruka) {
		%>
		<tr>
			<td><%=s%></td>
			<%
			}
			%>
		</tr>
	</table>
</body>
</html>