<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Http\Request;
use Http\Response;

class YourController {
    public function yourAction(Request $request) {
        // Create a Twig loader and specify the template directory
        $loader = new \Twig\Loader\FilesystemLoader('Resources/views/');
        $loader = new FilesystemLoader('path/to/templates');

        // Create a Twig environment
        $twig = new Environment($loader);

        // Render the HTML template with Twig and pass any necessary data
        $htmlContent = $twig->render('poruka.html.twig', ['poruka' => 'OVO JE PORUKA ZA TWIG TEMPLATE STRANICU']);

        // Return an HTML response
        return new Response(200, $htmlContent, 'text/html');
    }
}