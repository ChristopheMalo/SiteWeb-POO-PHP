<?php

namespace OCFram;

/**
 * L'objet TextField (classe fille de field) représente un champ spécifique de Form - Le textarea
 *
  * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        26/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class TextField extends Field
{
    
    protected $cols;
    protected $rows;
    
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

        $widget .= '<label>' . $this->label . '</label><textarea name="' . $this->name . '"';

        if (!empty($this->cols))
        {
            $widget .= ' cols="' . $this->cols . '"';
        }

        if (!empty($this->rows))
        {
            $widget .= ' rows="' . $this->rows . '"';
        }

        $widget .= '>';

        if (!empty($this->value))
        {
            $widget .= htmlspecialchars($this->value);
        }

        return $widget . '</textarea>';
    }
    
    /**
     * Méthode permettant d'assigner un nombre de colonne à un champ (Mutateur - Setter) -
     * propriété HTML
     * 
     * @param int $cols Le nombre de colonne du champ textarea
     */
    public function setCols($cols)
    {
        $cols = (int) $cols;

        if ($cols > 0)
        {
            $this->cols = $cols;
        }
    }
    
    /**
     * Méthode permettant d'assigner un nombre de ligne à un champ (Mutateur - Setter) -
     * propriété HTML 
     * 
     * @param string $rows
     */
    public function setRows($rows)
    {
        $rows = (int) $rows;

        if ($rows > 0)
        {
            $this->rows = $rows;
        }
    }

}