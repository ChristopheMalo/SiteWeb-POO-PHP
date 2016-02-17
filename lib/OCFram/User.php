<?php

namespace OCFram;

session_start();

/**
 * La class user gère la session de l'internaute qui se connecte
 * 
 * @author      Christophe Malo
 * @date        17/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
class User {
    
    /*************** accesseurs - getters ***************/
    /**
     * Obtenir la valeur d'un attribut
     * 
     * @param  mixed $attr
     * @return mixed $attr
     */
    public function getAttribute($attr) {
        return $this->$attr;
    }
    
    /**
     * Récupérer un message informatif
     * 
     * @return string $flash
     */
    public function getFlash() {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);

        return $flash;
    }

    /**
     * Savoir si l'utilisateur a ce message (informatif) assigné
     * 
     * @return bool
     */
    public function hasFlash() {
        return isset($_SESSION['flash']);
    }
    
    /**
     * Savoir si l'utilisateur est authentifié
     * 
     * @return bool
     */
    public function isAuthenticated() {
        return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
    }
    
    

    /*************** mutateurs - setters ***************/
    /**
     * Obtenir la valeur d'un attribut
     * 
     * @param  mixed $attr, mixed value
     * @return void
     */
    public function setAttribute($attr, $value) {
        $_SESSION[$attr] = $value;
    }
    
    /**
     * Authentifier l'utilisateur
     * Utile pour un formulaire de connexion
     * 
     * @param bool=true $authenticated 
     * @return void
     */
    public function setAuthenticated($authenticated = true) {
        if (!is_bool($authenticated)) {
            throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated() doit être un boolean');
        }

        $_SESSION['auth'] = $authenticated;
    }

    /**
     * Assigner un message informatif
     * Le message est affiché sur la page
     * 
     * @param  string $value
     * @return void
     */
    public function setFlash($value) {
        $_SESSION['flash'] = $value;
    }

}
