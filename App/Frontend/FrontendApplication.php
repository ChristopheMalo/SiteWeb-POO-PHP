<?php

namespace App\Frontend;

use \OCFram\Application;

/**
 * Classe représentant l'Application
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        13/02/2016
 * @updated     17/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class FrontendApplication extends Application {
    public function __construct() {
        parent::__construct(); // Appel du constructeur parent
        
        $this->name = 'Frontend';
    }
    
    public function run() {
        $controller = $this->getController();   // Obtention du controleur
        $controller->execute();                 // Execution du controleur
        
        // Assignation de la page créée par le controleur à la réponse
        $this->httpResponse->setPage($controller->page());
        
        // Envoi de la réponse
        $this->httpResponse->send();
    }
}
