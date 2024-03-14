<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $url = $_POST["url"];
        $method = $_POST["method"];
        $callback = $_POST["callback"];

        echo "URL: " . $url . "<br>";
        echo "HTTP Method: " . $method . "<br>";
        echo "Callback Method: " . $callback . "<br>";

        $request = new Request($url, $method, $callback);

        echo "". $request->getUrl() ."<br>";
        echo "jesam";
    }

class Request {
    private $url;
    private $method;
    private $callback;
    public function Request($url, $method, $callback) {
        $this->url = $url;
        $this->method = $method;
        $this->callback = $callback;
    }
    public function getUrl() {
        return $this->url;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getCallback() {
        return $this->callback;
    } 
}