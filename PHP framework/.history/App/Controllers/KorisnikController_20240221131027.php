<?php
namespace Controllers;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Http\Response;
use Interfaces\ResponseInterface;
use Classes\Korisnik;

class KorisnikController {

    public static function index() : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $response = new Response(200, "");
        IndexC
        $content = vratiJedanRezultat("7");
        
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

    private function vratiJedanRezultat($connection) : Korisnik {
        $query = "SELECT * FROM korisnici WHERE id = :value";
        $params = [':value' => 23];
        $korisnik = $connection->fetchAssoc($query, $params);
        return $korisnik;

        // echo "JEDAN TRAŽENI RED --------- ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
     }
    
     private function vratiSveRezultate($connection) : array {
        echo "<br>SVI REDOVI ------------ <br>";
        $query = "SELECT * FROM korisnici";
        $korisnici = $connection->fetchAssocAll($query);
        return $korisnici;

        // foreach ($korisnici as $korisnik) {
        //     echo "ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
        // }
     }
}