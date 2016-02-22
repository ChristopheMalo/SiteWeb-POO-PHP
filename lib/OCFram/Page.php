<?php

namespace OCFram;

/**
 * Classe permettant de générer une page
 * composée d'une vue et d'un layout
 * Une page peut recevoir une variable
 * 
 * Page est un composant de l'application, il hérite de ApplicationComponent
 * 
 * TP Créer un système de news - POO en PHP
 *
 * @author      Christophe Malo
 * @date        13/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class Page extends ApplicationComponent
{
    
    protected $contentFile,
              $vars = [];
    
    /**
     * Cette méthode permet d'ajouter une variable à la page
     * Le contrôleuir pourra alors passer des données à la vue
     * 
     * @param string $var
     * @param mixed $value
     * @return void
     * @throws \InvalidArgumentException
     */
    public function addVar($var, $value)
    {
        if (!is_string($var) || is_numeric($var) || empty($var))
        {
            throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractères non nulle');
        }

        $this->vars[$var] = $value;
    }
    
    /**
     * Méthode permettant de générer la page avec le layout de l'application
     * 
     * @return string
     * @throws \RuntimeException
     */
    public function getGeneratedPage()
    {
        if (!file_exists($this->contentFile))
        {
            throw new \RuntimeException('La vue spécifiée n\'existe pas');
        }
        
        $user = $this->app->user();

        extract($this->vars);

        ob_start();
        require $this->contentFile;
        $content = ob_get_clean();

        ob_start();
        require __DIR__ . '/../../App/' . $this->app->name() . '/Templates/layout.php';
        return ob_get_clean();
    }
    
    /**
     * Méthode permettant d'assigner une vue à la page
     * 
     * @param string $contentFile
     * @return void
     * @throws \InvalidArgumentException
     */
    public function setContentFile($contentFile)
    {
        if (!is_string($contentFile) || empty($contentFile))
        {
            throw new \InvalidArgumentException('La vue spécifiée est invalide');
        }

        $this->contentFile = $contentFile;
    }
    
}