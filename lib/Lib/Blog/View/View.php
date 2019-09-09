<?php

namespace API\Lib\Blog\View;

use API\Lib\Blog\Config\Configuration;

class View
{
    private $viewFile;
    private $title;

    public function __construct($action, $controller ="")
    {
        $viewFile = realpath(__DIR__."/../../../../src/App/Blog/view/");
        if ($controller !="") {
            $viewFile .= "/" . $controller . "/";
        }
        $this->viewFile = $viewFile . $action . ".php";
    }

    public function create($data, $request = null)
    {
        $content = $this->createFile($this->viewFile, $data, $request);
        $webRoot = Configuration::get("webRoot", "/");
        $view = $this->createFile(
            realpath(__DIR__."/../../../../src/App/Blog/view/templates/template.php"),
            array('title' => $this->title, 'content' => $content, 'webRoot' => $webRoot),
            $request
        );
        echo $view;
    }

    public function createfile($viewFile, $data, $request = null)
    {
        if (file_exists($viewFile)) {
            extract($data);
            ob_start();
            require $viewFile;
            return ob_get_clean();
        }
        throw new \Exception("'$viewFile' file is not found");
    }
}
