
<?php $form = app\core\form\Form::begin('/apps/updateApp', 'post') ?>

<?php echo $form->hiddenField($model,'id') ?>
<?php echo $form->field($model, 'app_name', 'text','') ?>
<?php echo $form->field($model, 'description', 'text','') ?>
<div class="two fields">
    <?php echo $form->field($model, 'db_name', 'text','') ?>
    <?php echo $form->field($model, 'access_url', 'text','') ?>
</div>
<div class="two fields">
    <div class="twelve wide field">
        <?php echo $form->field($model, 'image_url', 'text','imageChange') ?>
    </div>
    <div class="four wide field">
        <img id="icon_img" class="ui middle aligned tiny image"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMhGjtzojjaZI-4ugGXPfL8jWIHLBfSFxKyA&usqp=CAU" />
    </div>
</div>
</div>
<div class="formBtnRightAlligned">
        <button class="ui button purple" type="submit">Kaydet</button>
    </div>
<?php echo app\core\form\Form::end() ?>
