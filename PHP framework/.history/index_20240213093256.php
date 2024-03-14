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

$name = $request->getParam('name');
$age = $request->getParam('age');

// Display the parameters
echo "Name: $name, Age: $age";
?>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required><br><br>

    <input type="submit" value="Submit">
</form>