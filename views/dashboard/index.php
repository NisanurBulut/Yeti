<?php use app\views\dashboard\components\DashboardItem;?>
<div class="ui column cards grid centerGridItems">
    <div class="five wide column">
        <div class="column">
            <div class="ui segment">
            <?php
                $dashboardItem = DashboardItem::begin('baseLine',"aciklama");
                $dashboardItem->end();
                ?>
            </div>
        </div>
    </div>
    <div class="five wide column">
        <div class="ui segment">

        </div>
    </div>
    <div class="five wide column">
        <div class="ui segment">
            <x-dashboard.pie-chart />
        </div>
    </div>
    <div class="five wide column">
        <div class="ui segment">
            <x-dashboard.columnplacement-chart />
        </div>
    </div>
    <div class="five wide column">
        <div class="ui segment">
            <x-dashboard.funnel-chart />
        </div>
    </div>
    <div class="five wide column">
        <div class="ui segment">
            <x-dashboard.pyramid3d-chart />
        </div>
    </div>
    <div class="five wide column">
        <div class="ui segment">
            <x-dashboard.piedonut3d-chart />
        </div>
    </div>
</div>