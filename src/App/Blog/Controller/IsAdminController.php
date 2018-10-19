<?php

namespace API\App\Blog\Controller;

use API\Lib\Blog\Controller\Controller;

abstract class IsAdminController extends Controller {

    public function executeAction($action) {
        if($this->request->getSession()->existAttribut("id")) {
            if($this->request->getSession()->getAttribut("administrator")) {
                parent::executeAction($action);
            } else {
                throw new \Exception("You doesn't have the privilege for this action");
            }
        }
        else {
            throw new \Exception("You must be connected to perform this action");
        }
    }
}