<?php
include 'template_top.php';
?>
<div class="row">
	<div class="col-md-8">
		<strong><h1>Dump Library</h1></strong>
	</div>
	<div class="col-md-4">
		<div class="btn-toolbar float-right">
			<a href="add_book.php" class="btn btn-primary btn-sm mr-1">Add Book</a>
			<a href="add_writer.php" class="btn btn-primary btn-sm mr-1">Add Writer</a>
			<a href="add_category.php" class="btn btn-primary btn-sm">Add Category</a>
		</div>
	</div>
</div>
<br>
<br>
<div class="row">
	<?php
	$no = 0;
	$q = mysqli_query($config, "SELECT * FROM book_tb");
	while($data = mysqli_fetch_array($q)){
		$no++;
	?>
	<div class="col-md-3">
		<table width="100%" style="margin: 10px 0 10px 0;">
			<tr>
				<td>
					<img class="card-img-top" src="<?php echo $data['img']; ?>" alt="<?php echo $data['name_book']; ?>">
				</td>
			</tr>
			<tr>
				<td align="center">
					<h5 style="margin: 10px 0 10px 0;"><?php echo substr($data['name_book'], 0, 20).(strlen($data['name_book']) > 20 ? '...' : ''); ?></h5>
				</td>
			</tr>
			<tr>
				<td align="center">
					<a href="detail_book.php?book_id=<?php echo $data['book_id'] ?>" class="btn btn-block btn-primary">View Detail</a>
				</td>
			</tr>
		</table>
	</div>
	<?php
	}
	?>
</div>

<?php
include 'template_bottom.php';
?>