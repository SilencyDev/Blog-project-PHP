<?php $this->title = "Validation"; ?>

<?php foreach ($comments as $comment):
    ?>
    <article>
        <header>
            <a href="<?= "news/aNews/" . $this->clear($comment['newsId']) ?>">
                <h1><?= $this->clear($comment['pseudo']) ?></h1>
            </a>
            <time><?= $this->clear($comment['creationDate']) ?></time>
        </header>
            <p><?= $this->clear($comment['content']) ?>...</p>
        <form method="post" action="Admin/validComment">
            <label> Validated? </label>
            <input type="checkbox" name="validated"/>
            <input type="hidden" name="commentId" value="<?= $comment['id'] ?>"/>
            <input type="submit" value="submit"/>
        </form>
    </article>
    <hr />
<?php endforeach; ?>