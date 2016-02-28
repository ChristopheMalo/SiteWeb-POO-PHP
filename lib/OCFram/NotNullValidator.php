<?php

namespace OCFram;

/**
 * Classe fille permettant de vérifier que le champ Field contient une valeur<br>
 * Si le champ contient une valeur, il est valide
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        27/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class NotNullValidator extends Validator {
    
    public function isValid($value)
    {
        return $value != '';
    }
    
}