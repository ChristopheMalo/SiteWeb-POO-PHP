<?php

namespace OCFram;

/**
 * Classe fille permettant de vérifier que le champ Field possède bien une longiueur > 0<br>
 * Si le champ possède une longueur spécifiée > 0, il est valide
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        27/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class MaxLengthValidator extends Validator {
    
    protected $maxLength;
    
    public function __construct($errorMessage, $maxLength)
    {
        parent::__construct($errorMessage);
        $this->setMaxLength($maxLength);
    }
    
    public function isValid($value)
    {
        return strlen($value) <= $this ->maxLength;
    }
    
    /**
     * Méthode permettant d'assigner une valeur à la propriété HTML maxlength d'un champ
     * 
     * @param int $maxLength
     * @return void
     * @throws \RuntimeException
     */
    public function setMaxLength($maxLength)
    {
        $maxLength = (int) $maxLength;
        
        if ($maxLength > 0)
        {
            $this->$maxLength = $maxLength;
        }
        else
        {
            throw new \RuntimeException('La longueur maximale doit être un nombre supérieur à 0');
        }
    }
    
}
