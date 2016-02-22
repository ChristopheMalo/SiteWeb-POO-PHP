<?php

namespace Entity;

use \OCFram\Entity;

/**
 * Classe représentant l'enregistrement d'un commentaire - Entité
 * Ajout d'un commentaire est une action du module news
 * Le commentaire est assigné à une news
 * 
 * TP Créer un site web - POO en PHP
 *
 * @author      Christophe Malo
 * @date        20/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class Comment extends Entity
{

    protected $news,
              $auteur,
              $contenu,
              $date;

    const AUTEUR_INVALIDE   = 1,
          CONTENU_INVALIDE  = 2;
    
    /**
     * Méthode permettant de savoir si le commentaire est valide
     * 
     * @return bool
     */
    public function isValid() 
    {
        return !(empty($this->auteur) || empty($this->contenu));
    }

    /* Setters - Les mutateurs */
    /* Pour créer ou modifier les informations des commentaires */
    /**
     * La news recevant le commentaire
     * 
     * @param int $news
     * @return void
     */
    public function setNews($news)
    {
        $this->news = (int) $news;
    }

    /**
     * L'auteur de la news
     * 
     * @param string $auteur
     * @return void
     */
    public function setAuteur($auteur)
    {
        if (!is_string($auteur) || empty($auteur))
        {
            $this->erreurs[] = self::AUTEUR_INVALIDE;
        }

        $this->auteur = $auteur;
    }

    /**
     * Le contenu de la news
     * 
     * @param string $contenu
     * @return void
     */
    public function setContenu($contenu)
    {
        if (!is_string($contenu) || empty($contenu))
        {
            $this->erreurs[] = self::CONTENU_INVALIDE;
        }

        $this->contenu = $contenu;
    }

    /**
     * Date de création du commentaire
     * 
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /* Les getters - Accesseurs */
    /* Pour récupérer les différentes informations */
    public function news()
    {
        return $this->news;
    }

    public function auteur()
    {
        return $this->auteur;
    }

    public function contenu()
    {
        return $this->contenu;
    }

    public function date()
    {
        return $this->date;
    }
    
}