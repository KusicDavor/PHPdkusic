<?php
class Router {
    public function handleRequest(Request $request)
    {
        $ime = $request->getParam('ime');
        $spol = $request->getParam('spol');
        $dob = $request->getParam('dob');
         echo "ime: $ime, Age: $spol, Dob: $dob ----------------- ";
    }
}