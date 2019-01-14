<?php $this->title = "Sign up" ?>
<h1>Sign up</h1>
<form method="post" action="signUp/addUser" class="form-group">
    <input class="form-control" name="pseudo" placeholder="Pseudo" required><br />
    <input class="form-control" name="password" placeholder="Password" type="password" required><br />
    <input class="form-control" name="password2" placeholder="Verify password" type="password" required><br />
    <input class="form-control" name="email" placeholder="email" type="email" required><br />
    <input class="form-control" name="firstName" placeholder="First Name" required><br />
    <input class="form-control" name="lastName" placeholder="Last Name" required><br />
    <input class="form-control" name="dateOfBirth" placeholder="Date Of Birth" type="date" required><br />
    <input class="form-control blue-submit" type="submit" value="Submit"/>
</form>