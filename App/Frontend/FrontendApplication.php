<?php
// Identique au chemin menant vers le fichier
namespace App\Frontend;

use \OCFram\Application;

/**
 * Classe représentant l'Application Frontend
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        13/02/2016
 * @updated     17/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class FrontendApplication extends Application
{
    
    /**
     * Méthode de construction
     * Appelle le constructeur parent
     * et spécifie le nom de l'application
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct(); // Appel du constructeur parent
        
        $this->name = 'Frontend';
    }
    
    /**
     * Méthode permettant :
     *  - d'obtenir le contrôleur grâce à la méthode parente getController()
     *  - exécute le contrôleur
     *  - Assigne la page créé par le contrôleur de la réponse
     *  - et envoie la réponse
     * 
     * @return void
     */
    public function run()
    {
        $controller = $this->getController();   // Obtention du controleur
        $controller->execute();                 // Execution du controleur
        
        // Assignation de la page créée par le controleur à la réponse
        $this->httpResponse->setPage($controller->page());
        
        // Envoi de la réponse
        $this->httpResponse->send();
    }
    
}