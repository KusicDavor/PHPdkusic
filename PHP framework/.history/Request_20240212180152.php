<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ime = $_POST["ime"];
        $spol = $_POST["spol"];
        $grad = $_POST["grad"];

        echo "URL: " . $ime . "<br>";
        echo "HTTP spol: " . $spol . "<br>";
        echo "Callback: " . $grad . "<br>";

        $request = new Request($ime, $spol, $grad);
        echo "OVO JE REQUEST: --------------- ". $request->getIme() ."<br>";
        echo "jesam";
    }

class Request {
    private $ime;
    private $spol;
    private $grad;
    public function Request($ime, $spol, $grad) {
        $this->ime = $ime;
        $this->spol = $spol;
        $this->grad = $grad;
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