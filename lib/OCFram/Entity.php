<?php

namespace OCFram;

/**
 * Entity représent un module de l'application
 * Exemple : News, Commentaire
 * Chaque module hérite d'Entity
 *
  * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        14/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class Entity implements \ArrayAccess
{
    
    protected $erreurs = [],
              $id;
    
    /**
     * Le constructeur hydrate l'objet
     * 
     * @param array $donnees
     * @return void
     */
    public function __construct(array $donnees = [])
    {
        if (!empty($donnees))
        {
            $this->hydrate($donnees);
        }
    }
    
    /**
     * Permet de vérifier si l'enregistrement est nouveau
     * 
     * @return bool
     */
    public function isNew()
    {
        return empty($this->id);
    }

    /**
     * Getter - Affiche les erreurs
     * 
     * @return array
     */
    public function erreurs()
    {
        return $this->erreurs;
    }
    
    /**
     * Getter - retourne l'id de l'entité
     * 
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Assigne un id
     * 
     * @param int $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }
    
    /**
     * Methode d'hydratation si un tableau de valeur est fourni
     * 
     * @param array $donnees
     * @return void
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $attribut => $valeur)
        {
            $methode = 'set' . ucfirst($attribut);

            if (is_callable([$this, $methode]))
            {
                $this->$methode($valeur);
            }
        }
    }
    
    /**
     * Implémentation de 4 fonctions d'ArrayAccess
     * ArrayAccess permet d'accéder aux objets de la même façon qu'un tableau
     * 
     * Retourne la valeur à la position donnée
     * 
     * @param mixed $var
     * @return mixed
     */
    public function offsetGet($var)
    {
        if (isset($this->$var) && is_callable([$this, $var]))
        {
            return $this->$var();
        }
    }
    
    /**
     * Assigne une valeur à une position donnée
     * 
     * @param mixed $var
     * @param mixed $value
     * @return void
     */
    public function offsetSet($var, $value)
    {
        $method = 'set' . ucfirst($var);

        if (isset($this->$var) && is_callable([$this, $method]))
        {
            $this->$method($value);
        }
    }

    /**
     * Indique si une position existe
     * 
     * @param bool $var
     * @return bool
     */
    public function offsetExists($var)
    {
        return isset($this->$var) && is_callable([$this, $var]);
    }

    /**
     * Supprime un élément à une position donnée
     * 
     * @param mixed $var
     * @return void
     * @throws \Exception
     */
    public function offsetUnset($var)
    {
        throw new \Exception('Impossible de supprimer une quelconque valeur');
    }
    
}