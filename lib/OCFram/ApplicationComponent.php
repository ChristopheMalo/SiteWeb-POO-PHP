<?php

namespace OCFram;

/**
 * Classe représentant le composant de application
 * Cette classe se chargera juste de stocker,
 * pendant la construction de l'objet, l'instance de l'application exécutée. 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        13/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class ApplicationComponent {
    protected $app;
    
    public function __construct(Application $app) {
        $this->app = $app;
    }
    
    public function app() {
        return $this->app;
    }
}
