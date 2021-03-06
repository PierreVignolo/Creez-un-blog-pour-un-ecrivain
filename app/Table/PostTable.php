<?php

namespace App\Table;

use Core\Table\Table;


class PostTable extends Table    
{

    protected $table = 'articles';
    
    /**
     * Récupère les derniers article
     * @return array
     */

    public function last()
    {
        return $this->query ("
            SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie,
            DATE_FORMAT(date, '%d/%m/%Y') AS date, 
            DATE_FORMAT(date, '%Hh %imin') AS heure,
            DATE_FORMAT(date, 'Le %d/%m/%Y à %Hh%i') AS date_heure
            FROM articles 
            LEFT JOIN categories ON category_id = categories.id
            ORDER BY articles.date DESC
        ");
    }

    /**
     * Récupère les derniers article de la category demandée
     * @param $category_id int
     * @return array
     */

    public function lastByCategory($category_id)
    {
        return $this->query ("
            SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
            FROM articles 
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.category_id = ?
            ORDER BY articles.date DESC
        ", [$category_id]);
    }

    /**
     * Récupère un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */

    public function findWithCategory($id)
    {
        return $this->query ("
            SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
            FROM articles 
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.id = ?
        ", [$id], true);
    }
}
