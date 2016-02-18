<?php

namespace Entity;

use \OCFram\Entity;

/**
 * Classe représentant une news
 * TP Créer un site web - POO en PHP
 *
 * @author      Christophe Malo
 * @date        18/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class News extends Entity {

    /**
     * Attributs
     */
    protected $auteur,
              $titre,
              $contenu,
              $dateAjout,
              $dateModif;

    /**
     * Déclaration des Constantes - Pour la gestion des erreurs qui peuvent être rencontrées lors de l'exécution de la méthode.
     */
    const AUTEUR_INVALIDE = 1;    // L'auteur de la news n'est pas valide
    const TITRE_INVALIDE = 2;     // Le titre de la news n'est pas valide
    const CONTENU_INVALIDE = 3;   // Le contenu de la news n'est pas valide

    /**
     * Méthode permettant de savoir si la news est valide.
     * @return bool
     */
    public function isValid() {
        return !(empty($this->auteur) || empty($this->titre) || empty($this->contenu));
    }

    /**
     * Méthodes Accesseurs (Getters) - Pour récupérer / lire la valeur d'un attribut
     */
    public function getAuteur() {
        return $this->auteur;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getDateAjout() {
        return $this->dateAjout;
    }

    public function getDateModif() {
        return $this->dateModif;
    }

    /**
     * Methodes Mutateurs (Setters) - Pour modifier la valeur d'un attribut
     */
    public function setAuteur($auteur) {
        if (!is_string($auteur) || empty($auteur)) {
            $this->erreurs[] = self::AUTEUR_INVALIDE;
        }
        
        $this->auteur = $auteur;
    }

    public function setTitre($titre) {
        if (!is_string($titre) || empty($titre)) {
            $this->erreurs[] = self::TITRE_INVALIDE;
        }
        
        $this->titre = $titre;
    }

    public function setContenu($contenu) {
        if (!is_string($contenu) || empty($contenu)) {
            $this->erreurs[] = self::CONTENU_INVALIDE;
        }
        
        $this->contenu = $contenu;
    }

    public function setDateAjout(\DateTime $dateAjout) {
        $this->dateAjout = $dateAjout;
    }

    public function setDateModif(\DateTime $dateModif) {
        $this->dateModif = $dateModif;
    }

}
