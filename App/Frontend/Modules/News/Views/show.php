<?php

/* 
 * Vue pour l'action show (executeShow du module News)
 * TP Créer un site web - POO en PHP
 *
 * @author      Christophe Malo
 * @date        19/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
?>
<!-- Affichage de la news -->
<p>Par <em><?= $news['auteur'] ?></em>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>
<h2><?= $news['titre'] ?></h2>
<p><?= nl2br($news['contenu']) ?></p>

<?php if ($news['dateAjout'] != $news['dateModif']) { ?>
    
    <p style="text-align: right;"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>

<?php } ?>

<!-- Gestion des commentaires -->    
<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>

<?php if (empty($comments)) { ?>
    
    <p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>

<?php }

foreach ($comments as $comment) { ?>
    
    <fieldset>
        <legend>
            Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?>
        </legend>
        <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
    </fieldset>

<?php } ?>

<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>