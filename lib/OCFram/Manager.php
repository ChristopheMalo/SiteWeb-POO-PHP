<?php

namespace OCFram;

/**
 * La classe Manager se charge d'implémenter un constructeur
 * qui demande le DAO par le biais d'un paramètre
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        14/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class Manager
{

    protected $dao;
    
    /**
     * Méthode de construction
     * 
     * @param string $dao
     * @return void
     */
    public function __construct($dao)
    {
        $this->dao = $dao;
    }

}