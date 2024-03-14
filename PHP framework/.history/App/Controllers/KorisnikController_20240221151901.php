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

    public static function index() : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $response = new Response(200, "");

        $limit = isset($_REQUEST['limit']) ? (int) $_REQUEST['limit'] : 5;
        $korisnici = self::vratiSveRezultate($limit);
        $htmlContent = $twig->render('poruka.html.twig', ['korisnici' => $korisnici]);
        $response->setContent($htmlContent);
        return $response;
    }

    public static function prikaziOsobu() : ResponseInterface{
        var_dump($url);
        $url = $_SERVER['REQUEST_URI'];
        $pattern = Router::buildPatternFromUrl(Router::$route->url);
        Router::$response = new Response(200, "");
        if (preg_match($pattern, $url, $matches)) {
          $parametarIme = $matches[1];
    
          if (Router::$request->getParameter("ime") == $parametarIme) {
            Router::$response->setContent(Router::dohvatiParametreReq(Router::$request));
          } else {
            Router::$response->setStatusCode(404);
            Router::$response->setContent("Osoba ne postoji.");
          }
        }
        return Router::$response;
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
        $query = "SELECT * FROM korisnici WHERE deleted_at IS NULL";
        $korisnici = $connection->fetchAssocAll($query, $limit);
        return $korisnici;
    }
}