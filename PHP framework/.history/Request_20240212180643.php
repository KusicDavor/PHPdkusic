      

        $request = new Request($ime, $spol, $grad);
        
        echo "jesam";

<?php
class Request {
    private $ime;
    private $spol;
    private $grad;
    public function Request() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->ime = $_POST["ime"];
            $this->spol = $_POST["spol"];
            $this->grad = $_POST["grad"];

            echo "ime: " . $this->ime . "<br>";
            echo "spol: " . $this->spol . "<br>";
            echo "grad: " . $this->grad . "<br>";

            echo "OVO JE REQUEST: --------------- ". $this->getIme() ."<br>";
        }
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