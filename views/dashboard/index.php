<?php

use app\views\dashboard\components\DashboardItem; ?>
<div class="ui column cards grid centerGridItems">
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