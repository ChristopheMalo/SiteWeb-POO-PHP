<?php

namespace OCFram;

/**
 * <p>La classe Validator est chargée de valider une donnée<br>
 * Il faut créer des classes filles pour chaque type de validation - un validateur ne peut valider qu'une donnée<br>
 * Cette classe renvoie un message si la valeur passée n'est pas valide</p>
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        26/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class Validator {
    
    protected $errorMessage;
    
    /**
     * Méthode de construction qui demande le message d'erreur
     * @param string $errorMessage
     */
    public function __construct($errorMessage)
    {
        $this->setErrorMessage($errorMessage);
    }
    
    /**
     * Méthode permettant de valider le champ<br>
     * Si le champ n'est pas valide, un message est retourner
     */
    abstract public function isValid($value);
    
    /**
     * Méthode accesseur permettant de retourner le message
     * 
     * @return string le message d'erreur
     */
    public function errorMessage()
    {
        return $this->errorMessage;
    }
    
    /**
     * Methode mutateur permettant d'assigner un message d'erreur
     * 
     * @param string $errorMessage LE message d'erreur
     * @return void
     */
    public function setErrorMessage($errorMessage)
    {
        if (is_string($errorMessage))
        {
            $this->errorMessage = $errorMessage;
        }
    }
    
}
