<?php $this->title = "Blog"; ?>
<div class="flexbox">
    <h1>Last News</h1>
</div><br/>
<div>
    <?php foreach ($news as $aNews):?>
        <article>
            <header>
                <h1><a href="<?= "news/aNews/" . htmlspecialchars($aNews->getId()) ?>"><?= htmlspecialchars($aNews->getTitle())?></a></h1>
                <time><?= htmlspecialchars($aNews->getCreationDate()->format('d/m/Y \a\t H\hi')) ?></time>
            </header>
            <p><?= htmlspecialchars(substr($aNews->getContent(), 0, 200)) ?>...</p>
        </article>
        <br/>
    <?php endforeach; ?>
    </div>
    <br/>
<div class="flexbox">
    <?php for ($i=1;$i<=$nbPage;$i++) {
    echo '<strong><a class="pagination" href="news/index/0/'.htmlspecialchars($i). '">'.htmlspecialchars($i).' </a></strong>';
    }
    ?>
</div>