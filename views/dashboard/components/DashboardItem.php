<?php

namespace app\views\dashboard\components;

class DashboardItem
{
    public static function begin($id, $description)
    {
        echo sprintf('
        <figure class="highcharts-figure">
        <div id="%s"></div>
        <p class="highcharts-description">
            %s
        </p>
        ',$id, $description);
        return new DashboardItem();
    }
    public static function end()
    {
        echo '</figure>';
    }
}
