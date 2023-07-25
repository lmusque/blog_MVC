<?php
$page_id = "articlePage";
$title = $article ? strip_tags($article['title']) : "Full Article";
ob_start();
?>

<div id="back">
    <a href="index.php">Go back</a>
</div>
<div class="container">
    <?php
    if ($article) {
        include('./view/component/articleCard.php');

    ?>
</div>
<div id="comments">
    <h2>Comments</h2>
    <div id="addCommentContainer">
        <form id="addComment" action="index.php?action=postComment" method="POST">
            <input type="hidden" name="article" id="article" value="<?php echo $_GET['article']; ?>">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="comment" id="comment" placeholder="Type your comment">
            <button type="submit">Send</button>
        </form>
    </div>
    <div id="listComments">
        <?php
        if ($numComments > 0) {
            foreach ($comments as $comment) {
                include('./view/component/commentCard.php');
            }
        } else {
            echo "No comments yet :)";
        }
        ?>

    </div>
</div>
<div id="pages">
    <?php
        for ($offset = 0, $displayNum = 1; $offset < $numComments; $offset += 5, $displayNum++) {
    ?>
        <div class='page <?= $displayNum === 1 ? "selected" : "" ?>' onclick="getComments(<?= $offset . ',' . $_GET['article'] ?>, this)">
            <?= $displayNum ?>
        </div>
    <?php
        }
    ?>
</div>
<script src="./public/js/pagination.js"></script>
<?php
    } else {
        echo "<h1>404: Article does not exist</h1>";
    }

    $content = ob_get_clean();
    require "template.php";
?>