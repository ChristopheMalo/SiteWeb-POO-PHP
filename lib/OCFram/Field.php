<?php

namespace OCFram;

/**
 * L'objet Field représente l'un des champs de Form
 *
  * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        26/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class Field {
    
    // Utiliser le trait Hydrator pour hydrater les objets Fields
    use Hydrator;
    
    /**
     * Les attributs
     */
    protected   $errorMessage,    // pour stocker message d'erreur associé au champ
                $label,           // pour stocker le label du champ
                $name,            // pour stocker le nom du champ
                $validators = [], // pour stocker la liste des validateurs du champ
                $value;           // pour stocker la valeur du champ
    
    /**
     * Méthode de construction permettant de demander la liste des attributs
     * avec leurs valeurs afin d'hydrater l'objet
     * 
     * @param array $options
     * @return void
     */
    public function __construct(array $options = [])
    {
        if (!empty($options))
        {
            $this->hydrate($options);
        }
    }
    
    /**
     * Méthode abstraite permettant de renvoyer le code HTML du champ
     * 
     * @return string
     */
    abstract public function buildWidget();
    
    /**
     * Méthode permettant de saboir si le champ est valide
     * 
     * @return bool
     */
    public function isValid()
    {
        foreach ($this->validators as $validator)
        {
            if (!$validator->isValid($this->value))
            {
                $this->errorMessage = $validator->errorMessage();
                return false;
            }
        }
        
        return true;
    }
    
    /** Méthodes Accesseurs (Getters) - Pour récupérer / lire la valeur d'un attribut **/
    
    /**
     * Méthode permettant de retourner le label accompagnant le champ
     * 
     * @return string Le label du champ
     */
    public function label()
    {
        return $this->label;
    }
    
    /**
     * Méthode permettant de retourner la longueur du champ
     * 
     * @return int La longueur du champ
     */
    public function length()
    {
        return $this->length();
    }
    
    /**
     * Méthode permettant de retourner le nom du champ
     * 
     * @return string Le nom du champ
     */
    public function name()
    {
        return $this->name;
    }
    
    /**
     * Méthode permettant de retourner la liste des validateurs utilisés pour un champ
     * 
     * @return array La liste des validateurs du champ
     */
    public function validators()
    {
        return $this->validators;
    }
    
    /**
     * Méthode permettant de retourner la valeur
     * 
     * @return string La valeur du champ
     */
    public function value()
    {
        return $this->value;
    }
    
    
    /** Methodes Mutateurs (Setters) - Pour modifier la valeur d'un attribut **/
    
    /**
     * @param string $label
     * @return void
     */
    public function setLabel($label)
    {
        if (is_string($label))
        {
            $this->label = $label;
        }
    }
    
    public function setLength($length)
    {
        $length = (int) $length;
        
        if ($length > 0)
        {
            $this->length = $length;
        }
    }
    
    /**
     * @param string $name
     * @retun void
     */
    public function setName($name)
    {
        if (is_string($name))
        {
            $this->name = $name;
        }
    }
    
    /**
     * @param array $validators
     * @return void
     */
    public function setValidators(array $validators)
    {
        foreach ($validators as $validator)
        {
            if ($validator instanceof Validator && !in_array($validator, $this->validators))
            {
                $this->validators[] = $validator;
            }
        }
    }
    
    /**
     * @param string $value
     * @return void
     */
    public function setValue($value)
    {
        if (is_string($value))
        {
            $this->value = $value;
        }
    }
    
}