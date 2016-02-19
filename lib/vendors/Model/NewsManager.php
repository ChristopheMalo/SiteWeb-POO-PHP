<?php

namespace Model;

use \OCFram\Manager;
/**
 * Classe premettant de gérer les news
 * Cette classe doit intéragir avec la DB
 * Elle n'est pas dépendante de PDO
 * D'où la création d'une classes spécialisée pour PDO
 * La classe spécialisée va hériter de NewsManager
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        18/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class NewsManager extends Manager {
    /**
     * Méthode retournant une liste de news demandée.
     * @param $debut int La première news à sélectionner
     * @param $limite int Le nombre de news à sélectionner
     * @return array La liste des news. Chaque entrée est une instance de News.
     */
    abstract public function getList($debut = -1, $limite = -1);
}