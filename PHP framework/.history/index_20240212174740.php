<?php
//require 'Router.php';
require 'Request.php';
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="url">URL:</label>
        <input type="text" id="url" name="url" required><br><br>
        
        <label for="method">HTTP Method:</label>
        <select id="method" name="method">
            <option value="GET">GET</option>
            <option value="POST">POST</option>
        </select><br><br>
        
        <label for="callback">Callback Method:</label>
        <input type="text" id="callback" name="callback" required><br><br>
        
        <input type="submit" value="Add Route">
    </form>
</body>
</html>
