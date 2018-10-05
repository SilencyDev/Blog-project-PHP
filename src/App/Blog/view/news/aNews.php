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
    <h1>Réponses à <?= $aNews['title'] ?></h1>
</header>
<?php foreach ($comments as $comment): ?>
    <p><?= $comment['userId'] ?> dit :</p>
    <p><?= $comment['content'] ?></p>
<?php endforeach; ?>