# Projekti
## Detaljnije o projektima piše u njihovim Readme

Vacations - web aplikacija izrađena u Symfonyu za upravljanje godišnjim odmorima u poduzeću i administraciju

![image](https://github.com/KusicDavor/Projekti/assets/81571301/702e4f67-09d1-429c-b4b6-2a89c83253d8)
![image](https://github.com/KusicDavor/Projekti/assets/81571301/caaee2cf-274c-46c3-9bd7-de8e7ccd5e80)

<br>

Meals - višejezična API aplikacija izrađena u Laravelu, omogućava korisniku pretragu  i filtriranje jela na temelju parametara poput oznaka, sastojaka, jezika, kategorije, soft deletanja

![image](https://github.com/KusicDavor/Projekti/assets/81571301/47c334a8-2489-470e-9656-eb504ab14ea4)
![image](https://github.com/KusicDavor/Projekti/assets/81571301/8a372de2-52a9-48d2-864a-dc59901b9042)

<br>

PHP framework - izrada vlastitog frameworka u PHP-u za primanje i obradu requestova 
- radi se s podacima o korisnicima (dodavanje, pretraživanje, JSON)
- vlastite klase Request, Response, definiranje i prepoznavanje ruta
- vlastite klase za komunikaciju prema MySQL bazi i CRUD nad podacima
- vlastiti traitovi za korištenje timestampova kod kreiranja, ažuriranja i brisanja
  
![image](https://github.com/KusicDavor/Projekti/assets/81571301/76a7be8f-684b-48ac-8af2-1094c2e84db6)
![image](https://github.com/KusicDavor/Projekti/assets/81571301/c8973b9e-1fb6-4da1-8176-3c18da4e838b)
![image](https://github.com/KusicDavor/Projekti/assets/81571301/b8ac8c9b-0e50-44d3-a31a-bb018923bc6a)

<br>

ReBIL - Windows desktop aplikacija izrađena u C# (koristeći VS2022 i MS SQL Server) kao projekt za kolegij za organizaciju i upravljanje u poduzeću

![image](https://github.com/KusicDavor/Projekti/assets/81571301/b5f8f00f-647c-4eb2-8857-4b4294289a97)
![image](https://github.com/KusicDavor/Projekti/assets/81571301/ac0d1893-bfe2-446d-8ee0-39f981f361f3)
![image](https://github.com/KusicDavor/Projekti/assets/81571301/3ff917fb-af76-4eab-b8ed-1a8401b80c43)

<br>

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

<br>

UsersAPI - Symfony API aplikacija
- implementira autorizaciju kroz JWT (OAuth 2.0)
- sadrži rute za registraciju, logiranje i logout korisnika
- seedanje korisnika u bazu, korištenje query builder i helper funkcija
- export podataka iz baze u CSV i PDF formatu te slanje na korisnikov mail
- ograničenja broja exportanja po korisniku i upotreba cache memorije
  
![image](https://github.com/KusicDavor/Projekti/assets/81571301/35ae4adf-6cff-40fb-b153-481ea677d8d2)

<br>
  
PHP web aplikacija - galerija slika sa administracijom i djeljenjem

![image](https://github.com/KusicDavor/Projekti/assets/81571301/ccbd3892-2003-459e-99dd-aa90fcb0267d)

<br>

Bubi/Web je HTML/CSS projekt - nakon preuzimanja, dovoljno je otvoriti index.html

![image](https://github.com/KusicDavor/Projekti/assets/81571301/ddb8a4e7-47db-4326-873b-bc1c43f64028)

<br>

Apex Oracle projekt je opisan u dokumentaciji, dok je backup aplikacije pohranjen na cloudu.
