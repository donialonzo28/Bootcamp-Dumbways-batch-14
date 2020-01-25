<?php

	$config = mysqli_connect('localhost','root','','library');

	if(mysqli_connect_errno()){
		echo "GAGAL KONEKSI :" .mysqli_connect_error();
	}
?>
