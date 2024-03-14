<?php
namespace Controllers;
use Classes\Korisnik;
use Http\Response;
use Http\Request;
use Interfaces\ResponseInterface;

class IndexController {
    public static function indexAction(Request $request) : ResponseInterface {
        $content = IndexController::dohvatiParametreReq($request);
        $response = new Response(200, $content);
        $response->setContent($content);
        return $response;
    }

    public static function indexJsonAction(Request) : ResponseInterface {
        $korisnici = KorisnikController::vratiSveRezultate();
        $content = json_encode($korisnici, JSON_PRETTY_PRINT);
        $response = new Response(200, $content, "application/json");
        return $response;
    }

    public static function dohvatiParametreReq(Request $request) : string {
        $id = $request->getParameter('id');
        $korisnik = Korisnik::find($id);
        $ime = $korisnik->ime;
        $spol = $korisnik->spol;
        $dob = (int) $korisnik->dob;
        $content = "Ime: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno pronađena.";
        return $content;
      }
}