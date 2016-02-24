<?php

namespace Model;

use \OCFram\Manager;
use \Entity\Comment;

/**
 * Classe premettant de gérer les commentaires
 * Cette classe doit intéragir avec la DB
 * Elle n'est pas dépendante de PDO
 * D'où la création d'une classes spécialisée pour PDO
 * La classe spécialisée va hériter de CommentsManager
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        20/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class CommentsManager extends Manager
{

    /**
     * Méthode permettant d'ajouter un commentaire
     * 
     * @param   Comment $comment Le commentaire à ajouter
     * @return  void
     */
    abstract protected function add(Comment $comment);

    /**
     * Méthode permettant d'enregistrer un commentaire.
     * 
     * @param   Comment $comment Le commentaire à enregistrer
     * @return  void
     */
    public function save(Comment $comment)
    {
        if ($comment->isValid())
        {
            $comment->isNew() ? $this->add($comment) : $this->modify($comment);
        }
        else
        {
            throw new \RuntimeException('Le commentaire doit être validé pour être enregistré');
        }
    }
    
    /**
     * Méthode permettant de récupérer une liste de commentaires
     * 
     * @param   string $news Le news ciblée pour la récupération des commentaires
     * @return  array La liste des commentaires
     */
    abstract public function getListOf($news);
    
    /**
     * Méthode permettant de modifier un commentaire depuis le backend
     * 
     * @param Comment $comment Le commentaire à modifier
     * @return void
     */
    abstract protected function modify(Comment $comment);
    
    /**
     * Méthode permettant de récupérer un commentaire spécifique
     * 
     * @param int $id L'identifiant du commentaire
     * @return void
     */
    abstract public function get($id);
    
    /**
     * Méthode permettant de supprimer un commentaire si user authentifié
     * 
     * @param int $id Identifiant du commentaire à supprimer
     * @return void
     */
    abstract public function delete($id);
    
}