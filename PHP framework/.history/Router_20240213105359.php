class Router
{
    private $routes = [];

    public function addRoute($method, $path, $callback)
    {
        $this->routes[$method][$path] = $callback;
    }

    public function get($path, $callback)
    {
        $this->addRoute('GET', $path, $callback);
    }

    // Add more methods for other HTTP request methods like POST, PUT, DELETE, etc. if needed

    public function route($method, $path)
    {
        if (isset($this->routes[$method][$path])) {
            $callback = $this->routes[$method][$path];
            return $callback();
        } else {
            return '404 Not Found';
        }
    }
}

// Create a new Router instance
$router = new Router();

// Define routes
$router->get('/', function() {
    return 'Welcome to the home page!';
});

$router->get('/home', function() {
    return 'This is the home page!';
});

// Add the new route here
$router->get('/dodaj', function() {
    return def();
});

// Add more routes as needed

?>