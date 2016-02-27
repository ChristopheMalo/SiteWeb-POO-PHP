<?php

namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\TextField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;

/**
 * L'objet CommentFormbuilder (classe fille de FormBuilder) représente le formulaire de création d'un commentaire
 *
  * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        27/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class CommentFormBuilder extends FormBuilder {
    
    public function build()
    {
        $this->form->add(new StringField([
                        'label'      => 'Auteur',
                        'name'       => 'auteur',
                        'maxLength'  => 50,
                        'validators' => [
                            new MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 50),
                            new NotNullValidator('Merci de spécifier l\'auteur du commentaire'),
                        ],
                      ]))
                   ->add(new TextField([
                        'label'      => 'Contenu',
                        'name'       => 'contenu',
                        'rows'       => 7,
                        'cols'       => 50,
                        'validators' => [
                            new NotNullValidator('Merci de spécifier votre commentaire'),
                       ],
                      ]));
    }
    
}