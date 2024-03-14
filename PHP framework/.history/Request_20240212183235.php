<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ime = $_POST['ime'];
        $spol = $_POST['spol'];
        $grad = $_POST['grad'];
        $request = new Request($ime, $spol, $grad);
    }

    class Request {
        public $ime;
        public $spol;
        public $grad;
        public function __construct($ime, $spol, $grad) {
            $this->ime = $ime;
            $this->spol = $spol;
            $this->grad = $grad;
            echo "ime: " . $ime . "<br>";
            echo "spol: " . $spol . "<br>";
            echo "grad: " . $grad . "<br>";
        }
        
        public function getIme() {
            return $this->ime;
        }
        public function getSpol() {
            return $this->spol;
        }
        public function getGrad() {
            return $this->grad;
        }
}