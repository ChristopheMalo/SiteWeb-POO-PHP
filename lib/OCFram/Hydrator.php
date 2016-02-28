<?php

namespace OCFram;

/**
 * <p>Le trait Hydrator implémente une méthode Hydrate<br>
 * Entity et Field utilisent Hydrator</p>
 *
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        25/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
trait Hydrator {
    
    /**
     * Méthode d'hydratation pour les champs field et Entity
     * 
     * @param mixed $data
     */
    public function hydrate($data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
      
            if (is_callable([$this, $method]))
            {
                $this->$method($value);
            }
    }

    }
    
}
