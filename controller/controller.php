
<?php
//this file is responsible for connecting the model and the view

//to use the function model.php, we need to include it
require_once './model/ArticleManager.php';
require_once './model/CommentManager.php';

function showArticle($id)
{   //$articleManager is the object
    //GET parameter for article id exists? show a single article
    $articleManager = new ArticleManager();
    $commentManager = new CommentManager();
    $article = $articleManager->getArticle($id);
    $numComments = $commentManager->getNumComments($id);
    $comments = $commentManager->getComments($id);
    require './view/articleView.php';
}

function showArticles()
{
    $articleManager = new ArticleManager();
    $articles = $articleManager->getArticles(); //from model.php
    require './view/indexView.php';
}

function postComment($article_id, $author, $comment)
{
    $commentManager = new CommentManager();
    $commentManager->addComment($article_id, $author, $comment); //insert (not viewing or SELECTING so we don't need to save as variable)
    header("Location: index.php?&action=viewFullArticle&article=$article_id");
}

function getCommentsAJAX($article_id, $offset)
{
    $commentManager = new CommentManager();
    $comments = $commentManager->getComments($article_id, $offset);
    foreach ($comments as $comment) {
        include "./view/component/commentCard.php";
    }
}

//REQUIRE if there's an error, then you will see an error and everything will just stop
//INCLUDE will show an error but continue to execute the rest of the code
