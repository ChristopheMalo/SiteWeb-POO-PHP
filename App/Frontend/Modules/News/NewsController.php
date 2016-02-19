<?php

namespace App\Frontend\Modules\News;

use \OCFram\BackController;
use \OCFram\HTTPRequest;

/**
 * Controleur du module News
 * TP Créer un site web - POO en PHP
 *
 * @author      Christophe Malo
 * @date        18/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class NewsController extends BackController {
    /**
     * Méthode pour l'action index
     * 
     * @param HTTPRequest $request
     */
    public function executeIndex(HTTPRequest $request) {
        $nombreNews = $this->app->config()->get('nombre_news');
        $nombreCaracteres = $this->app->config()->get('nombre_caracteres');

        // Ajouter une définition pour le titre.
        $this->page->addVar('title', 'Liste des ' . $nombreNews . ' dernières news');

        // Récupérer le manager des news.
        $manager = $this->managers->getManagerOf('News');

        $listeNews = $manager->getList(0, $nombreNews);

        foreach ($listeNews as $news) {
            if (strlen($news->contenu()) > $nombreCaracteres) {
                $debut = substr($news->contenu(), 0, $nombreCaracteres);
                $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';

                $news->setContenu($debut);
            }
        }

        // Ajouter la variable $listeNews à la vue.
        $this->page->addVar('listeNews', $listeNews);
    }
    
    /**
     * Méthode pour l'action show
     * Affiche une news
     * Si la news n'existe pas, redirection vers une erreur 404
     * 
     * @param HTTPRequest $request
     */
    public function executeShow(HTTPRequest $request) {
        $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
        
        if (empty($news)) {
            $this->app->httResponse()->redirect404();
        }
        
        $this->page->addVar('title', $news->titre());
        $this->page->addVar('news', $news);
    }
}