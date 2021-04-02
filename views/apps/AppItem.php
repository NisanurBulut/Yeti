<?php

namespace app\views\apps;

class AppItem
{
    public static function begin($actionEdit, $actionDelete, $description)
    {
        echo sprintf('<div class="column">
        <div class="ui fluid card">
            <div class="content">
                <div class="hoverBtns">
                    <a class="btnModalOpen" href="%s">
                        <i class="right floated edit blue icon"></i>
                    </a>
                    <a class="btnConfirmModalOpen" href="%s">
                        <i class="right floated trash red icon"></i>
                    </a>
                </div>
                <div class="header">
                    <div class="left floated author">
                        <img class="ui avatar image" src="https://st2.depositphotos.com/2435397/8630/i/950/depositphotos_86302230-stock-photo-cartoon-ape-like-yeti.jpg"> YETİ
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
                            <a class="header"></a>
                        </div>
                    </div>
                    <div class="item">
                        <i class="linkify icon large grey"></i>
                        <div class="content">
                            <a class="header"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="meta right floated"></div>
            </div>
        ', $actionEdit, $actionDelete, $description);
        return new AppItem();
    }
    public static function end()
    {
        return '</div></div>';
    }
}
