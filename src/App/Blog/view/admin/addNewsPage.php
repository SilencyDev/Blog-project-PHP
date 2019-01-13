<?php $this->title = "Add a News"?>
<h1>Add a news</h1>
<form method="post" action="Admin/addNews" class="form-group">
    <input class="form-control" id="title" name="title" placeholder="title" required><br />
    <textarea class="form-control" type ="content" id="content" name="content" placeholder="content" required></textarea><br />
    <input class="form-control blue-submit" type="submit" value="Submit"/>
</form>