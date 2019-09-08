<?php foreach ($aNews as $news):  endforeach; $this->title = "News - " .htmlspecialchars($news->getTitle()); ?>
    <article>
        <header>
            <h1><?= htmlspecialchars($news->getTitle()) ?></h1>
            <strong><time> Created <?= htmlspecialchars($news->getCreationDate()->format('d/m/Y \a\t H\hi')) ?></time></strong>
            <?php if (!$news->getUpdateDate() === null) : ?>
            <strong><Br/><time> Updated <?= htmlspecialchars($news->getUpdateDate()->format('d/m/Y \a\t H\hi')) ?></time></strong>
            <?php endif; ?>
        </header>
        <p><?= htmlspecialchars($news->getContent()) ?></p>
            <?php if ($request->getSession()->existAttribut('administrator') && $request->getSession()->getAttribut('administrator')) : ?>
                    <div class="flexboxC">
                        <form class="form-group flex" method="post" action="admin/updateNewsPage">
                            <input type="hidden" name="newsId" value="<?= htmlspecialchars($news->getId()) ?>" />
                            <input type="hidden" name="title" value="<?= htmlspecialchars($news->getTitle()) ?>" />
                            <input type="hidden" name="content" value="<?= htmlspecialchars($news->getContent()) ?>" />
                            <input class="form-control yellow-submit" type="submit" value="Edit" />
                        </form>
                        <form class="form-group flex" method="post" action="admin/deleteNews">
                            <input type="hidden" name="newsId" value="<?= htmlspecialchars($news->getId()) ?>" />
                            <input class="form-control red-submit" type="submit" value="Delete" />
                        </form>
                    </div>
        <?php endif; ?>
    </article>

<Br/><Br/>

<header>
    <h2>Answer to <?= htmlspecialchars($news->getTitle()) ?></h2>
</header>
<div class="flexboxCL">
    <?php foreach ($comments as $comment): ?>
        <p class="user"><?= htmlspecialchars($comment->getPseudo())." :" ?></p>
        <p><?= htmlspecialchars($comment->getContent()) ?></p>
        <time><?= htmlspecialchars($comment->getCreationDate()->format('d/m/Y \a\t H\hi')) ?></time>
        <?php if ($request->getSession()->existAttribut('id') && $request->getSession()->getAttribut('id') == htmlspecialchars($comment->getUserId())
            || $request->getSession()->existAttribut('administrator') && $request->getSession()->getAttribut('administrator')) : ?>
            <form class="form-group" method="post" action="admin/deleteComment">
                    <input type="hidden" name="newsId" value="<?= htmlspecialchars($comment->getNewsId()) ?>" />
                    <input type="hidden" name="commentId" value="<?= htmlspecialchars($comment->getId()) ?>" />
                <input class="form-control red-submit" type="submit" value="Delete comment" />
            </form>
        <?php endif; ?>
    <?php endforeach; ?>
<Br/><br/>
<?php if ($request->getSession()->existAttribut("id")) : ?>
    <form class="form-group" method="post" action="news/addComment">
        <input class="form-control" type="hidden" name="newsId" value="<?= htmlspecialchars($news->getId()) ?>" />
        <textarea class="form-control" id="content" name="content" rows="4" placeholder="Your comment" required></textarea></br>
        <input class="form-control blue-submit" type="submit" value="Comment" />
    </form>
<?php endif; ?>
</div>