<div class='comment'>
    <p>
        <strong><?= htmlspecialchars($comment['author']); ?></strong>
        The <?= $comment['date_created']; ?>
    </p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
</div>