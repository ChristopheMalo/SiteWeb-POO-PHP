<?php

namespace App\BAckend\Modules\Connexion;

use \OCFram\BackController;
use \OCFram\HTTPRequest;

/**
 * Le Contrôleur du module de connexion du Backend
 * 
 * TP Créer un site web - POO en PHP
 *
 * @author      Christophe Malo
 * @date        22/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class ConnexionController extends BackController
{
    
    /**
     * Méthode pour l'action index
     * Cette méthode , si le formulaire est envoyé, vérifie
     *  - le login
     *  - le password
     * Si les informations saisies sont correctes alors
     * l'utilisateur du backend est authentifié
     * Sinon est message d'erreur est affiché
     * 
     * Le login et le mot de passe sont renseignés dans le fichier de config app.xml
     * Évolution possible : Un système évolué en DB avec plusieurs users
     * 
     * @param HTTPRequest $request
     */
    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Connexion');

        if ($request->postExists('login'))
        {
            $login = $request->postData('login');
            $password = $request->postData('password');

            if ($login == $this->app->config()->get('login') && $password == $this->app->config()->get('pass'))
            {
                $this->app->user()->setAuthenticated(true);
                $this->app->httpResponse()->redirect('.');
            }
            else
            {
                $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
            }
        }
    }
    
}
