<?php

namespace OCFram;

/**
 * Descriptif
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        14/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class Manager {

    protected $dao;

    public function __construct($dao) {
        $this->dao = $dao;
    }

}
