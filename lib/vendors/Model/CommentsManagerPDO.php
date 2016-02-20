<?php

namespace Model;

use \Entity\Comment;

/**
 * Classe spécialisée pour se connecter à la DB en PDO
 * Cette classe hérite de CommentsManager
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        20/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class CommentsManagerPDO extends CommentsManager {
    protected function add(Comment $comment) {
        $q = $this->dao->prepare('INSERT INTO comments SET news = :news, auteur = :auteur, contenu = :contenu, date = NOW()');

        $q->bindValue(':news', $comment->news(), \PDO::PARAM_INT);
        $q->bindValue(':auteur', $comment->auteur());
        $q->bindValue(':contenu', $comment->contenu());

        $q->execute();

        $comment->setId($this->dao->lastInsertId());
    }
}