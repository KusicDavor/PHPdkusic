<?php
class Router {
    public function handleRequest(Request $request)
    {
        $ime = $request->getParam('name');
        $age = $request->getParam('age');

        // Example: Output the parameters
        echo "ime: $ime, Age: $age ----------------- ";

        // You can implement your routing logic here
    }
}