<?php
/**
 * Fichier servant à enregistrer les autoload
 * puis à lancer l'application : le bootstrap
 * TP Créer un système de news - POO en PHP
 *
 * @author      Christophe Malo
 * @date        13/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
const DEFAULT_APP = 'Frontend'; // Nom de l'application

// Si application non valide -> chargement application par défaut puis affichage erreur 404
if (!isset($_GET['app']) || !file_exists(__DIR__.'/../App/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;

// Inclure la classe permettant d'enregistrer lesautoload
require __DIR__.'/../lib/OCFram/SplClassLoader.php';

// Enregistrement des autoloads correspondant à chaque vendor (OCFram, App, Model et Entity)
$OCFramLoader = new SplClassLoader('OCFram', __DIR__.'/../lib');
$OCFramLoader->register();

$appLoader = new SplClassLoader('App', __DIR__.'/..');
$appLoader->register();

$modelLoader = new SplClassLoader('Model', __DIR__.'/../lib/vendors');
$modelLoader->register();

$entityLoader = new SplClassLoader('Entity', __DIR__.'/../lib/vendors');
$entityLoader->register();

$formBuilderLoader = new SplClassLoader('FormBuilder', __DIR__.'/../lib/vendors');
$formBuilderLoader->register();

// Déduction du nom de la classe et instanciation de cette classe
$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';

$app = new $appClass;
$app->run();