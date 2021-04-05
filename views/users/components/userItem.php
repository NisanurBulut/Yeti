<?php

namespace app\views\users\components;

class UserItem
{
    public static function begin($user)
    {
        $finalPrint = '<div class="four wide column centerGridItems">
        <div class="ui card"><div class="content">';
        if ($user->is_admin) {
            $finalPrint = $finalPrint . '<i class="right floated star yellow icon"></i>';
        }
        $finalPrint = $finalPrint . '
        <div class="header"> %s </div>
        <div class="description">
            <p></p>
        </div>
        </div>
        <div class="image">
        <img class="ui image" src="%s" />
        </div>
    <div class="content">
        <div class="header">%s</div>
        <div class="ui divider"></div>
        <div class="description">
            <p class="item"><i class="icon grey envelope"></i>%s</p>
        </div>
    </div>
    <div class="extra content">
        <a class="left floated edit btnModalOpen" href="/users/editUser?id=%s">
            <i class="edit blue icon"></i>
        </a>
        <a class="right floated trash btnConfirmModalOpen"
          id="%s"  href="/users/deleteUser?id=%s">
            <i class="trash red icon"></i>
        </a>
    </div>
</div>';
        echo sprintf($finalPrint, $user->name_surname, $user->image_url,
        $user->username, $user->email, $user->id, $user->id, $user->id);
        return new UserItem();
    }
    public static function end()
    {
        echo '</div>';
    }
}
