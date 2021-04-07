<?php use app\views\shared\MessageItem; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->title ?>
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo APP_URL . 'public/semanticui/semantic.min.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo APP_URL . 'public/css/main.css'; ?>" />
    <script src="<?php echo APP_URL . 'public/datatables/datatables.net-se/css/dataTables.semanticui.min.css'; ?>">
    </script>

<body>
    <div id="idHeader" class="ui violet inverted borderless top fixed fluid pointing menu large">
        <a class="header item" href="/">YETİ
        <i style="margin-left: 5px;" class="icon home large"></i>
        </a>

        <div class="right menu">
        <a class="item" href="/auth/login">
                <i class="sign-in icon large tooltip" data-content="Oturum Açın"></i>
            </a>
        </div>
    </div>
</body>
<div class="contentBody">
    <?php MessageItem::showMessage(); ?>
    {{ content }}
</div>
<script src="<?php echo APP_URL . 'public/js/jquery-3.6.0.min.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/semanticui/semantic.js'; ?>"></script>

<script src="<?php echo APP_URL . 'public/js/main.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/js/datatables-load.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/js/activate.semanticui-components.js'; ?>"></script>

</html>