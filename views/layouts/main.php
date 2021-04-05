<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->title ?></title>

    <link rel="stylesheet" type="text/css" href="<?php

use app\core\Application;
use app\views\shared\MessageItem;

                                                    echo APP_URL . 'css/Semantic-UI-CSS-2.4.1/semantic.min.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo APP_URL . 'css/main.css'; ?>" />
    <script src="<?php echo APP_URL . '/datatables/node_modules/datatables.net-se/css/dataTables.semanticui.min.css'; ?>">
    </script>

<body>
    <div id="idHeader" class="ui violet inverted borderless top fixed fluid pointing menu large">
        <a class="header item" href="/">YETİ</a>
        <div class="right menu">
            <div class="item">
                <div class="ui small input"><input placeholder="Search..." /></div>
            </div>
            <a class="item" href="/dashboard">
                <i class="bolt icon large tooltip" data-content="Dashboard"></i>
            </a>
            <a class="item" href="/users">
                <i class="users icon large tooltip" data-content="Kullanıcılar"></i>
            </a>
            <a class="item" href="/apps">
                <i class="rocket icon large tooltip" data-content="Uygulamalar"></i>
            </a>
            <a class="item" href="/demands">
                <i class="tasks icon large tooltip" data-content="Talepler"></i>
                <div class="ui label">51</div>
            </a>
            <div role="listbox" aria-expanded="false" class="ui item inline dropdown" tabindex="0">
                <div aria-atomic="true" aria-live="polite" role="alert" class="divider text">
                    <img class="ui avatar image"
                    src="<?php echo Application::$app->user->getUserImageUrl() ?>" />
                    <i><?php echo Application::$app->user->getDisplayName() ?></i>
                </div>
                <i aria-hidden="true" class="dropdown icon"></i>
                <div class="menu transition">
                    <div style="cursor:pointer;" role="option" aria-checked="true" aria-selected="true" class="item">
                        <a class="ui" href="/auth/logout">
                            <i type="submit" class="sign out violet alternate icon large tooltip" data-content="Oturumu kapat"></i>
                            <label class="text ui violet label basic">Oturumu kapat</label>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<div class="contentBody">
    <?php MessageItem::showMessage(); ?>
    <?php

    use app\views\shared\BreadcrumbItem;

    BreadcrumbItem::showBreadcrumb();
    ?>
    {{ content }}
</div>
<script src="<?php echo APP_URL . 'js/jquery-3.6.0.min.js'; ?>"></script>
<script src="<?php echo APP_URL . 'css/Semantic-UI-CSS-2.4.1/semantic.js'; ?>"></script>
<script src="<?php echo APP_URL . '/datatables/node_modules/datatables.net/js/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo APP_URL . '/datatables/node_modules/datatables.net-se/js/dataTables.semanticui.min.js'; ?>">
</script>
<script src="<?php echo APP_URL . 'js/main.js'; ?>"></script>
<script src="<?php echo APP_URL . 'js/datatables-load.js'; ?>"></script>
<script src="<?php echo APP_URL . 'js/activate.semanticui-components.js'; ?>"></script>

</html>