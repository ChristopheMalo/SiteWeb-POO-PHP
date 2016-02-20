<?php

namespace OCFram;

/**
 * Classe représentant la requête du client
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        13/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class HTTPRequest extends ApplicationComponent {
    public function cookieData($key) {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }
    
    public function cookieExists($key) {
        return isset($_COOKIE[$key]);
    }
    
    public function getData($key) {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }
    
    public function getExists($key) {
        return isset($_GET[$key]);
    }
    
    public function method() {
        return $_SERVER['REQUEST_METHOD'];
    }
    
    public function postData($key) {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }
    
    public function postExists($key) {
        return isset($_POST[$key]);
    }
    
    public function requestURI() {
        return $_SERVER['REQUEST_URI'];
    }
}
