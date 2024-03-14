<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Aplikacija 5 - Pogled 5.1</title>
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
	<h1>Glavni izbornik</h1>
	<a
		href="${pageContext.servletContext.contextPath}/mvc/izbornik/korisnici">5.2
		Upravljanje korisnicima</a>
	<br />
	<a
		href="${pageContext.servletContext.contextPath}/mvc/izbornik/posluzitelj">5.3
		Upravljanje poslužiteljem</a>
	<br />
	<br>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/poruke">
		<label for="odBroja">Od broja:</label> <input type="number"
			id="odBroja" name="odBroja"> <label for="broj">Broj:</label>
		<input type="number" id="broj" name="broj"> <input
			type="submit" value="5.4 Pregled primljenih JMS poruka">
	</form>
	<br />
	<a
		href="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi">5.5
		Upravljanje aerodromima</a>
	<br />
	<a href="${pageContext.servletContext.contextPath}/mvc/izbornik/letovi">5.6
		Upravljanje letovima</a>
	<br />

	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/dnevnik">
		<label for="vrsta">Vrsta:</label> <input type="text"
			id="vrsta" name="vrsta"> <label for="odBroja">Od
			broja:</label> <input type="number" id="odBroja" name="odBroja"> <label
			for="broj">Broj:</label> <input type="number" id="broj" name="broj">
		<input type="submit" value="5.7 Pregled zapisa dnevnika">
	</form>
</body>
</html>