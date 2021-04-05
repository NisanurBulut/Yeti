<?php

namespace app\views\shared;

use app\core\Application;

class BreadcrumbItem
{
    public static function showBreadcrumb()
    {
        if(Application::$app->view->title) {
            $title=Application::$app->view->title;
            echo sprintf(
                '<div class="ui breadcrumb">
            <a class="section">%s</a>
            <i class="right chevron icon divider"></i>
            <a class="section">Liste</a>
          </div>', $title);
        }
    }
}
?>