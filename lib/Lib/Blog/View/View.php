<?php

namespace API\Lib\Blog\View;

use API\Lib\Blog\Config\Configuration;

class View {

    // File name associated to the view
    private $viewFile;
    // File's title
    private $title;

    public function __construct($action, $controller ="") {
        // determine the name with the controller/action's name
        $viewFile = realpath(__DIR__."/../../../../src/App/Blog/view/");
        if ($controller !="") {
            $viewFile .= "/" . $controller . "/";
        }
        $this->viewFile = $viewFile . $action . ".php";
    }

    // Create and display the view
    public function create($data) {
        // Create view part
        $content = $this->createFile($this->viewFile, $data);
        // Web path for web server
        // For URI controller/action/id
        $webRoot = Configuration::get("webRoot", "/");
        // Using template
        $view = $this->createFile(realpath(__DIR__."/../../../../src/App/Blog/view/templates/template.php"),
            array('title' => $this->title, 'content' => $content, 'webRoot' => $webRoot));
        // Return view to browser
        echo $view;
    }

    // Create a view's file and return it
    public function createfile($viewFile, $data) {
        if (file_exists($viewFile)) {
            // Turn array's $data usable for the view
            extract($data);
            // Create a temp
            ob_start();
            // Include view's file
            // The result in put into temp output
            require $viewFile;
            // Stop the temp and return it
            return ob_get_clean();
        }
        else {
            throw new \Exception("'$viewFile' file is not found");
        }
    }

    public function clear($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }
}