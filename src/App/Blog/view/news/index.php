<?php $this->title = "Blog"; ?>
<h1>Last News</h1>
<?php foreach ($news as $aNews):?>
    <article>
        <header>
            <h1><a href="<?= "news/aNews/" . $aNews->getId() ?>"><?= $aNews->getTitle()?></a></h1>
            <time><?= date('d/m/Y \a\t H\hi', strtotime($aNews->getCreationDate())) ?></time>
        </header>
        <p><?= substr($aNews->getContent(),0,200) ?>...</p>
    </article>
    <hr />
<?php endforeach; ?>

<?php $nbPage = ceil($countNews/$newsPerPage)?>

<?php for($i=1;$i<=$nbPage;$i++)
        echo '<a href="news/index/0/'.$i. '">'.$i.' </a>'
    ?>