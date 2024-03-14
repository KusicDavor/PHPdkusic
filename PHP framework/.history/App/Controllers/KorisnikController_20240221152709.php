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
        $htmlContent = $twig->render('korisnici.html.twig', ['korisnici' => $korisnici]);
        $response->setContent($htmlContent);
        return $response;
    }

    public static function prikaziOsobu() : ResponseInterface{
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $response = new Response(200, "");

        $url = $_SERVER['REQUEST_URI'];
        $pattern = "/\/korisnici\/(\d+)/";
        if (preg_match($pattern, $url, $matches)) {
            $id = $matches[1];
            $korisnik = self::vratiJedanRezultat($id);  
            $htmlContent = $twig->render('korisnik.html.twig', ['korisnik' => $korisnik]);   
            $response->setContent($htmlContent);
            return $response;
        } else {
            $htmlContent = $twig->render('korisnik.html.twig');
        }
       
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
     }
    
     private static function vratiSveRezultate(int $limit) {
        $connection = Connection::getInstance();
        $connection->connect();
        $query = "SELECT * FROM korisnici WHERE deleted_at IS NULL";
        $korisnici = $connection->fetchAssocAll($query, $limit);
        return $korisnici;
    }
}