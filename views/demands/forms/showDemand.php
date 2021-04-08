<?php

use app\core\Application;
use app\core\db\Constants; ?>
<h4 class="ui dividing header"><?php echo $model->title ?></h4>
<div class="segment">
  <i class="info letter blue small icon large"></i>
  <?php echo $model->description ?>
</div>
<div class="ui divider"></div>
<?php if(Application::$app->isAdmin()): ?>
  <?php $form = app\core\form\Form::begin('/demands/changeStateDemand', 'post') ?>
<?php echo $form->hiddenField($model, 'id') ?>
<?php echo $form->dropdownField($model, 'state', Constants::$contants->getStates()) ?>
</div>
<div class="formBtnRightAlligned">
  <button class="ui button purple" type="submit">Kaydet</button>
</div>
<?php echo app\core\form\Form::end() ?>
<script src="<?php echo APP_URL . 'public/semanticui/semantic.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/js/activate.semanticui-components.js'; ?>"></script>
<?php endif; ?>