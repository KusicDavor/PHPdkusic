<?php
namespace Controllers;
use Classes\User;
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

    public static function indexJsonAction(Request $request) : ResponseInterface {
        $korisnici = UserController::returnAllResults();
        header('Content-Type: application/json; charset=utf-8');
        $content = json_encode($korisnici, JSON_PRETTY_PRINT);
        $response = new Response(200, $content, "application/json");
        return $response;
    }

    public static function dohvatiParametreReq(Request $request) : string {
        $id = $request->getParameter('id');
        $user = User::find($id);
        $ime = $user->ime;
        $spol = $user->spol;
        $dob = (int) $user->dob;
        $content = "Ime: $ime<br>Spol: $spol<br>Dob: $dob<br>";
        return $content;
      }
}