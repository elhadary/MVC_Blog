<?php

namespace app\Core;

use app\Models\User;

class Render
{
    public $content = '';
    public $danger = '<div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Danger</span>
                        <div>
                            <span class="font-medium">Please check these errors:</span>
                            <ul class="mt-1.5 ml-4 list-disc list-inside">
                                {{li}}
                            </ul>
                        </div>
                       </div>';
    public $success = '<div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400" role="alert">
                          <span class="sr-only">Success</span>
                          <div>
                                {{li}}
                          </div>
                        </div>';

    public function view($path,$args = [])

    {
        $path = str_replace('.','/',$path);
        $layout = $this->renderLayout($args);
        $content = $this->renderView($path,$args);
        $this->content = str_replace("{{content}}",$content,$layout);

        if (isset($args['errors'])) {
            $alerts = $args['errors'];
            $this->renderAlert($this->content,$alerts,$this->danger);

        }
        elseif (isset($args['success'])) {
            $alerts = $args['success'];
            $this->renderAlert($this->content,$alerts,$this->success);
        }
        else {
            $this->content = str_replace("{{alert}}",'',$this->content);
        }

        echo $this->content;
    }

    public function _404()
    {
        include basePath("views/_404.php");
    }


    public function renderLayout($args)
    {
        ob_start();
        extract($args);

        if (isset($_SESSION['email'])) {
            if ((new User)->Auth()['rank'] == 1) include basePath('views/layout/admin.php');
            else include basePath('views/layout/main.php');
        }
        else include basePath('views/layout/main.php');

        return ob_get_clean();
    }

    public function renderView($page,$args)
    {
        ob_start();
        extract($args);

        include basePath("views/{$page}.php");

        return ob_get_clean();
    }

    public function renderAlert($content,$alerts,$html)
    {
        $li = '';

        foreach ($alerts as $alert) {
            $li .= "<li>$alert</li>";
        }

        $html = str_replace("{{li}}",$li,$html);
        $this->content = str_replace("{{alert}}",$html,$content);
    }
}