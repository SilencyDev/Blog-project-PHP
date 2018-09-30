<?php

namespace API\Lib\Blog\View;

class View {

    // File name associated to the view
    private $file;
    // File's title
    private $title;

    public function __contruct($action) {
        // determine the name with the controller/action's name
        $file = "view/";
        if ($controller !="") {
            $file = $file . $controller . "/";
        }
        $this->file = $file . $action . ".php";
    }

    // Create and display the view
    public function create($data) {
        // Create view part
        $content = $this->createFile($this->file, $data);
        // Web path for web server
        // For URI controller/action/id
        $webRoot = Configuration::get("webRoot", "/");
        // Using template
        $view = $this->createFile(realpath(__DIR__ . "..\..\..\..\src\App\Blog\View\Template.php"),
            array('title' => $this->title, 'content' => $content, 'webRoot' => $webRoot));
        // Return view to browser
        echo $view;
    }

    // Create a view's file and return it
    public function createfile($file, $data) {
        if (file_exists($file)) {
            // Turn array's $data usable for the view
            extract($data);
            // Create a temp
            ob_start();
            // Include view's file
            // The result in put into temp output
            require $file;
            // Stop the temp and return it
            return ob_get_clean();
        }
        else {
            throw new Exception("'$file' file is not found");
        }
    }

    public function clear($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }
}