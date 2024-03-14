<!DOCTYPE html>
<%@page import="org.foi.nwtis.dkusic.aplikacija_5.podaci.Zapis"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@page import="java.util.List"%>
<html xmlns:h="http://java.sun.com/jsf/html">
<head>
<meta charset="UTF-8">
<title>Pregled zapisa dnevnika</title>
</head>
<body>
	<%
	List<Zapis> listaZapisa = (List<Zapis>) request.getAttribute("listaZapisa");
	String vrsta = (String) request.getAttribute("vrsta");
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

	request.setAttribute("vrsta", vrsta);
	request.setAttribute("prethodna", prethodna);
	request.setAttribute("sljedeća", sljedeća);
	request.setAttribute("broj", broj);
	%>
	<a href="${pageContext.servletContext.contextPath}/mvc/izbornik">Početak</a>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/dnevnik">
		<input type="hidden" id="vrsta" name="vrsta" value=${ vrsta }>
		<input type="hidden" id="odBroja" name="odBroja" value=${ prethodna }>
		<input type="hidden" id="broj" name="broj" value=${ broj }> <input
			type="submit" value="Prethodna">
	</form>
	<form method="POST"
		action="${pageContext.servletContext.contextPath}/mvc/izbornik/dnevnik">
		<input type="hidden" id="vrsta" name="vrsta" value=${ vrsta }>
		<input type="hidden" id="odBroja" name="odBroja" value=${ sljedeća }>
		<input type="hidden" id="broj" name="broj" value=${ broj }> <input
			type="submit" value="Sljedeća">
	</form>
	<br />
	<h1>Pregled zapisa dnevnika</h1>
	<table>
		<thead>
			<tr>
				<th>Vrsta:</th>
				<th>Naziv:</th>
			</tr>
		</thead>
		<tbody>
			<%
			for (Zapis z : listaZapisa) {
			%>
			<tr>
				<td><%=z.getVrsta()%></td>
				<td><%=z.getZahtjev()%></td>
				<%
				}
				%>
			
		</tbody>
	</table>
</body>
</html>