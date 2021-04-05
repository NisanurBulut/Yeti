<?php
use app\views\users\components\UserItem;
?>
<div class="ui top attached menu">
  <div class="left menu">
    <div class="ui left aligned category search item">
      <div class="ui transparent icon input">
        <input id="inputSearch" class="prompt" type="text" placeholder="Kullanıcı ara...">
        <i class="search link icon"></i>
      </div>
      <div class="results">
      </div>
    </div>
  </div>
  <div class="right menu">
    <a class="ui item mini btnModalOpen" href="/users/createUser">
      <i class="plus icon large green center aligned"></i>
    </a>
  </div>
</div>
<div class="ui bottom attached segment" id="divSearchContent">
  <div class="ui grid">
    <?php foreach($users as $user) {

      $userItem = UserItem::begin($user);
      $userItem->end();
    }
    ?>
  </div>
</div>

<?php
include(__DIR__ . '/../shared/confirm-modal.php');
include(__DIR__ . '/../shared/general-modal.php');
?>