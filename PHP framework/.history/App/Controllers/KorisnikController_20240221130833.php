<?php
namespace Controllers;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Http\Response;
use Interfaces\ResponseInterface;

class KorisnikController {

    public static function index() : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $response = new Response(200, "");

        
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

    function vratiJedanRezultat($connection)  {
        $query = "SELECT * FROM korisnici WHERE id = :value";
        $params = [':value' => 7];
        $korisnik = $connection->fetchAssoc($query, $params);
        echo "JEDAN TRAŽENI RED --------- ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
     }
    
     function vratiSveRezultate($connection) : array {
        echo "<br>SVI REDOVI ------------ <br>";
        $query = "SELECT * FROM korisnici";
        $korisnici = $connection->fetchAssocAll($query);
        return $korisnici;

        // foreach ($korisnici as $korisnik) {
        //     echo "ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
        // }
     }
}