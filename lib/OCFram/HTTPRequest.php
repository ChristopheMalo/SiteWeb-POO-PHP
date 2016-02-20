<?php

namespace OCFram;

/**
 * Classe représentant la requête du client
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        13/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class HTTPRequest extends ApplicationComponent
{
    /**
     * Obtenir un cookie
     * 
     * @param string
     * @return string
     */
    public function cookieData($key)
    {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }
    
    /**
     * Savoir si un cookie existe
     * 
     * @param string
     * @return bool
     */
    public function cookieExists($key)
    {
        return isset($_COOKIE[$key]);
    }
    
    /**
     * Obtenir une variable GET
     * 
     * @param string
     * @return string
     */
    public function getData($key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }
    
    /**
     * Savoir si une variable GET existe
     * 
     * @param string
     * @return bool
     */
    public function getExists($key)
    {
        return isset($_GET[$key]);
    }
    
    /**
     * Obtenir la méthode employée pour envoyer
     * une requête (méthode GET ou POST)
     * 
     * @return string
     */
    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    
    /**
     * Obtenir une variable POST
     * 
     * @param string
     * @return string
     */
    public function postData($key)
    {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }
    
    /**
     * Savoir si une variable POST existe
     * 
     * @param string
     * @return bool
     */
    public function postExists($key)
    {
        return isset($_POST[$key]);
    }
    
    /**
     * Obtenir l'url entrée
     * Utile pour le routeur connaisse la page souhaitée
     * 
     * @return string
     */
    public function requestURI()
    {
        return $_SERVER['REQUEST_URI'];
    }
    
}