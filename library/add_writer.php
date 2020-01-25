<?php
include 'template_top.php';
if (isset($_POST['add_writer'])) {
	// new id
	$sql = mysqli_query($config, "SELECT MAX(writer_id) as last FROM writer_tb");
	$data = mysqli_fetch_array($sql);
	$newid = 'W';
	if ($data['last']) {
		$newid .= str_pad(substr($data['last'], 1) + 1, 3, '0', STR_PAD_LEFT);
	}else{
		$newid .= '001';
	}

	$stmt = mysqli_prepare($config, "INSERT INTO writer_tb (writer_id, name_writer) VALUES (?, ?)");
	mysqli_stmt_bind_param($stmt, "ss", $newid, $_POST['name_writer']);
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
		<strong><h1>Add Writer</h1></strong>
		<form method="post">
			<div class="form-group row">
				<label for="inputWriterName" class="col-sm-4 col-form-label">Writer Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" required id="inputWriterName" name="name_writer">
				</div>
			</div>

			<div class="btn-toolbar float-right">
				<a href="index.php" class="btn btn-danger btn-md mr-1">Cancel</a>
				<button type="submit" name="add_writer" class="btn btn-primary btn-md">Add Writer</button>
			</div>
		</form>
	</div>
</div>
<?php
include 'template_bottom.php';
?>