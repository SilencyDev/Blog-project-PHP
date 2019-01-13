<?php foreach($aNews as $news):  endforeach; $this->title = "News - " .$news->getTitle(); ?>
<article>
    <header>
        <h1><?= $news->getTitle() ?></h1>
        <time> Created <?= date('d/m/Y \a\t H\hi', strtotime($news->getCreationDate())) ?></time>
        <?php if(!$news->getUpdateDate() === false) : ?>
            <Br/><time> Updated <?= date('d/m/Y \a\t H\hi', strtotime($news->getUpdateDate())) ?></time>
        <?php endif; ?>
    </header>
    <p><?= $news->getContent() ?></p>
        <?php if($request->getSession()->existAttribut('administrator') && $request->getSession()->getAttribut('administrator')) : ?>
            <form method="post" action="admin/updateNewsPage">
                <input type="hidden" name="newsId" value="<?= $news->getId() ?>" />
                <input type="hidden" name="title" value="<?= $news->getTitle() ?>" />
                <input type="hidden" name="content" value="<?= $news->getContent() ?>" />
                <input type="submit" value="Edit" />
            </form>
            <form method="post" action="admin/deleteNews">
                <input type="hidden" name="newsId" value="<?= $news->getId() ?>" />
                <input type="submit" value="Delete" />
            </form>
    <?php endif; ?>
</article>
<hr />
<header>
    <h1>Answer to <?= $news->getTitle() ?></h1>
</header>
<?php foreach ($comments as $comment): ?>
    <p><h3><?= $comment->getPseudo()." :" ?></h3><?= $comment->getContent() ?></p>
    <p><?= date('d/m/Y \a\t H\hi', strtotime($comment->getCreationDate())) ?></p>
    <?php if($request->getSession()->existAttribut('id') && $request->getSession()->getAttribut('id') == $comment->getUserId() 
        || $request->getSession()->existAttribut('administrator') && $request->getSession()->getAttribut('administrator')) : ?>
        <form method="post" action="admin/deleteComment">
            <input type="hidden" name="newsId" value="<?= $comment->getNewsId() ?>" />
            <input type="hidden" name="commentId" value="<?= $comment->getId() ?>" />
            <input type="submit" value="Delete comment" />
        </form>
    <?php endif; ?>
<?php endforeach; ?>
<hr />

<?php if($request->getSession()->existAttribut("id")) : ?>
        <form class="form-signin" method="post" action="news/addComment">
            <input type="hidden" name="newsId" value="<?= $news->getId() ?>" />
            <textarea id="content" name="content" rows="4" placeholder="Your comment" required></textarea>
            <input type="submit" value="Comment" />
        </form>
<?php endif; ?>