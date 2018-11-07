<?php $this->title = "Blog"; ?>

<?php foreach ($news as $aNews):
    ?>
    <article>
        <header>
            <a href="<?= "news/aNews/" . $aNews['id'] ?>">
                <h1><?= $aNews['title'] ?></h1>
            </a>
            <time><?= date('d/m/Y H:i:s', strtotime($aNews['creationDate'])) ?></time>
        </header>
        <p><?= substr($aNews['content'],0,200) ?>...</p>
    </article>
    <hr />
<?php endforeach; ?>