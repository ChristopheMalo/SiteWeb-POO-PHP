<?php

namespace OCFram;

/**
 * La classe FormBuilder est chargée de construire un fomulaire
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        27/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class FormBuilder {
    
    protected $form;
    
    /**
     * Méthode de construction qui assigne un formulaire à une entité
     * 
     * @param \OCFram\Entity $entity
     * @return void
     */
    public function __construct(Entity $entity) {
        $this->setForm(new Form($entity));
    }
    
    /**
     * Cette méthode permet de construire le formulaire
     * 
     * @return void
     */
    abstract public function build();
    
    /**
     * Méthode qui permet de retourner un formulaire
     * 
     * @return Form
     */
    public function form()
    {
        return $this->form;
    }
    
    /**
     * Méthode qui permet d'assigner un formulaire
     * 
     * @param \OCFram\Form $form Le formulaire
     * @return void
     */
    public function setForm(Form $form)
    {
        $this->form = $form;
    }
    
}