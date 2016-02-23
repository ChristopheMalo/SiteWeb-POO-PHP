<?php

namespace App\Backend\Modules\News;

use \OCFram\BackController;
use \OCFram\HTTPRequest;

/**
 * Le Contrôleur du module Backend de gestion des News
 * 
 * TP Créer un site web - POO en PHP
 *
 * @author      Christophe Malo
 * @date        23/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class NewsController extends BackController
{
    
    /**
     * Méthode pour l'action index
     * Affiche la liste des news
     * Compte le nombre de news
     * 
     * @param HTTPRequest $request
     * @return void
     */
    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Gestion des news');

        $manager = $this->managers->getManagerOf('News');

        $this->page->addVar('listeNews', $manager->getList());  // Affiche la liste
        $this->page->addVar('nombreNews', $manager->count());   // Compte le nombre de news
    }
    
}
