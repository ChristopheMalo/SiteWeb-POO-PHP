<?php
namespace App\Backend;

Use OCFram\Application;

/**
 * Classe représentant l'Application Backend
 * L'application doit être sécurisée
 * Seul un utilisateur authentifié peut accéder à l'application
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        22/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class BackendApplication extends Application
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
        parent::__construct();
        
        $this->name = 'Backend';
    }
    
    /**
     * Méthode permettant :
     *  - si utilisateur authentifié, d'obtenir le contrôleur grâce à la méthode parente getController()
     *  - exécute le contrôleur
     *  - Assigne la page créé par le contrôleur de la réponse
     *  - et envoie la réponse
     * 
     * @return void
     */
    public function run()
    {
        // Si l'utilisateur est authentifié
        // => Obtention du contrôleur (par la méthode parente getController)
        if ($this->user->isAuthenticated())
        {
          $controller = $this->getController();
        }
        else // Sinon intanciation du contrôleur de connexion
        {
          $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'index');
        }
        
        // Execution du controleur
        $controller->execute();
        
        // Assignation de la page créée par le controleur à la réponse
        $this->httpResponse->setPage($controller->page());
        
        // Envoi de la réponse
        $this->httpResponse->send();
    }
}
