<?php $this->title = "Home"; ?>
<h1>Kévin Macquet</h1>
<h3>Coding . Fitness . Food . Learning . Live .</h3></br>
<?php foreach ($cv as $acv): ?>
    <div class="cv">
        <a href="<?= $acv->getLink()?>"><img src="<?= $acv->getUrl()?>" alt="CV" height="auto" width="100%"></a>
    </div>
<?php endforeach;?>
<h2>Social links</h2>
<?php foreach ($icons as $icon): ?>
    <a href='<?= $icon->getLink() ?>'><img src="<?= $icon->getUrl() ?>" alt="Icons" height="50" width="50"></a>
<?php endforeach;?>
<h2>Contact me</h2>
<form method="post" action="home/sendMail" class="form-group">
    <input class="form-control" name="firstName" placeholder="First Name" required><br />
    <input class="form-control" name="lastName" placeholder="Last Name" required><br />
    <input class="form-control" name="email" placeholder="email" type="email" required><br />
    <textarea class="form-control" type ="content" id="content" name="content" placeholder="content" required></textarea><br />
    <input class="form-control blue-submit" type="submit" value="Submit"/>
</form>