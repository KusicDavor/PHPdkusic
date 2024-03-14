<?php
require_once 'Request.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get parameters from the form
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';

    // Create a new Request object and pass the parameters
    $request = new Request(['name' => $name, 'age' => $age]);

    $name = $request->getParam('name');
    $age = $request->getParam('age');

    // Display the parameters
    echo "Name: $name, Age: $age";
}
?>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required><br><br>

    <input type="submit" value="Submit">
</form>