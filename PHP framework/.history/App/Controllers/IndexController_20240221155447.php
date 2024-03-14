<?php
namespace Controllers;
use Classes\Korisnik;
use Http\Response;
use Http\Request;
use Interfaces\ResponseInterface;

class IndexController {
    public static function indexAction() : ResponseInterface {
        $content = IndexController::dohvatiParametreReq();
        $response = new Response(200, $content);
        $response->setContent($content);
        return $response;
    }

    public static function indexJsonAction() : ResponseInterface {
        $korisnici = KorisnikController::vratiSveRezultate();

        $content = json_encode($korisnici, JSON_PRETTY_PRINT);
        $response = new Response(200, $content, "application/json");
        return $response;
    }

    public static function dohvatiParametreReq() : string {
        $korisnik = Korisnik::find(13);
        $ime = $korisnik->ime;
        $spol = $korisnik->spol;
        $dob = (int) $korisnik->dob;
        $content = "Ime: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno pronađena.";
        return $content;
      }
}