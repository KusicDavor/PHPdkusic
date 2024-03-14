<?php
    class Request {
        public function __construct() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ime = $_POST['ime'];
                $spol = $_POST['spol'];
                $grad = $_POST['grad'];
                echo "ime: " . $ime . "<br>";
                echo "spol: " . $spol . "<br>";
                echo "grad: " . $grad . "<br>";
        }
    }
}