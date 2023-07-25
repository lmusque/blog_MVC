<?php
require_once "Manager.php";
class ArticleManager extends Manager
{
    public function getArticles()
    {
        //$this-> refers to current class we're inside of
        //and is necessary to use internal functions from this class

        $db = $this->dbConnect();
        // We retrieve the 5 last articles
        $req = $db->query('SELECT * FROM articles ORDER BY id DESC LIMIT 5');
        $articles = $req->fetchAll();
        //return the variable so we can use it somewhere else
        return $articles;
    }

    //article_id is coming from $_GET['article'] in index
    public function getArticle($article_id)
    {
        //$this-> refers to current class we're inside of
        $db = $this->dbConnect();
        // retrieve the article
        $req = $db->prepare('SELECT * FROM articles WHERE id = ?');
        $req->execute(array($article_id));
        $article = $req->fetch();
        return $article;
    }
}
