<?php $this->title = "Edit - " . $request->getParams("title"); ?>


    <?php if($request->getSession()->existAttribut('administrator') && $request->getSession()->getAttribut('administrator')) : ?>
        <form method="post" action="admin/updateNews">
            <input type="hidden" name="newsId" value="<?= $request->getParams("newsId") ?>" />
            <input name="title" value="<?= $request->getParams("title") ?>" /><br/>
            <textarea name="content"><?= $request->getParams("content") ?></textarea><br/>
            <input type="submit" value="Edit" />
        </form>
    <?php endif; ?>