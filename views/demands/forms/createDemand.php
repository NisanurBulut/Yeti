<?php

use app\core\db\Constants;

$form = app\core\form\Form::begin('/demands/storeDemand', 'post') ?>
<h4 class="ui dividing header">Talep Bilgileri</h4>
<?php echo $form->field($model, 'title', 'text', '') ?>
<?php echo $form->field($model, 'description', 'text', 'inputTextAreaHeight') ?>
<div class="two fields">
    <?php echo $form->dropdownField($model, 'status_id', Constants::$contants->getSituations()) ?>
    <?php echo $form->dropdownField($model, 'app_id', $apps) ?>
</div>
</div>
<div class="formBtnRightAlligned">
    <button class="ui button purple" type="submit">Kaydet</button>
</div>
<?php echo app\core\form\Form::end() ?>
<script src="<?php echo APP_URL . 'public/semanticui/semantic.js'; ?>"></script>
<script src="<?php echo APP_URL . 'public/js/activate.semanticui-components.js'; ?>"></script>
