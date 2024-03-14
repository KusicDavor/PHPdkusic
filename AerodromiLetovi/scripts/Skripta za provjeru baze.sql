/* Broj aerodroma za koje se preuzimaju letovi */
SELECT COUNT(ICAO) FROM AERODROMI_LETOVI;
/* Broj jedinstvenih letova u tablici LETOVI_POLASCI */
SELECT COUNT(DISTINCT FIRSTSEEN) FROM LETOVI_POLASCI;
/* Zapisi o letovima su minimalno 10 dana za redom */
SELECT COUNT(DISTINCT (TIMESTAMP(lp.FIRSTSEEN / 100000))) AS "Broj dana" FROM PUBLIC.LETOVI_POLASCI lp;
/* Broj preuzetih podataka po danima za sve aerodrome sortirano po danu */
SELECT TO_CHAR(CAST(TIMESTAMP(lp.FIRSTSEEN) AS DATE), 'DD.MM.YYYY.') Dan, COUNT(*) AS "BROJ LETOVA NA DAN" FROM PUBLIC.LETOVI_POLASCI lp GROUP BY Dan;
/* Broj preuzetih podataka po danima za sve aerodrome pojedinačno i sortirano po aerodromu i danu */
SELECT lp.ESTDEPARTUREAIRPORT AS "Aerodrom", TO_CHAR(CAST(TIMESTAMP(lp.FIRSTSEEN) AS DATE), 'DD.MM.YYYY.') Dan, COUNT(*) AS "BROJ LETOVA NA DAN" FROM PUBLIC.LETOVI_POLASCI lp GROUP BY lp.ESTDEPARTUREAIRPORT, Dan ORDER BY lp.ESTDEPARTUREAIRPORT, Dan;
/* Broj preuzetih podataka po danima za odabrani aerodrom sortirano po danu */
SELECT lp.ESTDEPARTUREAIRPORT AS "Aerodrom", TO_CHAR(CAST(TIMESTAMP(lp.FIRSTSEEN) AS DATE), 'DD.MM.YYYY.') Dan, COUNT(*) AS "BROJ LETOVA NA DAN" FROM PUBLIC.LETOVI_POLASCI lp WHERE lp.ESTDEPARTUREAIRPORT = 'EDDF' GROUP BY lp.ESTDEPARTUREAIRPORT, Dan ORDER BY Dan;
/* Broj preuzetih podataka za sve aerodrome pojedinačno sortirano po aerodromu na odabrani dan */
SELECT lp.ESTDEPARTUREAIRPORT AS "Aerodrom", TO_CHAR(CAST(TIMESTAMP(lp.FIRSTSEEN) AS DATE), 'DD.MM.YYYY.') Dan, COUNT(*) AS "BROJ LETOVA NA DAN" FROM PUBLIC.LETOVI_POLASCI lp WHERE TO_CHAR(CAST(TIMESTAMP(lp.FIRSTSEEN) AS DATE), 'DD.MM.YYYY.') = '02.12.2022.' GROUP BY lp.ESTDEPARTUREAIRPORT, Dan ORDER BY Dan;

