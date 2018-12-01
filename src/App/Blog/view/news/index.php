<?php $this->title = "Blog"; ?>

<?php foreach ($news as $aNews):?>
    <article>
        <header>
            <a href="<?= "news/aNews/" . $aNews->getId() ?>">
                <h1><?= $aNews->getTitle()  ?></h1>
            </a>
            <time><?= date('d/m/Y \a\t H\hi', strtotime($aNews->getCreationDate())) ?></time>
        </header>
        <p><?= substr($aNews->getContent(),0,200) ?>...</p>
    </article>
    <hr />
<?php endforeach; ?>