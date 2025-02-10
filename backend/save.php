<?php
include 'database.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$nis=$_POST['nis'];
		$nama=$_POST['nama'];
		$kelas=$_POST['kelas'];
		$jurusan=$_POST['jurusan'];
		$jk=$_POST['jk'];
		$alamat=$_POST['alamat'];
		$sql = "INSERT INTO siswa_data ( NIS, nama, kelas, jurusan, jk, alamat) VALUES ('$nis','$nama','$kelas','$jurusan','$jk','$alamat')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$nis=$_POST['nis'];
		$nama=$_POST['nama'];
		$kelas=$_POST['kelas'];
		$jurusan=$_POST['jurusan'];
		$jk=$_POST['jk'];
		$alamat=$_POST['alamat'];
		$sql = "UPDATE siswa_data SET NIS='$nis', nama='$nama', kelas='$kelas', jurusan='$jurusan', jk='$jk', alamat='$alamat' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM siswa_data WHERE id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM siswa_data WHERE id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>