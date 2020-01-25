<?php
include 'template_top.php';
if (isset($_POST['add_book'])) {
	// upload file
	$target_dir = "imgs/";
	$target_file = $target_dir . time() . basename($_FILES["img"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// try to upload file
    if (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
        $uploadOk = 0;
    }

    if ($uploadOk) {
		// new id
		$sql = mysqli_query($config, "SELECT MAX(book_id) as last FROM book_tb");
		$data = mysqli_fetch_array($sql);
		$newid = 'B';
		if ($data['last']) {
			$newid .= str_pad(substr($data['last'], 1) + 1, 3, '0', STR_PAD_LEFT);
		}else{
			$newid .= '001';
		}

		$stmt = mysqli_prepare($config, "INSERT INTO book_tb (book_id, name_book, category_id, writer_id, publication_year, img) VALUES (?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param($stmt, "ssssis", 
			$newid, $_POST['name_book'], $_POST['category_id'],
			$_POST['writer_id'], $_POST['publication_year'], $target_file);
		if(mysqli_stmt_execute($stmt)){
			echo "<script>alert('Success');location='index.php';</script>";
		}else{
			echo "<script>alert('Failed');</script>";
		}
		mysqli_stmt_close($stmt);
	}
}
?>
<div class="row">
	<div class="col-md-6 mx-auto">
		<strong><h1>Add Book</h1></strong>
		<form method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="inputBookName" class="col-sm-3 col-form-label">Book Name</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" required id="inputBookName" name="name_book">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputCategory" class="col-sm-3 col-form-label">Category</label>
				<div class="col-sm-9">
					<select class="form-control" required name="category_id" id="inputCategory">
						<option value="">Select Category</option>
						<?php
						$q = mysqli_query($config, "SELECT * FROM category_tb");
						while($data = mysqli_fetch_array($q)){
						?>
							<option value="<?php echo $data['category_id']; ?>"><?php echo $data['name_category']; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputWriter" class="col-sm-3 col-form-label">Writer</label>
				<div class="col-sm-9">
					<select class="form-control" required name="writer_id" id="inputWriter">
						<option value="">Select Writer</option>
						<?php
						$q = mysqli_query($config, "SELECT * FROM writer_tb");
						while($data = mysqli_fetch_array($q)){
						?>
							<option value="<?php echo $data['writer_id']; ?>"><?php echo $data['name_writer']; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPublicationYear" class="col-sm-3 col-form-label">Publication Year</label>
				<div class="col-sm-9">
					<input type="number" class="form-control" required id="inputPublicationYear" name="publication_year" value="<?php echo date('Y') ?>" max="<?php echo date('Y') ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputImg" class="col-sm-3 col-form-label">Image</label>
				<div class="col-sm-9">
					<input type="file" class="form-control" required id="inputImg" name="img" accept="image/*">
				</div>
			</div>

			<div class="btn-toolbar float-right">
				<a href="index.php" class="btn btn-danger btn-md mr-1">Cancel</a>
				<button type="submit" name="add_book" class="btn btn-primary btn-md">Add Book</button>
			</div>
		</form>
	</div>
</div>
<?php
include 'template_bottom.php';
?>