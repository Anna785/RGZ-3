<div class="jumbotron">
	<h2>
		<?=htmlspecialchars($books->last_name); ?>
		<?= htmlspecialchars($books->first_name); ?> 
		<?= htmlspecialchars($books->patronymic_name); ?> 
	</h2> <div class="books-list">
	<?php if ($books->getBooks()->count()<>0) { ?>
		<table class="table table-striped">
			<tr>
				<th>Название книги </th> 
				<th>Жанр </th> 
				<th>Издательство </th>
				<th>Год издания </th> 
				<th>Наличие </th> 
			</tr> 
			<?php  foreach($books->getBooks()->all() as $book) { ?>
			<tr> 
				<td>  <?= htmlspecialchars($book->name)?> </td>
				<td> <?=  htmlspecialchars($book->genre)?> </td>
				<td> <?=  htmlspecialchars($book->publishing_house)?> </td>
				<td> <?=  htmlspecialchars($book->year_of_publishing)?></td>
				<?php if ($book->status == "1") { ?>
					<td>  <?= 'Есть в наличии' ?> </td>
				<?php } else { ?>
					<td>  <?= 'Нет в наличии'?> </td>
				<?php } ?> 
			</tr> 
			<?php } ?> </div>
	  </table> 
	<? } else { 
	   echo "<div class='message'>  У автора нет книг </div>" ; 
	} ?>  
</div>
<style type="text/css"> 
.books-list{
	text-align: left;
}
.message{
	text-align: center;
	font: 12pt/10pt sans-serif;
	font-size: 150%;		
}
</style>