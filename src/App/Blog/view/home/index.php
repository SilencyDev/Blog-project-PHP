<?php $this->title = "Home"; ?>

Kévin Macquet<Br/> 
catchphrase<Br/><Br/>
<a href = "https://drive.google.com/open?id=1emBqUk73JutgtGrhRabsTrUcHfoJ6PQK"> Lien CV </a><Br/><Br/>
Contact me
<form method="post" action="home/sendMail">
    <input name="firstName" placeholder="First Name" required><br />
    <input name="lastName" placeholder="Last Name" required><br />
    <input name="email" placeholder="email" type="email" required><br />
    <textarea type ="content" id="content" name="content" placeholder="content" required></textarea><br />
    <input type="submit" value="Submit"/>
</form>