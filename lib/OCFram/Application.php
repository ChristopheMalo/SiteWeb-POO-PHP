<?php

namespace OCFram;

/**
 * Classe représentant l'Application
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        13/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class Application {
    protected $httpRequest,
              $httpResponse,
              $name;
    
    public function __construct() {
        $this->httpRequest  = new HTTPRequest($this);
        $this->httpResponse = new HTTPResponse($this);
        $this->name         = '';
    }
    
    abstract public function run();
    
    public function httpRequest() {
        return $this->httpRequest;
    }
    
    public function httpResponse() {
        return $this->httpResponse;
    }
    
    public function name() {
        return $this->name;
    }
}
