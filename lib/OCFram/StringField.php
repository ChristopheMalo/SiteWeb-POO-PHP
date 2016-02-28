<?php

namespace OCFram;

/**
 * L'objet StringField (classe fille de field) représente un champ spécifique de Form - Le champ texte classique
 *
  * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        26/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class StringField extends Field
{
    
    protected $maxLength;
    
    /**
     * Méthode implémentée depuis Field
     * 
     * @return string
     */
    public function buildWidget()
    {
        $widget = '';

        if (!empty($this->errorMessage))
        {
            $widget .= $this->errorMessage . '<br />';
        }

        $widget .= '<label>' . $this->label . '</label><input type="text" name="' . $this->name . '"';

        if (!empty($this->value))
        {
            $widget .= ' value="' . htmlspecialchars($this->value) . '"';
        }

        if (!empty($this->maxLength))
        {
            $widget .= ' maxlength="' . $this->maxLength . '"';
        }

        return $widget .= ' />';
    }
    
    /**
     * Méthode permettant d'assigner une longueur maximale à un champ (Mutateur - Setter)
     * 
     * @param int $maxLength La longueur maximale du champ
     * @return void
     * @throws \RuntimeException
     */
    public function setMaxLength($maxLength)
    {
        $maxLength = (int) $maxLength;

        if ($maxLength > 0)
        {
            $this->maxLength = $maxLength;
        }
        else
        {
            throw new \RuntimeException('La longueur maximale doit être un nombre supérieur à 0');
        }
    }

}