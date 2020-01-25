<?php
include 'template_top.php';
?>
<div class="row">
	<div class="col-md-8 mx-auto">
		<a href="index.php" class="btn btn-primary btn-md mr-1">Back</a>
		<?php
		$stmt_data = mysqli_prepare($config, 
			"SELECT book_tb.*, category_tb.name_category, writer_tb.name_writer 
			FROM book_tb 
			INNER JOIN category_tb ON category_tb.category_id = book_tb.category_id
			INNER JOIN writer_tb ON writer_tb.writer_id = book_tb.writer_id
			WHERE book_tb.book_id = ?");
		mysqli_stmt_bind_param($stmt_data, "s", $_GET['book_id']);
		if(!mysqli_stmt_execute($stmt_data)){
			header('location:index.php');
		}
		$result = mysqli_stmt_get_result($stmt_data);
		$data = mysqli_fetch_array($result);
		mysqli_stmt_close($stmt_data);
		?>
		<table cellpadding="5">
			<tr>
				<td rowspan="4">
					<img src="<?php echo $data['img']; ?>" width="150px;" alt="<?php echo $data['name_book']; ?>">
				</td>
				<td colspan="2">
					<h3><?php echo $data['name_book']; ?></h3>
				</td>
			</tr>
			<tr>
				<td width="160">
					<h5>Category</h5>
				</td>
				<td>
					<h5>: <?php echo $data['name_category']; ?></h5>
				</td>
			</tr>
			<tr>
				<td>
					<h5>Writer</h5>
				</td>
				<td>
					<h5>: <?php echo $data['name_writer']; ?></h5>
				</td>
			</tr>
			<tr>
				<td>
					<h5>Publication Year</h5>
				</td>
				<td>
					<h5>: <?php echo $data['publication_year']; ?></h5>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php
include 'template_bottom.php';
?>