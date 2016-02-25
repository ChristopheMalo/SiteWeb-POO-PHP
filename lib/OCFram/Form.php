<?php

namespace OCFram;

/**
 * L'objet Form représente un formulaire et sa liste de champs associés
 *
  * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        25/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class Form
{
    
    /**
     * Les attributs
     *
     */
    protected $entity;      // Pour stocker l'entité correspondant au formulaire
    protected $fields = []; // Pour stocker la liste des champs

    /**
     * Méthode constructeur permettant de récupérer l'entité et
     * d'invoquer le setter correspondant
     * 
     * @return void
     */
    public function __construct(Entity $entity)
    {
        $this->setEntity($entity);
    }
    
    /**
     * Méthode permettant d'ajouter un champ à la liste
     * 
     * @param \OCFram\Field $field
     * @return \OCFram\Form
     */
    public function add(Field $field)
    {
        $attr = $field->name(); // Récupérer le nom du champ
        $field->setValue($this->entity->$attr()); // Assigner la valeur correspondante au champ

        $this->fields[] = $field; // Ajouter le champ passé en argument à la liste des champs
        return $this;
    }
    
    /**
     * Méthode permettant de générer le formulaire
     * 
     * @return string $view
     */
    public function createView()
    {
        $view = '';

        // Génèrer un par un les champs du formulaire.
        foreach ($this->fields as $field)
        {
            $view .= $field->buildWidget() . '<br />';
        }

        return $view;
    }
    
    /**
     * Méthode permettant de vérifier si le formulaire est valide
     * 
     * @return boolean
     */
    public function isValid()
    {
        $valid = true;

        // Vérifier que tous les champs sont valides.
        foreach ($this->fields as $field)
        {
            if (!$field->isValid())
            {
                $valid = false;
            }
        }

        return $valid;
    }
    
    /**
     * 
     * @return Entity
     */
    public function entity()
    {
        return $this->entity;
    }
    
    /**
     * 
     * @param \OCFram\Entity $entity
     * @return void
     */
    public function setEntity(Entity $entity)
    {
        $this->entity = $entity;
    }

}