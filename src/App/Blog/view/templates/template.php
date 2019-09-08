<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $webRoot ?>" >
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="<?= $webRoot ?>web/css/style21.css" type="text/css">
        <title><?= $title ?></title>
    </head>
    <body>
        <div id="global"> <!-- #global -->
            <header>
                <nav role="navigation">
                    <div id="menuToggle">
                        <input type="checkbox" />
                            <span></span>
                            <span></span>
                            <span></span>
                        <ul id="menu">
                <a href="home/index">
                    <li>Home</li>
                </a>
                <a href="News/index">
                    <li>News</li>
                </a>
                <?php if (!$request->getSession()->existAttribut("id")) : ?>
                <a href="Connect/index">
                        <li>Log in</li>
                    </a>
                    <a href="SignUp/index">
                        <li>Sign up</li>
                    </a>
                <?php endif; ?>
                <?php if ($request->getSession()->existAttribut("administrator") && $request->getSession()->getAttribut("administrator")) : ?>
                    <a href="Admin/addNewsPage">
                        <li>Add a news</li>
                    </a>
                    <a href="Admin/validCommentPage">
                        <li>Validation</li>
                    </a>
                <?php endif; ?>
                <?php if ($request->getSession()->existAttribut("id")) : ?>
                    <a href="connect/disconnect">
                        <li>Disconnect</li>
                    </a>
                <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </header>
            <br/><br/><br/><br/>
            <div id="error"> <!-- #error -->
                <?php if (isset($_SESSION['error']) && $_SESSION['error'] != "") :
                  echo $_SESSION['error'];
                  $_SESSION['error']="";
                   endif; ?> <!-- #error -->
            </div>
            <div id="content"> <!-- #content -->
                <?= $content ?>
            </div><br/> <!-- #content -->
            <footer id="foot">
            </footer>
        </div> <!-- #global -->
    </body>
</html>