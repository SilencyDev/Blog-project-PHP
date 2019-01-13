<?php $this->title = "Home"; ?>
<h1>Kévin Macquet</h1>
<h3>Coding . Fitness . Food . Learning . Live .</h3>
<h3><a id="content" href="https://drive.google.com/file/d/1uNg6WBrgOqoohLT-J6qOPue5jdHVHZij/view?usp=sharing"> CV Link </a></h3>
<h2>Contact me</h2>
<form method="post" action="home/sendMail" class="form-group">
    <input class="form-control" name="firstName" placeholder="First Name" required><br />
    <input class="form-control" name="lastName" placeholder="Last Name" required><br />
    <input class="form-control" name="email" placeholder="email" type="email" required><br />
    <textarea class="form-control" type ="content" id="content" name="content" placeholder="content" required></textarea><br />
    <input class="form-control blue-submit" type="submit" value="Submit"/>
</form>