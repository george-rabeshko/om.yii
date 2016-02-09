<?php foreach($comments as $comment):?>
<section>
    <p class="mini-headline"><?= $comment->author ?></p>
    <p class="comment-date">(<?= $comment->created ?>)</p>
    <p><?= $comment->content ?></p>
    <hr>
</section>
<?php endforeach; ?>