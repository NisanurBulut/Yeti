<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->title ?></title>
    <link rel="shortcut icon" type="image/jpg" href="<?php echo APP_URL . 'public/images/favicon.ico'; ?>"/>

    <link rel="stylesheet" type="text/css" href="<?php

use app\core\Application;
use app\views\shared\MessageItem;
use app\views\layouts\components\HeaderItem;

    echo APP_URL . 'public/semanticui/semantic.min.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo APP_URL . 'public/css/main.css'; ?>" />
    <link rel="stylesheet" href="<?php echo APP_URL . 'public/datatables/datatables.net-se/css/dataTables.semanticui.min.css'; ?>">
    </link>
<script src="<?php echo APP_URL . 'public/js/jquery-3.6.0.min.js'; ?>"></script>
<body>
    <?php HeaderItem::begin() ?>
    <?php HeaderItem::end() ?>
<div class="contentBody">
    <?php MessageItem::showMessage(); ?>
    <?php

    use app\views\shared\BreadcrumbItem;

    BreadcrumbItem::showBreadcrumb();
    ?>
    {{ content }}
    <?php
    include(__DIR__ . '/../shared/confirm-modal.php');
    include(__DIR__ . '/../shared/general-modal.php');
    ?>
</div>
</body>
<script src="<?php echo APP_URL . 'public/semanticui/semantic.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/datatables/datatables.net/js/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/datatables/datatables.net-se/js/dataTables.semanticui.min.js'; ?>">
</script>

<script src="<?php echo APP_URL . 'public/highcharts/highcharts.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/highcharts/highcharts-3d.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/highcharts/modules/series-label.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/highcharts/modules/exporting.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/highcharts/modules/export-data.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/highcharts/modules/accessibility.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/highcharts/modules/cylinder.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/highcharts/modules/funnel3d.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/highcharts/modules/pyramid3d.js'; ?>"></script>

<script src="<?php echo APP_URL . 'public/js/main.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/js/activate.semanticui-components.js'; ?>"></script>
</html>