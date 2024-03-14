<?php
namespace Controllers;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Http\Response;
use Interfaces\ResponseInterface;
use Classes\Korisnik;
use Database\Connection;

class KorisnikController {

    public static function index() : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $response = new Response(200, "");
        $content = self::vratiJedanRezultat("23");

        var_dump($content);

        $htmlContent = $twig->render('poruka.html.twig', ['poruka' => $content]);
        $response->setContent($htmlContent);
        return $response;
    }

    public static function create() : ResponseInterface{
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);

        $response = new Response(200, "");
        $htmlContent = $twig->render('kreiranjeKorisnika.html.twig');
        $response->setContent($htmlContent);
        return $response;
    }

    private static function vratiJedanRezultat(int $id) {
        $connection = Connection::getInstance();
        $connection->connect();
        $query = "SELECT * FROM korisnici WHERE id = :value";
        $params = [':value' => $id];
        $korisnik = $connection->fetchAssoc($query, $params);
        return $korisnik;

        // echo "JEDAN TRAŽENI RED --------- ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
     }
    
     private static function vratiSveRezultate(int $limit) {
        $connection = Connection::getInstance();
        $connection->connect();
        echo "<br>SVI REDOVI ------------ <br>";
        $query = "SELECT * FROM korisnici LIMIT :lim";
        $params = [':lim' => $limit];
        
        $korisnici = $connection->fetchAssocAll($query, $params);
        return $korisnici;
    }

        // foreach ($korisnici as $korisnik) {
        //     echo "ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
        // }
}