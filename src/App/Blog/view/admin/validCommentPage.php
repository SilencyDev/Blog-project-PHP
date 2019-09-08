<?php $this->title = "Validation"; ?>
<h1>Valid a comment</h1>
<div class="flexboxCL">
<?php foreach ($comments as $comment):
    ?>
    <article>
        <header>
            <h1><a href="<?= "news/aNews/" . htmlspecialchars($comment->getNewsId()) ?>"><?= htmlspecialchars($comment->getPseudo()) ?></a></h1>
            <time><?= $comment->getCreationDate()->format('d/m/Y \a\t H\hi') ?></time>
        </header>
            <p><?= htmlspecialchars($comment->getContent()) ?></p>
            <div class="flexboxCL">
            <form method="post" action="Admin/validComment" class="form-group flex">
                <input class="form-control" type="hidden" name="validated" value="1"/>
                <input class="form-control" type="hidden" name="commentId" value="<?= htmlspecialchars($comment->getId()) ?>"/>
                <input class="form-control blue-submit" type="submit" value="Valid comment"/>
            </form>
            <form method="post" action="admin/deleteCommentToValid" class="form-group flex">
                <input type="hidden" name="newsId" value="<?= htmlspecialchars($comment->getNewsId()) ?>" />
                <input type="hidden" name="commentId" value="<?= htmlspecialchars($comment->getId()) ?>" />
                <input class="form-control red-submit" type="submit" value="Delete comment" />
            </form>
            </div> 
    </article>
    <hr />
<?php endforeach; ?>
</div>