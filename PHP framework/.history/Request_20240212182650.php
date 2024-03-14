<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ime = $_POST['ime'];
        $spol = $_POST['spol'];
        $grad = $_POST['grad'];
        $request = new Request($ime, $spol, $grad);
    }

    class Request implements RequestInterface {

        public function getIme() {
            return $this->ime;
        }
}