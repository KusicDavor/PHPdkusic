<?php
namespace Controllers;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Http\Response;
use Interfaces\ResponseInterface;
use Database\Connection;
use Http\Request;
use Http\Router;

class KorisnikController {

    public static function index(Request $request) : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $response = new Response(200, "");
        
        $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;

        $korisnici = self::vratiSveRezultate($limit);
        $htmlContent = $twig->render('poruka.html.twig', ['korisnici' => $korisnici]);
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
        $query = "SELECT * FROM korisnici";
        $korisnici = $connection->fetchAssocAll($query, $limit);
        return $korisnici;
    }

        // foreach ($korisnici as $korisnik) {
        //     echo "ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
        // }
}