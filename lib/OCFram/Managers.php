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
class Managers {
    protected $api      = null,
              $dao      = null,
              $managers = [];
    
    public function __construct($api, $dao) {
        $this->api = $api;
        $this->dao = $dao;
    }
    
    public function getManagerOf($module) {
        if (!is_string($module) || empty($module)) {
            throw new \InvalidArgumentException('Le module spécifié est invalide');
        }

        if (!isset($this->managers[$module])) {
            $manager = '\\Model\\' . $module . 'Manager' . $this->api;

            $this->managers[$module] = new $manager($this->dao);
        }

        return $this->managers[$module];
    }

}
