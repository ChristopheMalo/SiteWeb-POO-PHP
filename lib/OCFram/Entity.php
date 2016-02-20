<?php

namespace OCFram;

/**
 * Description of Entity
 *
 * @author cmalo
 */
abstract class Entity implements \ArrayAccess
{
    
    protected $erreurs = [],
              $id;
    
    /**
     * Le constructeur hydrate l'objet
     * @param array $donnees
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
     */
    public function isNew()
    {
        return empty($this->id);
    }

    public function erreurs()
    {
        return $this->erreurs;
    }

    public function id()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = (int) $id;
    }
    
    /**
     * Methode d'hydratation si un tableau de valeur est fourni
     * @param array $donnees
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
     * @param type $var
     * @return type
     */
    public function offsetGet($var)
    {
        if (isset($this->$var) && is_callable([$this, $var]))
        {
            return $this->$var();
        }
    }

    public function offsetSet($var, $value)
    {
        $method = 'set' . ucfirst($var);

        if (isset($this->$var) && is_callable([$this, $method]))
        {
            $this->$method($value);
        }
    }

    public function offsetExists($var)
    {
        return isset($this->$var) && is_callable([$this, $var]);
    }

    public function offsetUnset($var)
    {
        throw new \Exception('Impossible de supprimer une quelconque valeur');
    }
    
}