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
    
    /**
     * Méthode permettant de traiter le formulaire
     * et d'enregistrer la news en DB
     * 
     * @param HTTPRequest $request
     * @return void
     */
    public function processForm(HTTPRequest $request)
    {
      $news = new News([
        'auteur'  => $request->postData('auteur'),
        'titre'   => $request->postData('titre'),
        'contenu' => $request->postData('contenu')
      ]);

      // Transmission de l'identifiant de la news en cas de modification
      if ($request->postExists('id'))
      {
        $news->setId($request->postData('id'));
      }

      if ($news->isValid())
      {
        $this->managers->getManagerOf('News')->save($news);

        $this->app->user()->setFlash($news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !');
      }
      else
      {
        $this->page->addVar('erreurs', $news->erreurs());
      }

      $this->page->addVar('news', $news);
    }

}
