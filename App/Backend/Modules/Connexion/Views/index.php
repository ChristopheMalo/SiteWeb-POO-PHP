<?php

/* 
 * Vue pour l'action index (executeIndex du module De connexion Backend)
 * Formulaire pour saisir le nom d'utilisateur et le mot de passe
 * 
 * TP Créer un site web - POO en PHP
 *
 * @author      Christophe Malo
 * @date        22/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
?>
<h2>Connexion</h2>

<form action="" method="post">
    <label>Pseudo</label>
    <input type="text" name="login" /><br />

    <label>Mot de passe</label>
    <input type="password" name="password" /><br /><br />

    <input type="submit" value="Connexion" />
</form>