AerodromiLetovi - Java web aplikacija (Maven), sadrži 5 manjih aplikacija:
1. aplikacija je poslužitelj na mrežnoj utičnici (pokretan u Docker kontejneru) koji prima naredbe za početak, inicijalizaciju i kraj rada, računanje udaljenosti koristeći Haversinovu formulu, ispis informativne poruke uz povratni rezultat
2. aplikacija sadrži REST (JAX-RS) servise, pokreće se u Docker kontejneru na Payara Micro poslužitelju
- servis za aerodrome:
   - filtiranje parametrima poput naziva aerodroma, države
   - podaci o pojedinom aerodromu
   - udaljenosti između aerodroma
- servis za nadzor - upravljanje serverom iz prve aplikacije
- servis dnevnik za bilježenje poslanih naredbi
3. aplikacija - pokreće se na Payara Full poslužitelju:
  - logika dretvi za preuzimanje podataka o letovima sa OpenSky Network putem API-a i spremanje u bazu podataka
  - slanje JMS poruka po završetku preuzimanja za pojedini dan s podacima
4. aplikacija - sadrži SOAP (JAX-WS) servise i WebSocket, pokreće se u poslužitelju Payara Full
- servis korisnici:
   - vraća korisnike uz filtriranje po parametrima
   - prikazuje podatke o korisnicima
   - dodavanje novog korisnika
- servis aerodromi:
  - vraća pregled svih aerodroma za koje se preuzimaju podaci o letovima
  - dodavanje aerodroma za kojeg će se preuzeti podaci (te pauziranje i aktivacija statusa preuzimanja)
- servis letovi:
  - vraća letove za upitanog aerodroma u danom intervalu
  - vraća letove na određeni dan za upitani aerodrom
  - vraća letove na određeni dan za upitani aerodroma pri čemu skida podatke sa OpenSky Networka
- servis meteo:
  - dohvaća meteorološke podatke za upitani aerodrom primanjem GPS koordinata iz REST servisa za aerodrome i preuzimanjem podataka sa Open Weather Map
  - vraća statističke podatke poput broja korisnika, aerodroma
5. aplikacija - front-end aplikacije, implementira korisničko sučelje s Jakarta MVC, pokreće se u poslužitelju Payara Full
  - sadrži prikaze za sve funkcionalnosti iz prijašnjih aplikacija i s njima komunicira
  - sadrži Singleton, Stateful, Staless, Message-Driven beanove
  - prikazuje JMS poruke koje šalje treća aplikacija
  - koristi JavaScript i JSP za prikaze
