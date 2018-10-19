<?php $title = "Mon Blog - " . $aNews['title']; ?>

<article>
    <header>
        <h1><?= $aNews['title'] ?></h1>
        <time><?= $aNews['creationDate'] ?></time>
    </header>
    <p><?= $aNews['content'] ?></p>
</article>
<hr />
<header>
    <h1>Answer to <?= $aNews['title'] ?></h1>
</header>
<?php foreach ($comments as $comment): ?>
    <p><?= $comment['userId'] ?> dit :</p>
    <p><?= $comment['content'] ?></p>
<?php endforeach; ?>
<hr />
<?php if(isset($user)) : ?>
        
        <form method="post" action="news/addComment">
            <input type="hidden" name="newsId" value="<?= $news['id'] ?>" />
            <input type="hidden" name="userId" value="<?= $user['id'] ?>" />
            <textarea id="content" name="content" rows="4" 
                      placeholder="Your comment" required></textarea><br />
            <input type="submit" value="Comment" />
        </form>

<?php endif; ?>