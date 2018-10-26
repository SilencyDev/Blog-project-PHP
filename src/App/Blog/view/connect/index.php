<?php if(!$request->getSession()->existAttribut("id")) : ?>
        
        <form method="post" action="Connect/connect">
            <input id="login" name="login" placeholder="Your login" required><br />
            <input type ="password" id="password" name="password" placeholder="Your password" required><br />
            <input type="submit" value="Sign up" />
        </form>

<?php endif; ?>

<?php if($request->getSession()->existAttribut("id")) : ?>

<?php echo $request->getSession()->getAttribut('pseudo') ?> you are already connected!

<?php endif; ?>