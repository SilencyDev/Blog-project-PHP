<?php $this->title = "Blog"; ?>
<div class="flexbox">
    <h1>Last News</h1>
</div><br/>
<div>
    <?php foreach ($news as $aNews):?>
        <article>
            <header>
                <h1><a href="<?= "news/aNews/" . $aNews->getId() ?>"><?= $aNews->getTitle()?></a></h1>
                <time><?= date('d/m/Y \a\t H\hi', strtotime($aNews->getCreationDate())) ?></time>
            </header>
            <p><?= substr($aNews->getContent(),0,200) ?>...</p>
        </article>
        <br/>
    <?php endforeach; ?>
    </div>
    <br/>
<div class="flexbox">
    <?php for($i=1;$i<=$nbPage;$i++)
        echo '<strong><a class="pagination" href="news/index/0/'.$i. '">'.$i.' </a></strong>'
    ?>
</div>