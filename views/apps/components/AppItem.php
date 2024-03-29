<?php

namespace app\views\apps\components;

class AppItem
{
    public static function begin($app)
    {
        echo sprintf(
            '<div class="four wide column centerGridItems stackable">
        <div class="ui fluid card">
            <div class="content">
                <div class="hoverBtns">
                    <a class="btnModalOpen" href="/apps/editApp?id=%s">
                        <i class="right floated edit blue icon"></i>
                    </a>
                    <a class="btnConfirmModalOpen" href="/apps/destroyApp?id=%s">
                        <i class="right floated trash red icon"></i>
                    </a>
                </div>
                <div class="header">
                    <div class="left floated author">
                        <img class="ui avatar image" src="%s">%s
                    </div>
                </div>
            </div>
            <div class="content" style="overflow: auto;max-height: 100px;min-height:100px;">
                <div class="description">
                    <p>%s</p>
                </div>
            </div>
            <div class="content">
                <div class="ui middle aligned divided list">
                    <div class="item">
                        <i class="database icon grey large"></i>
                        <div class="content">
                            <a class="header text-break aTagText">%s</a>
                        </div>
                    </div>
                    <div class="item">
                    <div class="content">
                 <label class="ui ">
                 <i class="linkify icon large grey"></i>
                 <a class="aTagText" href="%s" target="_blank">
                 %s </a></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="meta right floated"></div>
            </div>',
            $app->id,
            $app->id,
            $app->image_url,
            $app->app_name,
            $app->description,
            $app->db_name,
            $app->access_url,
            $app->access_url
        );
        return new AppItem();
    }
    public static function end()
    {
        echo '</div></div>';
    }
}
