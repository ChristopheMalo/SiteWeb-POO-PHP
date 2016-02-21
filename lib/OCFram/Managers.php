<?php

namespace OCFram;

/**
 * Classe qui gère les managers
 * Cette classe est instancié au sein du controleur en lui passant le DAO
 * Les méthodes filles auront accès à cet objet
 * et pourront accéder facilement aux managers
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        14/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class Managers
{

    protected $api      = null,
              $dao      = null,
              $managers = [];
    
    /**
     * Méthode de contruction
     * 
     * @param string $api
     * @param object $dao
     * @return void
     */
    public function __construct($api, $dao)
    {
        $this->api = $api;
        $this->dao = $dao;
    }
    
    /**
     * Méthode permettant de retoruner le module
     * 
     * @param string $module
     * @return object $module
     * @throws \InvalidArgumentException
     */
    public function getManagerOf($module)
    {
        if (!is_string($module) || empty($module)) 
        {
            throw new \InvalidArgumentException('Le module spécifié est invalide');
        }

        if (!isset($this->managers[$module]))
        {
            $manager = '\\Model\\' . $module . 'Manager' . $this->api;

            $this->managers[$module] = new $manager($this->dao);
        }

        return $this->managers[$module];
    }

}