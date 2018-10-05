<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $webRoot ?>" >
 
        <title><?= $title ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="home/index"><h1>Mon Blog</h1></a>
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <div id="content">
                <?= $content ?>
            </div> <!-- #contenu -->
            <footer id="footer">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>