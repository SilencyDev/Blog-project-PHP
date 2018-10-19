<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $webRoot ?>" >
 
        <title><?= $title ?></title>
    </head>
    <body>
        <div id="global"> <!-- #global -->
            <header>
                <a href="home/index">Accueil</a>
                <a href="News/index">Liste des articles</a>
                <a href="Connect/index">Se connecter</a>
                <a href="SignIn/index">S'enregistrer</a>
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <div id="error"> <!-- #error -->
                <?php if(isset( $_SESSION['error']) && $_SESSION['error'] != "") :
                  echo  $_SESSION['error'];
                  $_SESSION['error']="";
                   endif; ?> <!-- #error -->
            </div>
            <div id="content"> <!-- #content -->
                <br/>
                <?= $content ?>
                <br/>
            </div> <!-- #content -->
            <footer id="footer">
            <a href="Admin/index">Administration</a></div>
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>