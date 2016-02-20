<?php

/* 
 * Vue pour l'action index du module News
 * TP Créer un site web - POO en PHP
 *
 * @author      Christophe Malo
 * @date        18/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
foreach ($listeNews as $news) {
?>

<h2><a href="news-<?= $news['id'] ?>.html"><?= $news['titre'] ?></a></h2>
<p><?= nl2br($news['contenu']) ?></p>

<?php
}