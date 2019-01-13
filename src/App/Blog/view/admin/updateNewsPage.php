<?php $this->title = "Edit - " . $request->getParams("title"); ?>


    <?php if($request->getSession()->existAttribut('administrator') && $request->getSession()->getAttribut('administrator')) : ?>
        <form method="post" action="admin/updateNews" class="form-group" >
            <input class="form-control" type="hidden" name="newsId" value="<?= $request->getParams("newsId") ?>" />
            <input class="form-control" name="title" value="<?= $request->getParams("title") ?>" /><br/>
            <textarea class="form-control" name="content"><?= $request->getParams("content") ?></textarea><br/>
            <input class="form-control blue-submit" type="submit" value="Edit" />
        </form>
    <?php endif; ?>