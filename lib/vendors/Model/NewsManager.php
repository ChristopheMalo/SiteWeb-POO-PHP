<?php

namespace Model;

use \OCFram\Manager;
use \Entity\News;
/**
 * Classe premettant de gérer les news
 * Cette classe doit intéragir avec la DB
 * Elle n'est pas dépendante de PDO
 * D'où la création d'une classes spécialisée pour PDO
 * La classe spécialisée va hériter de NewsManager
 * 
 * TP Créer un site web - POO en PHP
 * 
 * @author      Christophe Malo
 * @date        18/02/2016
 * @version     1.0.0
 * @copyright   OpenClassrooms - Victor Thuillier
 */
abstract class NewsManager extends Manager
{

    /**
     * Méthode retournant une liste de news demandée.
     * 
     * @param int $debut La première news à sélectionner
     * @param int $limite Le nombre de news à sélectionner
     * @return array La liste des news. Chaque entrée est une instance de News.
     */
    abstract public function getList($debut = -1, $limite = -1);
    
    /**
     * Méthode retournant une news spécifique
     * 
     * @param   int $id L'identifiant unique de la news à afficher
     * @return  News    La news demandée 
     */
    abstract public function getUnique($id);
    
    /**
     * Méthode permettant de retrouner le nombre total de news
     * 
     * @return void
     */
    abstract public function count();
    
    /**
     * Méthode permettant d'ajouter une news
     * 
     * @param $news News La news à ajouter
     * @return void
     */
    abstract protected function add(News $news);
    
    /**
     * Méthode permettant d'enregistrer une news
     * Cette méthode s'implémente directement dans NewsManager
     * car elle ne dépend pas du DAO
     * 
     * save() ajoute la news si nouvelle ou la met à jour si déjà enregistrée
     * 
     * @param News $news
     * @see self::add()
     * @see self::modify()
     * @return void
     * @throws \RuntimeException
     */
    public function save(News $news)
    {
      if ($news->isValid())
      {
        $news->isNew() ? $this->add($news) : $this->modify($news);
      }
      else
      {
        throw new \RuntimeException('La news doit être validée pour être enregistrée');
      }
    }
    
    /**
     * Méthode permettant de modifier une news
     * 
     * @param News $news La news à modifier
     */
    abstract protected function modify(News $news);
}
