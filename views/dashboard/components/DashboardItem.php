<?php

namespace app\views\dashboard\components;

class DashboardItem
{
    public static function begin($id)
    {
        echo sprintf('
        <figure class="highcharts-figure">
        <div id="%s"></div>
        ',$id);
        return new DashboardItem();
    }
    public static function end()
    {
        echo '</figure>';
    }
}
