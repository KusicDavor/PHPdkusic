<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ime = $_POST['ime'];
        $spol = $_POST['spol'];
        $grad = $_POST['grad'];
        $request = new Request($ime, $spol, $grad);
    }

    class Request {
        public function __construct($ime, $spol, $grad) {
            $this->ime = $ime;
            $this->spol = $spol;
            $this->grad = $grad;
            echo "ime: -----------------" . $ime . "<br>";
    }
}