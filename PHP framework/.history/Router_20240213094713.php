<?php
class Router {
    public function handleRequest(Request $request)
    {
        $ime = $request->getParam('ime');
        $spol = $request->getParam('spol');
        $dob = $request->getParam('dob');

        // Example: Output the parameters
        echo "ime: $ime, Age: $spol, Dob: $dob ----------------- ";

        // You can implement your routing logic here
    }
}