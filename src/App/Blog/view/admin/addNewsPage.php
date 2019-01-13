<?php $this->title = "Add a News"?>
<h1>Add a news</h1>
<form method="post" action="Admin/addNews">
    <input id="title" name="title" placeholder="title" required><br />
    <textarea type ="content" id="content" name="content" placeholder="content" required></textarea><br />
    <input type="submit" value="Submit"/>
</form>