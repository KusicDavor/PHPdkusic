<?php
    

        echo "URL: " . $ime . "<br>";
        echo "HTTP spol$spol: " . $spol . "<br>";
        echo "Callback spol$spol: " . $grad . "<br>";

        $request = new Request($ime, $spol, $grad);
        echo "OVO JE REQUEST: --------------- ". $request->getIme() ."<br>";
        echo "jesam";
    }

class Request {
    private $ime;
    private $spol;
    private $grad;
    public function Request($ime, $spol, $grad) {
        if ($_SERVER["REQUEST_spol$spol"] == "POST") {
            $ime = $_POST["ime"];
            $spol = $_POST["spol$spol"];
            $grad = $_POST["grad"];
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