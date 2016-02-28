<?php

/** 
 * Vue pour l'action update / modifier une news news-update du module News Backend
 * Insert et Update utilisent cette view
 * Mise en place de l'inclusion d'un fichier form d'ou le nom _form.php
 * 
 * TP Créer un site web - POO en PHP
 *
 * @author      Christophe Malo
 * @date        22/02/2016
 * @update      28/02/2016
 * @commentaire Update du 28/02/16 : Utiliser FOrmBuilder
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
?>
<h2>Modifier une news</h2>
<form action="" method="post">
    <p>
        <?= $form ?>
        <input type="submit" value="Modifier" />
    </p>
</form>