<?php
	include 'database.php';
	$nis=$_POST['NIS'];
	$nama=$_POST['nama'];
	$kelas=$_POST['kelas'];
	$jurusan=$_POST['jurusan'];
	$jk=$_POST['jk'];
	$alamat=$_POST['alamat'];
	$sql = "INSERT INTO siswa_data (NIS, name, kelas, jurusan, jk, alamat) VALUES ('$nis','$nama','$kelas','$jurusan','$jk','$alamat')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>