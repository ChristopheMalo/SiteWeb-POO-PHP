<?php

namespace OCFram;

/**
 * La classe FormHandler est chargée de gérer un fomulaire
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        28/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class FormHandler {
    
    /**
     * Les attributs
     */
    protected $form,    // pour stocker le formulaire
              $manager, // pour stocker le manager correspondant à l'entité 
              $request; // pour stocker la requête du client afin d'en connaitre le type (GET ou POST)

    /**
     * Méthode de construction du gestionnaire de formulaire
     * 
     * @param \OCFram\Form $form Le formulaire
     * @param \OCFram\Manager $manager Le manager correspondant à l'entité
     * @param \OCFram\HTTPRequest $request La requête du client pour déterminer le type
     * @return void
     */
    public function __construct(Form $form, Manager $manager, HTTPRequest $request)
    {
        $this->setForm($form);
        $this->setManager($manager);
        $this->setRequest($request);
    }

    
    public function process()
    {
        if ($this->request->method() == 'POST' && $this->form->isValid())
        {
            $this->manager->save($this->form->entity());

            return true;
        }

        return false;
    }

    /**** Les Setters - Mutateurs ****/
    public function setForm(Form $form)
    {
        $this->form = $form;
    }

    public function setManager(Manager $manager)
    {
        $this->manager = $manager;
    }

    public function setRequest(HTTPRequest $request)
    {
        $this->request = $request;
    }

}