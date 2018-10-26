<?php $this->title = "Mon Blog"; ?>

<?php foreach ($news as $aNews):
    ?>
    <article>
        <header>
            <a href="<?= "news/aNews/" . $this->clear($aNews['id']) ?>">
                <h1><?= $this->clear($aNews['title']) ?></h1>
            </a>
            <time><?= $this->clear($aNews['creationDate']) ?></time>
        </header>
        <p><?= $this->clear(substr($aNews['content'],0,200)) ?>...</p>
    </article>
    <hr />
<?php endforeach; ?>