<?=
empty($_GET['article'])
  ? "<a class='card' href='index.php?action=viewFullArticle&article={$article['id']}'>"
  : "<div class='card'>"
?>

<div class="card__header">
  <img src="https://source.unsplash.com/600x400/?<?= htmlspecialchars($article['tag']); ?>" alt="card__image" class="card__image" width="600">
</div>
<div class="card__body">
  <span class="tag tag-blue"><?= htmlspecialchars($article['tag']); ?></span>
  <h4 class="title"><?= htmlspecialchars($article['title']); ?></h4>
  <p class="content"><?= nl2br(htmlspecialchars($article['content'])); ?></p>
</div>
<div class="card__footer">
  <div class="user">
    <img src="https://i.pravatar.cc/40?img=<?= rand(1, 20) ?>" alt="user__image" class="user__image">
    <div class="user__info">
      <h5><?= htmlspecialchars($article['author']); ?></h5>
      <small><?= $article['date_created']; ?></small>
    </div>
    <em class="comments-link">Comments</em>
  </div>
</div>

<?=
empty($_GET['article'])
  ? "</a>"
  : "</div>"
?>