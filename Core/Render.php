<?php

namespace app\Core;

class Render
{
    public function view($path,$args = [])

    {
        $path = str_replace('.','/',$path);
        $layout = $this->renderLayout($args);
        $content = $this->renderView($path,$args);
        $test = str_replace("{{content}}",$content,$layout);
        echo $test;
    }

    public function _404()
    {
        include basePath("views/_404.php");

    }


    public function renderLayout($args)
    {
        ob_start();
        extract($args);
        include basePath('views/layout/main.php');
        return ob_get_clean();
    }

    public function renderView($page,$args)
    {
        ob_start();
        extract($args);
        // index
        // Auth/login
        include basePath("views/{$page}.php");
        return ob_get_clean();
    }
}