<?php

namespace App\Backend\Modules\News;

use OCFram\BackController;
use OCFram\HTTPRequest;
use Entity\News;
use Entity\Comment;
use FormBuilder\CommentFormBuilder;
use FormBuilder\NewsFormBuilder;
use OCFram\FormHandler;

/**
 * Le Contrôleur du module Backend de gestion des News
 * 
 * TP Créer un site web - POO en PHP
 *
 * @author      Christophe Malo
 * @date        23/02/2016
 * @update      28/02/2016
 * @commentaire Update du 28/02/16 : Utiliser FormBuilder
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
     * Méthode permettant d'insérer une news
     * La méthode appelle processForm()
     * 
     * @param HTTPRequest $request
     * @return void
     */
    public function executeInsert(HTTPRequest $request)
    {
        $this->processForm($request);
        $this->page->addVar('title', 'Ajout d\'une news');
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
        if ($request->method() == 'POST')
        {
            $news = new News([
                'auteur'  => $request->postData('auteur'),
                'titre'   => $request->postData('titre'),
                'contenu' => $request->postData('contenu')
            ]);

            if ($request->getExists('id'))
            {
                $news->setId($request->getData('id'));
            }
        }
        else
        {
            // Transmission de l'identifiant de la news en cas de modification
            if ($request->getExists('id'))
            {
                $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
            }
            else
            {
                $news = new News;
            }
        }

        $formBuilder = new NewsFormBuilder($news);
        $formBuilder->build();

        $form = $formBuilder->form();
        
        $formHandler = new FormHandler($form, $this->managers->getManagerOf('News'), $request);

        if ($formHandler->process())
        {
            $this->app->user()->setFlash($news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !');
            $this->app->httpResponse()->redirect('/admin/');
        }

        $this->page->addVar('form', $form->createView());
    }
    
    /**
     * Méthode pour l'action update
     * Cette méthode est quasiment identique à executeInsert()
     * Une différence : il faut passet la news à la vue si le formulaure n'est pas envoyé
     * 
     * @param HTTPRequest $request
     * @return void
     */
    public function executeUpdate(HTTPRequest $request)
    {
        $this->processForm($request);
        $this->page->addVar('title', 'Modification d\'une news');
    }
    
    /**
     * Méthode pour l'action delete
     * Le contrôleur se charge d'invoquer la méthode du manager qui supprimera la news
     * L'utilisateur est ensuite redirigé vers l'index admin
     * avec affichage d'un message au rechargement de la page
     * Cette action ne possède aucune vue
     * 
     * @param HTTPRequest $request
     * @return void
     */
    public function executeDelete(HTTPRequest $request)
    {
        // Suppression de la news avec les commentaires
        $newsId = $request->getData('id');
        
        $this->managers->getManagerOf('News')->delete($newsId);
        $this->managers->getManagerOf('Comments')->deleteFromNews($newsId);
        
        $this->app->user()->setFlash('La news a bien été supprimée !');
        
        $this->app->httpResponse()->redirect('.');
        
        // Supprime une news sans suppression des commentaires
        //$this->managers->getManagerOf('News')->delete($request->getData('id'));
        //$this->app->user()->setFlash('La news a bien été supprimée');
        //$this->app->httpResponse()->redirect('.');
    }
    
    /**
     * Méthode pour l'action updateComment
     * La méthode contrôle les valeurs du formulaire
     * et modifie le commentaire en DB si l'ensemble des données sont valides
     * L'utilisateur est redirigé vers la news qu'il lisait
     * Un champ caché doit être ajouté dans le formulaire
     * pour transmettre le paramètre identifiant de la news
     * 
     * @param HTTPRequest $request
     * @return void
     */
    public function executeUpdateComment(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Modification d\'un commentaire');

        if ($request->method() == 'POST')
        {
            $comment = new Comment([
                'id' => $request->getData('id'),
                'auteur' => $request->postData('auteur'),
                'contenu' => $request->postData('contenu')
            ]);
        }
        else
        {
            $comment = $this->managers->getManagerOf('Comments')->get($request->getData('id'));
        }

        $formBuilder = new CommentFormBuilder($comment);
        $formBuilder->build();

        $form = $formBuilder->form();
        
        $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);

        if ($formHandler->process())
        {
            $this->app->user()->setFlash('Le commentaire a bien été modifié');
            $this->app->httpResponse()->redirect('/admin/');
        }

        $this->page->addVar('form', $form->createView());
    }
    
    /**
     * Méthode pour l'action deleteComment
     * Le contrôleur se charge d'invoquer
     * la méthode du manager qui supprimera le commentaire (delete)
     * L'utilisateur est ensuite redirigé vers l'index admin
     * avec affichage d'un message au rechargement de la page
     * Cette action ne possède aucune vue
     * 
     * @param HTTPRequest $request
     * @return void
     */
    public function executeDeleteComment(HTTPRequest $request)
    {
        $this->managers->getManagerOf('Comments')->delete($request->getData('id'));
        $this->app->user()->setFlash('Le commentaire a bien été supprimé !');
        $this->app->httpResponse()->redirect('.');
    }

}
