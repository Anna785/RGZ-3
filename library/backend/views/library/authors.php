<?php use yii\helpers\Html; ?>
<table class="table">
	<tr>
		<th>Фамилия </th> 
		<th>Имя </th> 
		<th>Отчество </th> 
		<th>Дата рождения </th> 
		<th>Действия </th> 
	</tr>
	<?php foreach($authors as $authors){ ?>
		<tr>
			<td> <?= htmlspecialchars($authors->last_name) ?> </td>
			<td> <?= htmlspecialchars($authors->first_name) ?> </td>
			<td> <?= htmlspecialchars($authors->patronymic_name) ?> </td>
			<td> <?= (new \DateTime($authors->date_of_birth))->format('d.m.Y') ?> </td>
			<td> 
				<?= Html::a('<span class="glyphicon glyphicon-edit"> </span> Редактировать', ['library/edit_author', 'id' => $authors ->id] , ['class' =>'btn btn-primary']) ?> 
				<?php
					if ($authors->id && $authors->getBooks()->count()==0){
					echo Html::a(' <span class="glyphicon glyphicon-remove"> </span> Удалить', ['library/delete_author', 'id' => $authors ->id], ['class' =>'btn btn-primary']);
					} 
				?>
			</td>
		</tr>
	<?php } ?>
	<tr>
		<td colspan="4"> </td>
		<td> <?=Html::a(' <span class="glyphicon glyphicon-plus"> </span> Добавить', ['library/add_author'] , ['class' =>'btn btn-primary']) ?> </td>
	</tr>
</table>
