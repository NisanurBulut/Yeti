<?php

namespace app\views\users\components;

class UserItem
{
    public static function begin()
    {
        echo sprintf('<div class="four wide column centerGridItems">
        <div class="ui card">
    <div class="content">
        @if ($user->is_admin)
            <i class="right floated star yellow icon"></i>
        @endif
        <div class="header">{{ $user->name }}</div>
        <div class="description">
            <p></p>
        </div>
    </div>
    <div class="image">
        <img class="ui image" src="https://avatars.githubusercontent.com/u/9026717?v=4">
    </div>
    <div class="content">
        <div class="header">{{ $user->username }}</div>
        <div class="ui divider"></div>
        <div class="meta">
            <p class="item">
                <i class="icon grey clock"></i>
                {{ $user->created_at->diffForHumans() }}</p>
        </div>
        <div class="description">
            <p class="item">
                <i class="icon grey envelope"></i>
                {{ $user->email }}</p>
        </div>
    </div>
    <div class="extra content">
        <a onclick="event.preventDefault()" class="left floated edit btnModalOpen" href="/users/editUser/">
            <i class="edit blue icon"></i>
        </a>
        <a class="right floated trash btnConfirmModalOpen"
          id=""  href="">
            <i class="trash red icon"></i>
        </a>
    </div>
</div>
        ');
        return new UserItem();
    }
    public static function end()
    {
        echo '</div>';
    }
}
