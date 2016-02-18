<?php

namespace Model;

use \Entity\News;

/**
 * Classe spécialisée pour se connecter à la DB en PDO
 * Cette classe hérite de NewsManager
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        18/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class NewsManagerPDO extends NewsManager {
    public function getList($debut = -1, $limite = -1) {
        $sql = 'SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM news ORDER BY id DESC';

        if ($debut != -1 || $limite != -1) {
            $sql .= ' LIMIT ' . (int) $limite . ' OFFSET ' . (int) $debut;
        }

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');

        $listeNews = $requete->fetchAll();

        foreach ($listeNews as $news) {
            $news->setDateAjout(new \DateTime($news->dateAjout()));
            $news->setDateModif(new \DateTime($news->dateModif()));
        }

        $requete->closeCursor();

        return $listeNews;
    }

}