<?php
require_once 'Request.php';

$params = [
    'name' => 'John',
    'age' => 30,
];

$request = new Request($params);

// Example usage: Access parameters
$name = $request->getParam('name');
$age = $request->getParam('age');

// Use the parameters as needed
echo "Name: $name, Age: $age";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Input</title>
</head>
<body>
    <h1>Add Route</h1>
    <form action="Request.php" method="post">
        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" required><br><br>
        
        <label for="spol">Spol:</label>
        <select id="spol" name="spol">
            <option value="M">M</option>
            <option value="Ž">Ž</option>
        </select><br><br>
        
        <label for="grad">Grad:</label>
        <input type="text" id="grad" name="grad" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>