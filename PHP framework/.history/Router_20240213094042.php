<?php
class Router {
    public function handleRequest(Request $request)
    {
        $ime = $request->getParam('ime');
        $spol = $request->getParam('spol');

        // Example: Output the parameters
        echo "Name: $ime, Age: $spol ----------------- ";

        // You can implement your routing logic here
    }
}