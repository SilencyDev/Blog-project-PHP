<?php $this->title = "Validation"; ?>
<h1>Valid a comment</h1>
<div class="flexboxCL">
<?php foreach ($comments as $comment):
    ?>
    <article>
        <header>
            <h1><a href="<?= "news/aNews/" . $comment->getNewsId() ?>"><?= $comment->getPseudo()?></a></h1>
            <time><?= date('d/m/Y \a\t H\hi', strtotime($comment->getCreationDate())) ?></time>
        </header>
            <p><?= $comment->getContent() ?></p>
            <div class="flexboxCL">
            <form method="post" action="Admin/validComment" class="form-group flex">
                <input class="form-control" type="hidden" name="validated" value="1"/>
                <input class="form-control" type="hidden" name="commentId" value="<?= $comment->getId() ?>"/>
                <input class="form-control blue-submit" type="submit" value="Valid comment"/>
            </form>
            <form method="post" action="admin/deleteCommentToValid" class="form-group flex">
                <input type="hidden" name="newsId" value="<?= $comment->getNewsId() ?>" />
                <input type="hidden" name="commentId" value="<?= $comment->getId() ?>" />
                <input class="form-control red-submit" type="submit" value="Delete comment" />
            </form>
            </div> 
    </article>
    <hr />
<?php endforeach; ?>
</div>