<!DOCTYPE html>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<html xmlns:h="http://java.sun.com/jsf/html">
<head>
<meta charset="UTF-8">
<title>Aplikacija 5 - Pogled 5.6</title>

<style>
button {
	background-color: grey;
	color: white;
	font-size: 15px;
	padding: 3px 4px;
}
</style>
</head>

<body>
	<h1>Upravljanje letovima</h1>
	<div id="dodavanje"></div>
	<a href="${pageContext.servletContext.contextPath}/mvc/izbornik/">Početna</a>

	<br />
	<br>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/letovi/spremljeni">
		<label for="icao">ICAO:</label> <input type="text" id="icao" required
			name="icao"> <label for="danOd">Dan od:</label> <input
			required type="text" id=danOd name="danOd"> <label
			for="danDo">Dan do:</label> <input required type="text" id="danDo"
			name="danDo"> <label for="odBroja">Od broja:</label> <input
			type="number" id="odBroja" name="odBroja"> <label for="broj">Broj:</label>
		<input type="number" id="broj" name="broj"> <input
			type="submit"
			value="5.6.1 Pregled spremljenih letova s određenog aerodroma u zadanom intervalu">
	</form>
	<br />
	<br>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/letovi/spremljeni2">
		<label for="icao">ICAO:</label> <input type="text" id="icao" required
			name="icao"> <label for="datum">Datum:</label> <input
			required type="text" id="datum" name="datum"> <input
			type="submit"
			value="5.6.2 Pregled spremljenih letova s određenog aerodroma na zadani datum">
	</form>
	<br />
	<br>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/letovi/spremljeni3">
		<label for="icao">ICAO:</label> <input type="text" id="icao" required
			name="icao"> <label for="datum">Datum:</label> <input
			required type="text" id="datum" name="datum"> <input
			type="submit"
			value="5.6.3 Pregled letova s određenog aerodroma na zadani datum">
	</form>
</body>
</html>