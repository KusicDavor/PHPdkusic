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

        // čitanje i postavljanje limita za upit
        $limit = $request->getParameter("limit");
        $limit = isset($limit) && is_numeric($limit) ? (int) $limit : 5;
        $users = self::returnAllResults($limit);
        $htmlContent = $twig->render('users.html.twig', ['korisnici' => $users]);
        $response->setContent($htmlContent);
        return $response;
    }

    //vrati sve korisnike kao JSON response
    public static function returnJsonUsers(Request $request) : ResponseInterface {
        return IndexController::indexJsonAction($request);
    }

    // prikazuje detalje o odabranom korisniku
    public static function showUserDetail(Request $request) : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $htmlContent = $twig->render('userNotFound.html.twig');
        $response = new Response(404, $htmlContent);

        $url = $_SERVER['REQUEST_URI'];
        $pattern = "/\/korisnici\/(\d+)/";

        if (preg_match($pattern, $url, $matches)) {
            $id = $matches[1];
            $korisnik = self::returnSingleResult($id);
            
            if (!empty($korisnik)) {
                $response->setStatusCode(200);
                $htmlContent = $twig->render('user.html.twig', ['korisnik' => $korisnik]);
            }
        }
        
        $response->setContent($htmlContent);
        return $response;
    }

    // briše korisnika (ako je postavljen soft-delete na modelu, onda radi soft-delete)
    public static function deleteUser(Request $request) : ResponseInterface {
        $id = $request->getParameter('id');
        $user = User::find($id);
        $user->attributes = ['id' => $id];
        $user->delete();
        return self::index($request);
    }
    
    // otbara stranicu za kreiranje novog korisnika
    public static function createUser() : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $response = new Response(200, "");
        $htmlContent = $twig->render('createUser.html.twig');
        $response->setContent($htmlContent);
        return $response;
    }

    // kreira novog korisnika i sprema ga u bazu
    public static function saveUser(Request $request) : ResponseInterface {
        $connection = Connection::getInstance();
        $connection->connect();
        $ime = $request->getParameter('ime');
        $spol = $request->getParameter('spol');
        $dob =  $request->getParameter('dob');
        $user = new User($ime, $spol, $dob);
        $user->save();
        return self::index($request);
     }

     // otvara stranicu za ažuriranje podataka o korisniku
     public static function editUser(Request $request) : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $response = new Response(200, "");
        $korisnik = User::find($request->getParameter("id"));
        $htmlContent = $twig->render('editUser.html.twig', ['korisnik' => $korisnik]);
        $response->setContent($htmlContent);
        return $response;
     }

     // ažurira podatke o korisniku
     public static function updateUser(Request $request) {
        $connection = Connection::getInstance();
        $connection->connect();

        $putData = file_get_contents('php://input');
        parse_str($putData, $formData);
        $ime = $formData['ime'];
        $spol = $formData['spol'];
        $dob = $formData['dob'];
        $id = $formData['id'];

        $user = new User($ime,$spol, $dob);
        $user->setAttributes($ime, $spol, $dob, $id);

        error_log(print_r($user, true));
        $user->update();


        $response = new Response(200, "");
        return $response;
     }

    // vraća traženog korisnika iz baze prema ID-u
    public static function returnSingleResult(int $id) {
        $connection = Connection::getInstance();
        $connection->connect();
        $query = "SELECT * FROM korisnici WHERE id = :value";
        $params = [':value' => $id];
        $korisnik = $connection->fetchAssoc($query, $params);
        return $korisnik;
     }
    
     // vraća sve korisnike s obzirom na limit
     public static function returnAllResults(?int $limit = null) {
        $connection = Connection::getInstance();
        $connection->connect();
        $query = "SELECT * FROM korisnici WHERE deleted_at IS NULL";
        $korisnici = $connection->fetchAssocAll($query, $limit);
        return $korisnici;
    }
}