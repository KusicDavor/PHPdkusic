PHP API aplikacija - jela i sastojci (s prijevodom na više jezika)

Zadatak napravljen u Laravelu, korišteni Laravel Translatable, FakerPHP.
Pokretanje radi s "php artisan serve" naredbom.

## Punjenje baze podataka
~~Za napuniti je potrebno posjetiti "localhost:8000/FakerPHP" što će generirati u tablicu jezika engleski, francuski i hrvatski jezik te kreirati jela sa "title" i "description" na sva tri jezika, te tagove, kategorije i ingrediente također sa "title" na sva tri jezika i nasumično će upariti jela sa kategorijama, tagovima i ingredientima. Ako se želi generirati još, potrebno je samo ponovno posjetiti stranicu~~

Implementirano seedanje baze (php artisan db:seed)

## Glavna putanja
~~"/meals" je glavna putanja na koju se mogu dodavati parametri~~

- jedini potrebni parametar je "lang", nakon generiranja podataka dostupni jezici su: engleski ("en"), francuski ("fr") i hrvatski ("hr")
- pr. "[http://localhost:8000/api/meals?lang=fr&with=category,tags,ingredients&page=1&per_page=15&category=NULL](http://localhost:8000/api/meals?lang=fr&with=category,tags,ingredients&page=1&per_page=15&category=NULL)"

Pomoćne rute:

    -    "api/meals/delete/{id}" - za soft delete meala (za testiranje rada parametra "diff_time")
    
    -    "api/meals/restore/{id}" - vraća soft deleteani meal
    
    -    "api/meals/update/{id}" - mijenja category_id meala u 1 kako bi se ažurirao "updated_at" vrijednost u tablici (za testiranje rada parametra "diff_time")


## Neke osobne bilješke
- kreiranje tablica i povezivanje vanjskim ključevima, uređivanje migracijskom datotekom + praktično
    - migracije su kronološke, treba promijeniti vremensku oznaku ako hoću promijeniti redoslijed
- struktura projekta - app s modelima, routes za putanje, database za sve s bazom, resources za resurse dizajna
    - pokretanje projekata - ne trebam kontejner, konfigurati posvuda + dosta brzo, konfiguracija debuginga me ipak malo namučila
    - lokalni server sa "php artisan serve"
- funkcija "paginate()" ("simplePaginate") i automatsko prepoznavanje "per_page" i "page" je super
- Laravel Translatable - kad sam napokon skužio kako funkcionira veza između modela koji se radi iz dviju tablica je postalo puno lakše ali postavke za kontrolu što se sve od prijevoda vraća uopće nisam našao gdje postoje (a što je po dokumentaciji), dok ona postavka koja je bila uopće nije funkcionirala - zbog toga sam morao puno toga "ručno" sređivati
- trebalo mi je vremena dok se naviknem na php sintaksu pristupa atributa iz klasa i funkcija, te naučim neke osnovne ugrađene funkcije
- pristup atributima koji su podklasa i onda opet njihovim atributima mi je bio konfuzan
- postavljanje relacija između modela sam brzo skužio kako funkcionira ali mi je trebalo vremena dok sam našao prave izraze (belongsTo, hasMany...)
- ima nekih djelova koji bi mogli biti dinamični umjesto hardkodiranja (dostupni jezici), a pogotovo kod povezivanja tablice jezika i "locale" atributa da se izvrši provjera

- zaključno
    - nisam prije radio u Laravelu/Symfonyu, a u PHP-u vrlo osnovne web stranice i forme pa mi je ovo bilo zabavno, prebacivati ono što sam već znao napraviti (u Javi, C#) ali sad u PHP-u
    - neki manji problemi (konfiguracija dockera, slaganje upita kod parametara, sitne greške, korištenje pogrešnih funkcija) su mi uzele previše vremena, a što bi vjerojatno preskočio da ne radim "prvi put" s ovim alatima i jezikom
    - kod slaganja seedera za generiranje podataka mi se sviđa što je moguće koristiti funkcije/sekvence za dobivanje slučajnosti i alternativnih vrijednosti (npr. povremeno postavljanje kategorije u NULL)
