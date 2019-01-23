<?php $this->title = "Home"; ?>
<h1>Kévin Macquet</h1>
<h3>Coding . Fitness . Food . Learning . Live .</h3></br>
    <div class="cv">
        <a href="https://drive.google.com/file/d/1uNg6WBrgOqoohLT-J6qOPue5jdHVHZij/view?usp=sharing"><img src="https://i.imgur.com/yfTPMoW.png" alt="CV" height="auto" width="100%"></a>
    </div>
<h2>Social links</h2>
    <a href='https://github.com/SilencyDev'><img src="https://i.imgur.com/DvLbTD4.png" alt="GitHub" height="50" width="50"></a>
    <a href='https://www.linkedin.com/in/k%C3%A9vin-macquet-040100137/'><img src="https://i.imgur.com/yFndx3n.png" alt="LinkedIn" height="50" width="50"></a>
<h2>Contact me</h2>
<form method="post" action="home/sendMail" class="form-group">
    <input class="form-control" name="firstName" placeholder="First Name" required><br />
    <input class="form-control" name="lastName" placeholder="Last Name" required><br />
    <input class="form-control" name="email" placeholder="email" type="email" required><br />
    <textarea class="form-control" type ="content" id="content" name="content" placeholder="content" required></textarea><br />
    <input class="form-control blue-submit" type="submit" value="Submit"/>
</form>