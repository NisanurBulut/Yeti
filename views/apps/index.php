<?php

use app\core\Application;
use app\views\AppItem;

include(__DIR__ . '/forms/create-app.php'); ?>

<?php
if (Application::$app->session->getFlash('success')) :
?>
  <div class="ui message">
    <div class="header">
      Changes in Service
    </div>
    <p>
      <?php echo Application::$app->session->getFlash('success'); ?></p>
  </div>
<?php endif; ?>

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
    <a class="ui item mini btnModalOpen">
      <i class="plus icon large green center aligned"></i>
    </a>
  </div>
</div>
<div class="ui bottom attached segment" id="divSearchContent">
  <div class="ui four column cards grid">
    <?php
    foreach ($apps as $app) {
      $appItem = app\views\apps\AppItem::begin($app);
      $appItem->end();
    }
    ?>
  </div>
</div>