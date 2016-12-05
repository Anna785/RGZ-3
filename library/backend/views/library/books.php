<?php use yii\helpers\html; ?>
<table class="table">
	<tr>
		<th>Название </th> 
		<th>Жанр </th> 
		<th>Автор </th> 
		<th>Издательство </th> 
		<th>Год издания </th> 
		<th>Наличие </th> 
		<th>Действия </th>
	</tr>
	<?php foreach($books as $books){ ?>
		<tr>
			<td> <?= htmlspecialchars($books->name) ?> </td>
			<td> <?= htmlspecialchars($books->genre) ?> </td>
			<td> <?= htmlspecialchars($books->getAuthor()->one()->last_name) ?> </td>
			<td> <?= htmlspecialchars($books->publishing_house) ?> </td>
			<td> <?= htmlspecialchars($books->year_of_publishing) ?> </td>
			<?php if ($books->status == "1") { ?>
				<td>  <?= 'Есть в наличии' ?> </td>
			<?php } else { ?>
				<td>  <?= 'Нет в наличии'?> </td>
			<?php } ?> 
			<td> 
				<?= Html::a('<span class="glyphicon glyphicon-edit"> </span> Редактировать', ['library/edit_book', 'id' => $books ->id] , ['class' =>'btn btn-primary'])?> 
				<?= Html::a('<span class="glyphicon glyphicon-remove"> </span> Удалить', ['library/delete_book', 'id' => $books ->id], ['class' =>'btn btn-primary']) ?>
			</td>
		</tr>
	<?php } ?>
		<tr>
			<td colspan="6"> </td>
			<td>  <?=Html::a(' <span class="glyphicon glyphicon-plus"> </span> Добавить', ['library/add_book'] , ['class' =>'btn btn-primary']) ?> </td>
		</tr>
</table>
