
<div class="ui top attached menu">
  <div class="left menu">
    <div class="ui left aligned category search item">
      <div class="ui transparent icon input">
        <input id="inputSearch" class="prompt" type="text" placeholder="Uygulama ara...">
        <i class="search link icon"></i>
      </div>
      <div class="results">
      </div>
    </div>
  </div>
  <div class="right menu">
    <a class="ui item mini btnModalOpen" href="/apps/createApp">
      <i class="plus icon large green center aligned"></i>
    </a>
  </div>
</div>
<div class="ui bottom attached segment" id="divSearchContent">
  <div class="ui four column cards grid">
    <?php
    foreach ($apps as $app) {
      $appItem = app\views\apps\components\AppItem::begin($app);
      $appItem->end();
    }
    ?>
  </div>
</div>
    <?php
    include(__DIR__ . '/../shared/confirm-modal.php');
    include(__DIR__ . '/../shared/general-modal.php');
    include(__DIR__ . '/forms/create-app.php');
    ?>