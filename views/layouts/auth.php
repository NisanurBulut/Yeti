<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->title ?></title>

    <link rel="stylesheet" type="text/css" href="<?php

                                                    use app\views\shared\MessageItem;

                                                    echo APP_URL . 'css/Semantic-UI-CSS-2.4.1/semantic.min.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo APP_URL . 'css/main.css'; ?>" />
    <script src="<?php echo APP_URL . '/datatables/node_modules/datatables.net-se/css/dataTables.semanticui.min.css'; ?>">
    </script>

<body>
    <div id="idHeader" class="ui violet inverted borderless top fixed fluid pointing menu large">
        <a class="header item" href="/">YETİ</a>
        <div class="right menu">

        </div>
    </div>
</body>
<div class="contentBody">
    <?php MessageItem::showMessage(); ?>
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