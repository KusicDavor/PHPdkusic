<!DOCTYPE html>
<%@page import="java.time.ZoneId"%>
<%@page import="java.time.ZonedDateTime"%>
<%@page import="java.time.format.DateTimeFormatter"%>
<%@page
	import="org.foi.nwtis.dkusic.aplikacija_4.ws.WsMeteo.endpoint.MeteoPodaci"%>
<%@page
	import="org.foi.nwtis.dkusic.aplikacija_4.ws.WsAerodromi.endpoint.Aerodrom"%>
<%@page import="org.foi.nwtis.dkusic.aplikacija_5.podaci.Lokacija"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@page import="java.util.List"%>
<head>
<meta charset="UTF-8">
<title>Pregled aerodroma</title>
</head>
<body>
	<h1>Pregled aerodroma</h1>
	<a
		href="${pageContext.servletContext.contextPath}/mvc/izbornik/aerodromi">Početak</a>
	<c:choose>
		<c:when test="${empty aerodrom}">
			<%
			response.sendError(HttpServletResponse.SC_NOT_FOUND);
			%>
		</c:when>
		<c:otherwise>
			<table>
				<tr>
					<td>ICAO:</td>
					<td>${aerodrom.icao}</td>
				</tr>
				<tr>
					<td>Naziv:</td>
					<td>${aerodrom.naziv}</td>
				</tr>
				<tr>
					<td>Država:</td>
					<td>${aerodrom.drzava}</td>
				</tr>
				<tr>
					<td>Geografska širina:</td>
					<td>${aerodrom.lokacija.latitude}</td>
				</tr>
				<tr>
					<td>Geografska dužina:</td>
					<td>${aerodrom.lokacija.longitude}</td>
				</tr>
			</table>
		</c:otherwise>
	</c:choose>

	<%
	Aerodrom aero = (Aerodrom) request.getAttribute("aerodrom");
	MeteoPodaci mp = (MeteoPodaci) request.getAttribute("meteoPodaci");

	String datum = mp.getLastUpdate().toString();
	DateTimeFormatter formater = DateTimeFormatter.ISO_OFFSET_DATE_TIME;
	ZonedDateTime lokalnaZona = ZonedDateTime.parse(datum, formater.withZone(ZoneId.systemDefault()));
	DateTimeFormatter formaterFinalni = DateTimeFormatter.ofPattern("dd.MM.yyyy. HH:mm:ss");
	String formatirano = formaterFinalni.format(lokalnaZona);
	request.setAttribute("zadnjeAzuriranje", formatirano);

	datum = mp.getSunRise().toString();
	formater = DateTimeFormatter.ISO_OFFSET_DATE_TIME;
	lokalnaZona = ZonedDateTime.parse(datum, formater.withZone(ZoneId.systemDefault()));
	formaterFinalni = DateTimeFormatter.ofPattern("dd.MM.yyyy. HH:mm:ss");
	formatirano = formaterFinalni.format(lokalnaZona);
	request.setAttribute("izlazakSunca", formatirano);

	datum = mp.getSunSet().toString();
	formater = DateTimeFormatter.ISO_OFFSET_DATE_TIME;
	lokalnaZona = ZonedDateTime.parse(datum, formater.withZone(ZoneId.systemDefault()));
	formaterFinalni = DateTimeFormatter.ofPattern("dd.MM.yyyy. HH:mm:ss");
	formatirano = formaterFinalni.format(lokalnaZona);
	request.setAttribute("zalazakSunca", formatirano);
	%>

	<c:choose>
		<c:when test="${empty meteoPodaci}">
			<%
			response.sendError(HttpServletResponse.SC_NOT_FOUND);
			%>
		</c:when>
		<c:otherwise>


			<table>
				<c:if test="${not empty meteoPodaci.cloudsName}">
					<tr>
						<td>Trenutna prognoza:</td>
						<td><img
							src="http://openweathermap.org/img/w/${meteoPodaci.weatherIcon}.png" />${meteoPodaci.cloudsName}
							(naoblaka: ${meteoPodaci.cloudsValue}%)</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.humidityUnit}">
					<tr>
						<td>Vlažnost zraka:</td>
						<td>${meteoPodaci.humidityValue}${meteoPodaci.humidityUnit}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.lastUpdate}">
					<tr>
						<td>Posljednje ažuriranje:</td>
						<td>${zadnjeAzuriranje}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.precipitationMode}">
					<tr>
						<td>Precipitation mode:</td>
						<td>${meteoPodaci.precipitationMode}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.precipitationUnit}">
					<tr>
						<td>Precipitation unit:</td>
						<td>${meteoPodaci.precipitationUnit}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.precipitationValue}">
					<tr>
						<td>Precipitation value:</td>
						<td>${meteoPodaci.precipitationValue}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.pressureUnit}">
					<tr>
						<td>Tlak zraka:</td>
						<td>${meteoPodaci.pressureValue}${meteoPodaci.pressureUnit}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.sunRise}">
					<tr>
						<td>Izlazak sunca:</td>
						<td>${izlazakSunca}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.sunSet}">
					<tr>
						<td>Zalazak sunca:</td>
						<td>${zalazakSunca}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.temperatureMax}">
					<tr>
						<td>Maksimalna temperatura:</td>
						<td>${meteoPodaci.temperatureMax}
							${meteoPodaci.temperatureUnit}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.temperatureMin}">
					<tr>
						<td>Minimalna temperatura:</td>
						<td>${meteoPodaci.temperatureMin}
							${meteoPodaci.temperatureUnit}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.temperatureValue}">
					<tr>
						<td>Trenutna temperatura:</td>
						<td>${meteoPodaci.temperatureValue}
							${meteoPodaci.temperatureUnit}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.visibility}">
					<tr>
						<td>Vidljivost:</td>
						<td>${meteoPodaci.visibility}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.windDirectionCode}">
					<tr>
						<td>Wind direction code:</td>
						<td>${meteoPodaci.windDirectionCode}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.windDirectionName}">
					<tr>
						<td>Wind direction name:</td>
						<td>${meteoPodaci.windDirectionName}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.windDirectionValue}">
					<tr>
						<td>Wind direction value:</td>
						<td>${meteoPodaci.windDirectionValue}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.windSpeedName}">
					<tr>
						<td>Wind speed name:</td>
						<td>${meteoPodaci.windSpeedName}</td>
					</tr>
				</c:if>
				<c:if test="${not empty meteoPodaci.windSpeedValue}">
					<tr>
						<td>Wind speed value:</td>
						<td>${meteoPodaci.windSpeedValue}</td>
					</tr>
				</c:if>
			</table>
		</c:otherwise>
	</c:choose>
</body>
</html>