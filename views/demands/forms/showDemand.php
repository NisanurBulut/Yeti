<?php use app\core\db\Constants;?>
<h4 class="ui dividing header">Talep Aşama Değişim İşlemi</h4>
<div class="ui info ignored icon message">
        <i class="info letter icon"></i>
        <div class="content">
          <div class="header"><?php $model->title ?></div>
          <?php echo $model->description ?>
        </div>
      </div>
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
