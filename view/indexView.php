<?php
$page_id = "index";
$title = "My Blog";
ob_start();
//runs code until we tell it to stop, 
//then take that code and save it as a variable
?>

<div class="container">
    <?php
    foreach ($articles as $article) {
        include('./view/component/articleCard.php');
    }

    ?>
</div>

<?php
$content = ob_get_clean();
require "template.php";
?>