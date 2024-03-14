<?php
namespace Controllers;
use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Http\Response;
use Interfaces\ResponseInterface;
use Database\Connection;
use Http\Request;
use Classes\Korisnik;

class KorisnikController {

    public static function index(Request $request) : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $response = new Response(200, "");

        $limit = $request->getParameter("limit");
        $limit = isset($limit) && is_numeric($limit) ? (int) $limit : 5;
        $korisnici = self::vratiSveRezultate($limit);
        $htmlContent = $twig->render('korisnici.html.twig', ['korisnici' => $korisnici]);
        $response->setContent($htmlContent);
        return $response;
    }

    // prikaži osobu prema ID-u
    public static function prikaziKorisnika($id) : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $htmlContent = $twig->render('korisnikGreska.html.twig');
        $response = new Response(404, $htmlContent);

        $url = $_SERVER['REQUEST_URI'];
        $pattern = "/\/korisnici\/(\d+)/";

        if (preg_match($pattern, $url, $matches)) {
            $id = $matches[1];
            $korisnik = self::vratiJedanRezultat($id);
            
            if (!empty($korisnik)) {
                $response->setStatusCode(200);
                $htmlContent = $twig->render('korisnik.html.twig', ['korisnik' => $korisnik]);
            }
        }
        
        $response->setContent($htmlContent);
        return $response;
    }

    public static function deleteKorisnika(Request $request) : ResponseInterface {
        $id = $request->getParameter('id');
        print_r($id);
        try {
        $id = 35;
        $korisnik = new Korisnik();
        $korisnik = Korisnik::find($id);
        $korisnik->attributes = ['id' => $id];
        $korisnik->delete();
        } catch (Exception $e) {
        echo $e->getMessage();
        }
        return self::index($request);
    }
    
    public static function createKorisnika() : ResponseInterface{
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);

        $response = new Response(200, "");
        $htmlContent = $twig->render('kreiranjeKorisnika.html.twig');
        $response->setContent($htmlContent);
        return $response;
    }

    public static function vratiJedanRezultat(int $id) {
        $connection = Connection::getInstance();
        $connection->connect();
        $query = "SELECT * FROM korisnici WHERE id = :value";
        $params = [':value' => $id];
        $korisnik = $connection->fetchAssoc($query, $params);
        return $korisnik;
     }
    
     public static function vratiSveRezultate(?int $limit = null) {
        $connection = Connection::getInstance();
        $connection->connect();
        $query = "SELECT * FROM korisnici WHERE deleted_at IS NULL";
        $korisnici = $connection->fetchAssocAll($query, $limit);
        return $korisnici;
    }
}