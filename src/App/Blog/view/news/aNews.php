<?php $this->title = "My Blog - " . $aNews['title']; ?>

<article>
    <header>
        <h1><?= $aNews['title'] ?></h1>
        <time><?= $aNews['creationDate'] ?></time>
    </header>
    <p><?= $aNews['content'] ?></p>
        <?php if($request->getSession()->existAttribut('administrator') && $request->getSession()->getAttribut('administrator')) : ?>
            <form method="post" action="admin/deleteNews">
                <input type="hidden" name="newsId" value="<?= $aNews['id'] ?>" />
                <input type="submit" value="Delete news" />
            </form>
    <?php endif; ?>
</article>
<hr />
<header>
    <h1>Answer to <?= $aNews['title'] ?></h1>
</header>
<?php foreach ($comments as $comment): ?>
    <p><?= $comment['pseudo'] ?> comment :</p>
    <p><?= $comment['content'] ?></p>
    <?php if($request->getSession()->existAttribut('id') && $request->getSession()->getAttribut('id') == $comment['userId']) : ?>
        <form method="post" action="admin/deleteComment">
            <input type="hidden" name="newsId" value="<?= $aNews['id'] ?>" />
            <input type="hidden" name="commentId" value="<?= $comment['id'] ?>" />
            <input type="submit" value="Delete comment" />
        </form>
    <?php endif; ?>
<?php endforeach; ?>
<hr />

<?php if($request->getSession()->existAttribut("id")) : ?>
        
        <form method="post" action="news/addComment">
            <input type="hidden" name="newsId" value="<?= $aNews['id'] ?>" />
            <textarea id="content" name="content" rows="4" 
                      placeholder="Your comment" required></textarea><br />
            <input type="submit" value="Comment" />
        </form>
<?php endif; ?>