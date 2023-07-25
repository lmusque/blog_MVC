<?php
require_once "Manager.php";
class CommentManager extends Manager
{
    public function getComments($article_id, $offset = 0)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE article_id = :article ORDER BY id DESC LIMIT :offset, 5');

        $req->bindParam("article", $article_id, PDO::PARAM_INT);
        $req->bindParam("offset", $offset, PDO::PARAM_INT);
        $req->execute();
        $comments = $req->fetchAll();
        return $comments;
    }

    public function addComment($article_id, $author, $comment)
    //we need that data from the bind param so we need to pass it through
    {
        $db = $this->dbConnect();
        $str = 'INSERT INTO comments (article_id, author, comment) VALUES (:article_id,:author,:comment)';

        $query = $db->prepare($str);
        $query->bindParam('article_id', $article_id, PDO::PARAM_INT);
        $query->bindParam('author', $author, PDO::PARAM_STR);
        $query->bindParam('comment', $comment, PDO::PARAM_STR);
        $query->execute();
    }

    public function getNumComments($article_id)
    {
        $db = $this->dbConnect();
        $resp = $db->prepare("SELECT COUNT(*) AS count FROM COMMENTS WHERE article_id = ?");
        $resp->execute([$article_id]);
        $countdb = $resp->fetch(PDO::FETCH_OBJ);
        $numComments = $countdb->count;
        return $numComments;
    }
}
