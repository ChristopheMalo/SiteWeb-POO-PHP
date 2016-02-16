<?php

namespace OCFram;

/**
 * Classe représentant la réponse envoyée au client
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        13/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class HTTPResponse extends ApplicationComponent {
    protected $page;
    
    public function addHeader($header) {
        header($header);
    }
    
    public function redirect($location) {
        header('Location: ' . $location);
    }
    
    public function redirect404() {
        // Créer une instance de la page
        $this->page = new Page($this->app);
        
        // Assigner à la page le fichier vue à générer
        $this->page->setContentFile(__DIR__ . '/../../Errors/404.html');
        
        // Ajouter le header
        $this->addHeader('HTTP/1.O 404 Not Found');
        
        // Envoyer la réponse
        $this->send();
    }
    
    public function send() {
        exit($this->page->getGeneratedPage());
    }
    
    // Par sécurité, par rapport à la fonction PHP setcookie(),
    // le dernier argument httponly est par défaut à true et non false
    public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true) {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
    }
    
    public function setPage(Page $page) {
        $this->page = $page;
    }
}
