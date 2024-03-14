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
	<%
	Korisnik korisnik = (Korisnik) request.getAttribute("korisnik");
	%>

	<table>
		<tr>
			<th>Korisničko ime:</th>
			<th>Ime:</th>
			<th>Prezime:</th>
			<th>Lozinka:</th>
			<th>Email:</th>
		</tr>
		<tr>
			<td><%=korisnik.getKorIme()%></td>
			<td><%=korisnik.getIme()%></td>
			<td><%=korisnik.getPrezime()%></td>
			<td><%=korisnik.getLozinka()%></td>
			<td><%=korisnik.getEmail()%></td>
		</tr>

	</table>
</body>
</html>