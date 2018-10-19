<?php if(!isset($user)) : ?>
        
        <form method="post" action="Connect/connect">
            <input id="login" name="login" placeholder="Your login" required><br />
            <input type ="password" id="password" name="password" placeholder="Your password" required><br />
            <input type="submit" value="Sign up" />
        </form>

<?php endif; ?>