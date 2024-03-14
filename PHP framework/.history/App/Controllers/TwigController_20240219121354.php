<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Http\Request;


class YourController {
    public function yourAction(Request $request) {
        // Create a Twig loader and specify the template directory
        $loader = new FilesystemLoader('path/to/templates');

        // Create a Twig environment
        $twig = new Environment($loader);

        // Render the HTML template with Twig and pass any necessary data
        $htmlContent = $twig->render('index.html.twig', ['name' => 'World']);

        // Return an HTML response
        return new Response($htmlContent, 200, ['Content-Type' => 'text/html']);
    }
}