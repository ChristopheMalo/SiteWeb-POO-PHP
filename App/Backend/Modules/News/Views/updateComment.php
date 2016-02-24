<?php

/* 
 * Vue pour l'action updateComment pour un commentaire de news du module News Backend
 * La vue contient un formulaire et affiche les erreurs (si nécessaire)
 * 
 * TP Créer un site web - POO en PHP
 *
 * @author      Christophe Malo
 * @date        24/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
?>
<form action="" method="post">
    <p>
        <?= isset($erreurs) && in_array(\Entity\Comment::AUTEUR_INVALIDE, $erreurs) ? 'L\'auteur est invalide.<br />' : '' ?>
        <label>Pseudo</label><input type="text" name="pseudo" value="<?= htmlspecialchars($comment['auteur']) ?>" /><br />

        <?= isset($erreurs) && in_array(\Entity\Comment::CONTENU_INVALIDE, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>
        <label>Contenu</label><textarea name="contenu" rows="7" cols="50"><?= htmlspecialchars($comment['contenu']) ?></textarea><br />

        <input type="hidden" name="news" value="<?= $comment['news'] ?>" />
        <input type="submit" value="Modifier" />
    </p>
</form>