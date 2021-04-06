<?php $form = app\core\form\Form::begin('/users/updateUser', 'post') ?>
<h4 class="ui dividing header">Kullanıcı Bilgileri</h4>
<?php echo $form->hiddenField($model,'id') ?>
<div class="two fields">
    <?php echo $form->field($model, 'name_surname', 'text', '') ?>
    <?php echo $form->field($model, 'username', 'text', '') ?>
</div>
<div class="two fields">
    <?php echo $form->field($model, 'email', 'text', '')->emailField() ?>
    <?php echo $form->field($model, 'password', 'text', '') ?>
</div>

<div class="two fields">
    <div class="twelve wide field">
        <?php echo $form->field($model, 'image_url', 'text', 'imageChange') ?>
    </div>
    <div class="four wide field">
        <img id="icon_img" class="ui middle aligned tiny image" src="https://cdn03.ciceksepeti.com/cicek/kc9124966-1/L/turuncu-araba-sari-kalanchoe-kc9124966-1-304c4c57dbe34e63a431f46f3cab98e8.jpg" />
    </div>
</div>
<div class="ui segment">
<?php echo $form->toggleField($model, 'is_admin') ?>
</div>
<div class="formBtnRightAlligned">
    <button class="ui button violet" type="submit">Kaydet</button>
</div>
<?php echo app\core\form\Form::end() ?>