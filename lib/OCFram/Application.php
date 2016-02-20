<?php

namespace OCFram;

/**
 * Classe représentant l'Application
 * Chaque classe représentant une application héritera de cette classe
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        13/02/2016
 * @updated     17/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class Application
{
    
    protected $httpRequest,
              $httpResponse,
              $user,
              $config,
              $name;
    
    /**
     * Le constructeur de l'application instancie les classes
     * 
     * @return void
     */
    public function __construct()
    {
        $this->httpRequest  = new HTTPRequest($this);
        $this->httpResponse = new HTTPResponse($this);
        $this->user         = new User($this);
        $this->config       = new Config($this);
        $this->name         = '';
    }
    
    /* Accesseurs - GEtters */
    
    /**
     * 
     * 
     * @return \OCFram\controllerClass
     */
    public function getController()
    {
        $router = new Router;

        $xml = new \DOMDocument;
        $xml->load(__DIR__ . '/../../App/' . $this->name . '/Config/routes.xml');

        $routes = $xml->getElementsByTagName('route');

        // On parcourt les routes du fichier XML.
        foreach ($routes as $route)
        {
            $vars = [];

            // On regarde si des variables sont présentes dans l'URL.
            if ($route->hasAttribute('vars'))
            {
                $vars = explode(',', $route->getAttribute('vars'));
            }

            // On ajoute la route au routeur.
            $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
        }

        try 
        {
            // On récupère la route correspondante à l'URL.
            $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
        }
        
        catch (\RuntimeException $e) 
        {
            if ($e->getCode() == Router::NO_ROUTE) 
            {
                // Si aucune route ne correspond, c'est que la page demandée n'existe pas.
                $this->httpResponse->redirect404();
            }
        }

        // On ajoute les variables de l'URL au tableau $_GET.
        $_GET = array_merge($_GET, $matchedRoute->vars());

        // On instancie le contrôleur.
        $controllerClass = 'App\\' . $this->name . '\\Modules\\' . $matchedRoute->module() . '\\' . $matchedRoute->module() . 'Controller';
        return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
    }
    
    /**
     * Fonction permettant d'exécuter l'application
     * 
     * @return void
     */
    abstract public function run();
    
    /**
     * La requête du client
     * 
     * @return HTTPRequest
     */
    public function httpRequest()
    {
        return $this->httpRequest;
    }
    
    /**
     * La réponse renvoyée au client
     * 
     * @return HTTPResponse
     */
    public function httpResponse()
    {
        return $this->httpResponse;
    }
    
    /**
     * 
     * 
     * @return User 
     */
    public function user()
    {
        return $this->user;
    }
    
    /**
     * 
     * 
     * @return Config
     */
    public function config()
    {
        return $this->config;
    }
    
    /**
     * Fonction permettant de connaitre le nom de l'application
     * 
     * @return string
     */
    public function name()
    {
        return $this->name;
    } 
    
}