<?php
class Router {
    public function handleRequest(Request $request)
    {
        $name = $request->getParam('ime');
        $age = $request->getParam('spol');

        // Example: Output the parameters
        echo "Name: $name, Age: $age ----------------- ";

        // You can implement your routing logic here
    }
}