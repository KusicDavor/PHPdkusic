<?php
namespace Controllers;
use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Http\Response;
use Interfaces\ResponseInterface;
use Database\Connection;
use Http\Request;
use Classes\User;
use TypeError;

class UserController {

    // glavna stranica, vraća popis korisnika
    public static function index(Request $request) : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $response = new Response(200, "");

        // osigurava da se nakon brisanja prikaže /korisnici, a ne IndexController metoda
        $url_parts = parse_url($_SERVER['REQUEST_URI']);
        $path = $url_parts['path'];
        if (strpos($path, 'delete') == false) {
            $id = $request->getParameter("id");
            if (isset($id)) {
                try {
                    return IndexController::indexAction($request);
                } catch (Exception $e) {
                    $response->setContent($e->getMessage());
                    return $response;
                }
            }
        }

        $limit = $request->getParameter("limit");
        $limit = isset($limit) && is_numeric($limit) ? (int) $limit : 5;
        $users = self::returnAllResults($limit);
        $htmlContent = $twig->render('korisnici.html.twig', ['korisnici' => $users]);
        $response->setContent($htmlContent);
        return $response;
    }

    //vrati sve korisnike kao JSON response
    public static function returnJsonUsers(Request $request) : ResponseInterface {
        return IndexController::indexJsonAction($request);
    }

    // prikazuje 
    public static function showUserDetail(Request $request) : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $htmlContent = $twig->render('korisnikGreska.html.twig');
        $response = new Response(404, $htmlContent);

        $url = $_SERVER['REQUEST_URI'];
        $pattern = "/\/korisnici\/(\d+)/";

        if (preg_match($pattern, $url, $matches)) {
            $id = $matches[1];
            $korisnik = self::returnSingleResult($id);
            
            if (!empty($korisnik)) {
                $response->setStatusCode(200);
                $htmlContent = $twig->render('korisnik.html.twig', ['korisnik' => $korisnik]);
            }
        }
        
        $response->setContent($htmlContent);
        return $response;
    }

    public static function deleteUser(Request $request) : ResponseInterface {
        $id = $request->getParameter('id');
        $user = User::find($id);
        $user->attributes = ['id' => $id];
        $user->delete();
        return self::index($request);
    }
    
    public static function createUser() : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $response = new Response(200, "");
        $htmlContent = $twig->render('kreiranjeKorisnika.html.twig');
        $response->setContent($htmlContent);
        return $response;
    }

    public static function saveUser(Request $request) : ResponseInterface {
        $connection = Connection::getInstance();
        $connection->connect();
        $name = $request->getParameter('name');
        $spol = $request->getParameter('spol');
        $dob =  $request->getParameter('dob');
        $korisnik = new User($name, $spol, $dob);
        $korisnik->save();
        return self::index($request);
     }

    public static function returnSingleResult(int $id) {
        $connection = Connection::getInstance();
        $connection->connect();
        $query = "SELECT * FROM korisnici WHERE id = :value";
        $params = [':value' => $id];
        $korisnik = $connection->fetchAssoc($query, $params);
        return $korisnik;
     }
    
     public static function returnAllResults(?int $limit = null) {
        $connection = Connection::getInstance();
        $connection->connect();
        $query = "SELECT * FROM korisnici WHERE deleted_at IS NULL";
        $korisnici = $connection->fetchAssocAll($query, $limit);
        return $korisnici;
    }
}