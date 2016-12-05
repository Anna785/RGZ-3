<?php 
	Use \yii\helpers\Html; 
	$this->title = 'Поиск книги';
?>

<table class="table">
	<tr>
		<th>Фамилия </th> 
		<th>Имя </th> 
		<th>Отчество </th> 
		<th>Информация о книгах </th> 
	</tr>
	<?php foreach($authors as $author){ ?>
	<tr>
		<td> <?= htmlspecialchars($author->last_name) ?> </td>
		<td> <?= htmlspecialchars($author->first_name) ?> </td>
		<td> <?= htmlspecialchars($author->patronymic_name) ?> </td>
		<td> <?= Html::a('<span class="glyphicon glyphicon-search"> </span> Посмотреть', ['library/view', 'id' => $author ->id] , ['class' =>'btn btn-primary']) ?> </td>
	</tr>
	 <?php } ?>
</table>

