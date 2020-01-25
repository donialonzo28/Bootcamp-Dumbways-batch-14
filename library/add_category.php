<?php
include 'template_top.php';
if (isset($_POST['add_category'])) {
	// new id
	$sql = mysqli_query($config, "SELECT MAX(category_id) as last FROM category_tb");
	$data = mysqli_fetch_array($sql);
	$newid = 'C';
	if ($data['last']) {
		$newid .= str_pad(substr($data['last'], 1) + 1, 3, '0', STR_PAD_LEFT);
	}else{
		$newid .= '001';
	}

	$stmt = mysqli_prepare($config, "INSERT INTO category_tb (category_id, name_category) VALUES (?, ?)");
	mysqli_stmt_bind_param($stmt, "ss", $newid, $_POST['name_category']);
	if(mysqli_stmt_execute($stmt)){
		echo "<script>alert('Success');location='index.php';</script>";
	}else{
		echo "<script>alert('Failed');</script>";
	}
	mysqli_stmt_close($stmt);
}
?>
<div class="row">
	<div class="col-md-6 mx-auto">
		<strong><h1>Add Category</h1></strong>
		<form method="post">
			<div class="form-group row">
				<label for="inputCategoryName" class="col-sm-4 col-form-label">Category Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" required id="inputCategoryName" name="name_category">
				</div>
			</div>

			<div class="btn-toolbar float-right">
				<a href="index.php" class="btn btn-danger btn-md mr-1">Cancel</a>
				<button type="submit" name="add_category" class="btn btn-primary btn-md">Add Category</button>
			</div>
		</form>
	</div>
</div>
<?php
include 'template_bottom.php';
?>