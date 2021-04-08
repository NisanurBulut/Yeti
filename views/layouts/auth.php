<?php
use app\views\layouts\components\HeaderItem;
use app\core\Application;
use app\views\shared\MessageItem; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->title ?></title>
    <link rel="shortcut icon" type="image/jpg" href="<?php echo APP_URL . 'public/images/favicon.ico'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo APP_URL . 'public/semanticui/semantic.min.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo APP_URL . 'public/css/main.css'; ?>" />
    <script src="<?php echo APP_URL . 'public/datatables/datatables.net-se/css/dataTables.semanticui.min.css'; ?>">
    </script>

<body>
    <?php HeaderItem::begin() ?>
    <?php HeaderItem::end() ?>
</body>
<div class="">
    {{ content }}
</div>
<script src="<?php echo APP_URL . 'public/js/jquery-3.6.0.min.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/semanticui/semantic.js'; ?>"></script>

<script src="<?php echo APP_URL . 'public/js/main.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/js/datatables-load.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/js/activate.semanticui-components.js'; ?>"></script>

</html>