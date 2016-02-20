<?php

namespace OCFram;

/**
 * La class Config gère la configuration
 * Chaque application possède un fichier 
 * de configuration déclarant ces propres paramètres
 * 
 * @author      Christophe Malo
 * @date        17/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class Config extends ApplicationComponent
{
    
    protected $vars = [];
    
    /**
     * Récupérer la valeur d'un paramètre
     * 
     * @param  string $var
     * @return string $var
     */
    public function get($var)
    {
        if (!$this->vars)
        {
            $xml = new \DOMDocument;
            $xml->load(__DIR__ . '/../../App/' . $this->app->name() . '/Config/app.xml');

            $elements = $xml->getElementsByTagName('define');

            foreach ($elements as $element) {
                $this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
            }
        }

        if (isset($this->vars[$var]))
        {
            return $this->vars[$var];
        }

        return null;
    }
    
}