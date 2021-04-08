<?php

namespace app\views\layouts\components;

use app\core\Application;

class HeaderItem
{
    public static function begin()
    {
        $rightMenu = self::getRightMenu();
        $leftMenu = self::getLeftMenu();
        $headerComponent='';
        $headerComponentBegin = '<div id="idHeader" class="ui violet inverted borderless top fixed fluid pointing menu large">';
        $profileMenu = self::getProfileMenu();

        $headerComponent = $headerComponentBegin. $leftMenu . $rightMenu . $profileMenu;
        echo $headerComponent;
        return new HeaderItem();
    }
    private static function getAdminRightMenu(): string
    {
        $demandsCount = sprintf('<div class="ui label">%s</div>', Application::$app->getWaitingDemandsCount());
        $demandItem = sprintf('<a class="item" href="/demands">
        <i class="tasks icon large tooltip" data-content="Talepler"></i>%s</a>', $demandsCount);
        return sprintf('<a class="item" href="/dashboard">
        <i class="bolt icon large tooltip" data-content="Dashboard"></i></a><a class="item" href="/users">
        <i class="users icon large tooltip" data-content="Kullanıcılar"></i>
        </a>
        <a class="item" href="/apps">
            <i class="rocket icon large tooltip" data-content="Uygulamalar"></i>
        </a>%s', $demandItem);
    }
    private static function getRightMenu(): string
    {   $rightMenuBegin = '<div class="right menu">';
        $rightMenuContent = '';
        if (Application::$app->isGuest()) {
            $rightMenuContent='<a class="item" href="/auth/login">
            <i class="sign-in icon large tooltip" data-content="Oturum Açın"></i>
        </a>';
        } else {
            $rightMenuContent = self::getProfileMenu();

            $rightMenuContent ='<div class="right menu"><a class="item" href="/dashboard">
            <i class="bolt icon large tooltip" data-content="Dashboard"></i>
        </a>
        <a class="item" href="/demands">
        <i class="tasks icon large tooltip" data-content="Talepler"></i></a>';

            if (Application::$app->isAdmin()) {
                $rightMenuContent = self::getAdminRightMenu();
            }
        }
        return $rightMenuBegin.$rightMenuContent;
    }
    private static function getLeftMenu(): string
    {
        return '<a class="header item">YETİ</a>';
    }
    private static function getProfileMenu(): string
    {
        if(Application::isGuest()) return '';
        return sprintf(' <div role="listbox" aria-expanded="false" class="ui item inline dropdown" tabindex="0">
<div aria-atomic="true" aria-live="polite" role="alert" class="divider text">
    <img class="ui avatar image"
    src="%s" />
    <i>%s</i>
</div>
<i aria-hidden="true" class="dropdown icon"></i>
<div class="menu transition">
    <div style="cursor:pointer;" role="option" aria-checked="true" aria-selected="true" class="item">
        <a class="ui" href="/auth/logout">
            <i type="submit" class="sign out violet alternate icon large tooltip" data-content="Oturumu kapat"></i>
            <label class="text ui violet label basic">Oturumu kapat</label>
        </a>
    </div>
</div>
</div>', Application::$app->user->getUserImageUrl(), Application::$app->user->getDisplayName());
    }
    public static function end()
    {
        echo '</div></div></div>';
    }
}
