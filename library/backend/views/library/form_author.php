<?php
	use yii\bootstrap\ActiveForm; 
	use yii\helpers\Html;
?>
<h2> Добавление автора </h2>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($author, 'last_name') ?>
<?= $form->field($author, 'first_name') ?>
<?= $form->field($author, 'patronymic_name') ?>
<?= $form->field($author, 'date_of_birth')->widget(\yii\jui\DatePicker::classname(), [
	'language' => 'ru',
	'dateFormat' => 'yyyy-MM-dd',
	]) 
?>
<button class="btn btn-primary" type="submit"> Сохранить </button>
<?php ActiveForm::end(); ?>

