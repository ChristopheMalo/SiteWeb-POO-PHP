<?php

namespace OCFram;

/**
 * Objet permettant d'associé une vue au controller
 * 2 caractéristiques : propre à un module et execute une action
 * Autre caractéristique : page associée au contrôleur
 * Attention, par défaut, la vue à la même valeur que l'action dans le constructeur
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        14/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class BackController extends ApplicationComponent
{
    
    protected $action   = '',
              $module   = '',
              $page     = null,
              $view     = '',
              $managers = null;
    
    /**
     * La méthode de construction
     * 
     * @param \OCFram\Application $app
     * @param string $module
     * @param string $action
     * @return void
     */
    public function __construct(Application $app, $module, $action)
    {
        parent::__construct($app);
        
        $this->managers = new Managers('PDO', PDOFactory::getMysqlConnexion());
        $this->page = new Page($app);
        
        $this->setModule($module);
        $this->setAction($action);
        $this->setView($action);
    }
    
    /**
     * Fonction permettant d'éxécuter une action (donc une méthode)
     * 
     * @return void
     * @throws \RuntimeException
     */
    public function execute()
    {
        $method = 'execute' . ucfirst($this->action);

        if (!is_callable([$this, $method]))
        {
            throw new \RuntimeException('L\'action "' . $this->action . '" n\'est pas définie sur ce module');
        }

        $this->$method($this->app->httpRequest());
    }
    
    /**
     * Méthode permettant d'obtenir la page associée au contrôleur
     * 
     * @return Page
     */
    public function page()
    {
        return $this->page;
    }
    
    /**
     * Méthode permettant de modifier le module
     * 
     * @param string $module
     * @return void
     * @throws \InvalidArgumentException
     */
    public function setModule($module)
    {
        if (!is_string($module) || empty($module))
        {
            throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
        }

        $this->module = $module;
    }
    
    /**
     * Méthode permenttant de modifier l'action
     * 
     * @param string $action
     * @return void
     * @throws \InvalidArgumentException
     */
    public function setAction($action)
    {
        if (!is_string($action) || empty($action))
        {
            throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
        }

        $this->action = $action;
    }

    /**
     * Méthode permettant de modifier la vue
     * 
     * @param string $view
     * @return void
     * @throws \InvalidArgumentException
     */
    public function setView($view)
    {
        if (!is_string($view) || empty($view))
        {
            throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
        }

        $this->view = $view;
        
        $this->page->setContentFile(__DIR__.'/../../App/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
    }
    
}