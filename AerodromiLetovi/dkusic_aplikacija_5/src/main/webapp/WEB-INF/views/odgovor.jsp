<!DOCTYPE html>
<%@page
	import="org.foi.nwtis.dkusic.aplikacija_5.podaci.OdgovorPosluzitelja"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@page import="java.util.List"%>
<html xmlns:h="http://java.sun.com/jsf/html">
<head>
<meta charset="UTF-8">
<title>Odgovor poslužitelja</title>
</head>
<body>
	<h1>Odgovor poslužitelja</h1>
	<a href="${pageContext.servletContext.contextPath}/mvc/izbornik">Početna</a>
	<br>
	<br>
	<%
	OdgovorPosluzitelja op = (OdgovorPosluzitelja) request.getAttribute("op");
	%>
	<p><%=op.getStatus()%></p>
	<p><%=op.getOpis()%></p>
	<br>
	<br>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/posluzitelj">
		<button type="submit" name="gumb" value="STATUS">STATUS</button>
		<button type="submit" name="gumb" value="KRAJ">KRAJ</button>
		<button type="submit" name="gumb" value="INIT">INIT</button>
		<button type="submit" name="gumb" value="PAUZA">PAUZA</button>
		<button type="submit" name="gumb" value="INFO DA">INFO DA</button>
		<button type="submit" name="gumb" value="INFO NE">INFO NE</button>
	</form>
</body>
</html>