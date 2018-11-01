<?php $this->title = "News - " . $aNews['title']; ?>

<article>
    <header>
        <h1><?= $aNews['title'] ?></h1>
        <time> Created <?= date('d/m/Y H:i:s', strtotime($aNews['creationDate'])) ?></time>     <time> Updated <?= date('d/m/Y H:i:s', strtotime($aNews['updateDate'])) ?></time>
    </header>
    <p><?= $aNews['content'] ?></p>
        <?php if($request->getSession()->existAttribut('administrator') && $request->getSession()->getAttribut('administrator')) : ?>
            <form method="post" action="admin/updateNewsPage">
                <input type="hidden" name="newsId" value="<?= $aNews['id'] ?>" />
                <input type="hidden" name="title" value="<?= $aNews['title'] ?>" />
                <input type="hidden" name="content" value="<?= $aNews['content'] ?>" />
                <input type="submit" value="Edit" />
            </form>
            <form method="post" action="admin/deleteNews">
                <input type="hidden" name="newsId" value="<?= $aNews['id'] ?>" />
                <input type="submit" value="Delete" />
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