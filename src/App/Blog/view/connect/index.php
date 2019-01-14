<?php $this->title = "Log In";?>
<h1>Log in</h1>
<?php if(!$request->getSession()->existAttribut("id")) : ?>
        
        <form method="post" action="Connect/connect" class="form-group">
            <input class="form-control" id="login" name="login" placeholder="Your login (e-mail)" required><br />
            <input class="form-control" type ="password" id="password" name="password" placeholder="Your password" required><br />
            <input class="form-control blue-submit" type="submit" value="Sign up" />
        </form>

<?php endif; ?>

<?php if($request->getSession()->existAttribut("id")) : ?>

<?php echo $request->getSession()->getAttribut('pseudo') ?> you are already connected!

<?php endif; ?>