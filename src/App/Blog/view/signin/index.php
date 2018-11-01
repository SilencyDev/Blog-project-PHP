<?php ?>

<form method="post" action="signin/addUser">
    <input name="pseudo" placeholder="Pseudo" required><br />
    <input name="password" placeholder="Password" type="password" required><br />
    <input name="password2" placeholder="Verify password" type="password" required><br />
    <input name="email" placeholder="email" type="email" required><br />
    <input name="firstName" placeholder="First Name" required><br />
    <input name="lastName" placeholder="Last Name" required><br />
    <input name="dateOfBirth" placeholder="Date Of Birth" type="date" required><br />
    <input type="submit" value="Submit"/>
</form>