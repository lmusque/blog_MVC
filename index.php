
<?php
//ROUTER directs traffic
//using a specific get parameter --->
// index.php?action = something...
//switch on the get parameter

require "./controller/controller.php";

try {
    //if it's not null or undefined, use left value. if it is, use right
    $action = $_GET['action'] ?? "";
    // $action = isset($_GET['action'] )? $_GET['action'] : "";
    switch ($action) {
            //all possible action values should have a CASE
        case "viewFullArticle":
            if (isset($_GET['article']) and $_GET['article'] > 0) {
                showArticle($_GET['article']);
            } else {
                throw new Exception("Missing valid article id >:(");
            }
            break;
        case "postComment":
            if (!empty($_POST)) {
                $article_id = $_POST['article'] ?? "";
                $author = $_POST['name'] ?? "";
                $comment = $_POST['comment'] ?? "";
                if ($article_id and $author and $comment) {
                    postComment($article_id, $author, $comment);
                } else {
                    throw new Exception("Missing required information >:(");
                }
            } else {
                throw new Exception("Form not submitted >:(");
            }
            break;
        case "getCommentsAJAX":
            if (isset($_GET['article']) and isset($_GET['offset'])) {
                getCommentsAJAX($_GET['article'], $_GET['offset']);
            } else {
                echo "400: Missing required parameters.";
            }
            break;
        default:
            showArticles();
            break;
    }
} catch (Exception $e) {
    //this code will ONLY run if an exception occured
    echo "ERROR!!!<br>";
    echo $e->getMessage();
}
