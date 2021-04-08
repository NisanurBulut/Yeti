<?php $form = app\core\form\Form::begin('/users/changePassword', 'post') ?>
<h4 class="ui dividing header">Kullanıcı Parola Bilgileri</h4>
<?php echo $form->hiddenField($model,'id') ?>
<?php echo $form->field($model,'password','text','')->passwordField() ?>
<?php echo $form->field($model,'passwordConfirm','text','')->passwordField() ?>
<div class="formBtnRightAlligned">
    <button class="ui button violet" type="submit">Kaydet</button>
</div>
<?php echo app\core\form\Form::end() ?>