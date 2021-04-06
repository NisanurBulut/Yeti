<?php $form = app\core\form\Form::begin('/users/storeUser', 'post') ?>
<h4 class="ui dividing header">Kullanıcı Bilgileri</h4>
<div class="two fields">
    <?php echo $form->field($model, 'name_surname', 'text', '') ?>
    <?php echo $form->field($model, 'username', 'text', '') ?>
</div>
<div class="two fields">
    <?php echo $form->field($model, 'email', 'text', '')->emailField() ?>
    <?php echo $form->field($model, 'password', 'text', '')->passwordField() ?>
</div>
<div class="two fields">
    <div class="twelve wide field">
        <?php echo $form->field($model, 'image_url', 'text', 'imageChange') ?>
    </div>
    <div class="four wide field">
        <img id="icon_img" class="ui middle aligned tiny image"
            src="<?php echo APP_URL . 'images/userplaceholder.jpg'; ?>" />
    </div>
</div>
<div class="ui segment">
    <?php echo $form->toggleField($model, 'is_admin') ?>
</div>
<div class="formBtnRightAlligned">
    <button class="ui button violet" type="submit">Kaydet</button>
</div>
<?php echo app\core\form\Form::end() ?>