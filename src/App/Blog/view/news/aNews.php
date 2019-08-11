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
            <div class="flex">
                <form class="form-group flex" method="post" action="admin/updateNewsPage">
                    <input type="hidden" name="newsId" value="<?= $news->getId() ?>" />
                    <input type="hidden" name="title" value="<?= $news->getTitle() ?>" />
                    <input type="hidden" name="content" value="<?= $news->getContent() ?>" />
                    <input class="form-control yellow-submit" type="submit" value="Edit" />
                </form>
                <form class="form-group flex" method="post" action="admin/deleteNews">
                    <input type="hidden" name="newsId" value="<?= $news->getId() ?>" />
                    <input class="form-control blue-submit" type="submit" value="Delete" />
                </form>
            </div>
    <?php endif; ?>
</article>
<hr><hr>
<header>
    <h2>Answer to <?= $news->getTitle() ?></h2>
</header>
<?php foreach ($comments as $comment): ?>
    <p><h3><?= $comment->getPseudo()." :" ?></h3><?= $comment->getContent() ?></p>
    <p><?= date('d/m/Y \a\t H\hi', strtotime($comment->getCreationDate())) ?></p>
     <?php if($request->getSession()->existAttribut('id') && $request->getSession()->getAttribut('id') == $comment->getUserId() 
        || $request->getSession()->existAttribut('administrator') && $request->getSession()->getAttribut('administrator')) : ?>
        <form class="form-group" method="post" action="admin/deleteComment">
            <input type="hidden" name="newsId" value="<?= $comment->getNewsId() ?>" />
            <input type="hidden" name="commentId" value="<?= $comment->getId() ?>" />
            <input class="form-control red-submit" type="submit" value="Delete comment" />
        </form>
            <hr>
    <?php endif; ?>
<?php endforeach; ?>
<hr><br/>
<?php if($request->getSession()->existAttribut("id")) : ?>
    <form class="form-group" method="post" action="news/addComment">
        <input class="form-control" type="hidden" name="newsId" value="<?= $news->getId() ?>" />
        <textarea class="form-control" id="content" name="content" rows="4" placeholder="Your comment" required></textarea></br>
        <input class="form-control blue-submit" type="submit" value="Comment" />
    </form>
<?php endif; ?>