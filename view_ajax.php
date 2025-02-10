<?php
	include 'database.php';
	$sql = "SELECT * FROM siswa_data";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['nis'];?></td>
			<td><?=$row['nama'];?></td>
			<td><?=$row['kelas'];?></td>
			<td><?=$row['jurusan'];?></td>
			<td><?=$row['jk'];?></td>
			<td><?=$row['alamat'];?></td>
		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>