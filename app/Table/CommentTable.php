<?php

namespace App\Table;

use Core\Table\Table;


class CommentTable extends Table    
{
    
    protected $table = "comment";


    public function lastByComment($article_id)
    {
        return $this->query ("
            SELECT comment.id, comment.pseudo, comment.contenu, comment.signale,
            DATE_FORMAT(comment.date, '%d/%m/%Y') AS date, 
            DATE_FORMAT(comment.date, '%Hh %imin') AS heure,
            DATE_FORMAT(comment.date, 'Le %d/%m/%Y à %Hh%i') AS date_heure 
            FROM comment 
            LEFT JOIN articles ON article_id = articles.id
            WHERE comment.article_id = ?
            ORDER BY comment.date DESC
        ", [$article_id]);
    }
}
