<?php $form = app\core\form\Form::begin('/users/updateUser', 'post') ?>
<h4 class="ui dividing header">Kullanıcı Bilgileri</h4>
<?php echo $form->hiddenField($model,'id') ?>
<div class="two fields">
    <?php echo $form->field($model, 'name_surname', 'text', '') ?>
    <?php echo $form->field($model, 'username', 'text', '') ?>
</div>
<?php echo $form->field($model, 'email', 'text', '')->emailField() ?>

<div class="two fields">
    <div class="twelve wide field">
        <?php echo $form->field($model, 'image_url', 'text', 'imageChange') ?>
    </div>
    <div class="four wide field">
        <img id="icon_img" class="ui middle aligned tiny image" src="<?php echo $model->image_url; ?>" />
    </div>
</div>
<div class="ui segment">
<?php echo $form->toggleField($model, 'is_admin') ?>
</div>
<div class="formBtnRightAlligned">
    <button class="ui button violet" type="submit">Kaydet</button>
</div>
<?php echo app\core\form\Form::end() ?>