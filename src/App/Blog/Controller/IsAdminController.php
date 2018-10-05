<?php

namespace API\App\Blog\Controller;

use API\Lib\Blog\Controller\Controller;

abstract class IsAdminController extends Controller {

    public function executeAction($action) {
        if($this->request->getSession()->existAttribut("userId") && $this->user->getAdministrator()) {
            parent::executeAction($action);
        }
        else {
            throw new \Exception("You doesn't have the priviledge for this action");
        }
    }
}