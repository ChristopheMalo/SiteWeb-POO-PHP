<?php

namespace OCFram;

/**
 * Classe permettant de créer une route
 * Assigner un module et une action à une URL
 *  
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        14/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class Route
{

    protected $action;
    protected $module;
    protected $url;
    protected $varsNames;
    protected $vars = [];
    
    /**
     * La méthode de construction de la route
     * 
     * @param string $url
     * @param string $module
     * @param string $action
     * @param array $varsNames
     * @return void
     */
    public function __construct($url, $module, $action, array $varsNames)
    {
        $this->setUrl($url);
        $this->setModule($module);
        $this->setAction($action);
        $this->setVarsNames($varsNames);
    }
    
    /**
     * Fonction permettant de savoir si la route possède des variables
     * 
     * @return bool
     */
    public function hasVars()
    {
        return !empty($this->varsNames);
    }
    
    /**
     * Methode permettant de savoir si la route correspond à l'URL
     * 
     * @param string $url
     * @return boolean
     */
    public function match($url)
    {
        if (preg_match('`^' . $this->url . '$`', $url, $matches)) {
            return $matches;
        } else {
            return false;
        }
    }
    
    /* Setters */
    public function setAction($action)
    {
        if (is_string($action))
        {
            $this->action = $action;
        }
    }

    public function setModule($module)
    {
        if (is_string($module))
        {
            $this->module = $module;
        }
    }

    public function setUrl($url)
    {
        if (is_string($url))
        {
            $this->url = $url;
        }
    }

    public function setVarsNames(array $varsNames)
    {
        $this->varsNames = $varsNames;
    }

    public function setVars(array $vars)
    {
        $this->vars = $vars;
    }

    /* Getters */
    public function action()
    {
        return $this->action;
    }

    public function module()
    {
        return $this->module;
    }
    
    public function url()
    {
        return $this->url;
    }

    public function vars()
    {
        return $this->vars;
    }

    public function varsNames()
    {
        return $this->varsNames;
    }

}