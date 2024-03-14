<?php
class Router {
    public function handleRequest(Request $request)
    {
        $name = $request->getParam('name');
        $age = $request->getParam('age');

        // Example: Output the parameters
        echo "Name: $name, Age: $age" ----------------- ;

        // You can implement your routing logic here
    }
}