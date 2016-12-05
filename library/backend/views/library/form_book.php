<?php
	use yii\bootstrap\ActiveForm; 
	use yii\helpers\ArrayHelper;
?>
<h2> Добавление книги </h2>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($book, 'name') ?>
<?= $form->field($book, 'genre') ?>
<?= $form->field($book, 'author_id') -> ListBox(ArrayHelper::map($author,'id', 'last_name')) ?>
<?= $form->field($book, 'publishing_house') ?>
<?= $form->field($book, 'year_of_publishing') ?>
<?= $form->field($book, 'status')-> checkBox() ?>
<button class="btn btn-primary" type="submit"> Добавить </button>
<?php ActiveForm::end(); ?>

