<?php

use app\views\dashboard\components\DashboardItem; ?>
<div class="" style="padding-top:4rem;">
<div class="ui column cards stackable grid centerGridItems">
    <div class="five wide column">
        <div class="column">
            <div class="ui segment">
                <?php
                $dashboardItem = DashboardItem::begin('baseLine');
                $dashboardItem->end();
                ?>
            </div>
        </div>
    </div>
    <div class="five wide column">
        <div class="ui segment">
            <?php
            $dashboardItem = DashboardItem::begin('pie');
            $dashboardItem->end();
            ?>
        </div>
    </div>

    <div class="five wide column">
        <div class="ui segment">
            <?php
            $dashboardItem = DashboardItem::begin('pyramid');
            $dashboardItem->end();
            ?>
        </div>
    </div>
</div>
</div>
<script src="<?php echo APP_URL . 'public/js/dashboard.js'; ?>"></script>