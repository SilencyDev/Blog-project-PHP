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
                <a href="home/index">Home</a>
                <a href="News/index">News</a>
                <a href="Connect/index">Log in</a>
                <a href="SignIn/index">Sign up</a>
                <p>Welcome to my personal blog.</p>
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
            </div><br/> <!-- #content -->
            <footer id="footer">
            <a href="Admin/index">Administration</a></div>
            <?php if ($request->getSession()->existAttribut("id")) : ?>
            <a href = connect/disconnect> Disconnect </a><br/>
                <?php endif; ?>
                Blog made with PHP, HTML5 and CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>