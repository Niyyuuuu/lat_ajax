<?php
include 'backend/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students Data</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse" style="background-color:rgb(0, 0, 0);">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Students Data</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Manage Students</a></li>
      <li><a href="http://localhost/lat_ajax/ajax_asli/index_crud.php">Manage Users</a></li>
    </ul>
  </div>
</nav>
<div class="container">
<p id="success"></p>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Students</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">➕</i> <span>Add New Student</span></a>
                    <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons">❌</i> <span>Delete</span></a>                       
                </div>
            </div>
        </div>
<!-- rest of your code -->

		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>
						<span class="custom-checkbox">
							<input type="checkbox" id="selectAll">
							<label for="selectAll"></label>
						</span>
					</th>
					<th>NO</th>
					<th>NIS</th>
					<th>NAMA</th>
					<th>KELAS</th>
					<th>JURUSAN</th>
					<th>JENIS KELAMIN</th>
					<th>ALAMAT</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
			
			<?php
			$result = mysqli_query($conn,"SELECT * FROM siswa_data");
				$i=1;
				while($row = mysqli_fetch_array($result)) {
			?>
			<tr id="<?php echo $row["id"]; ?>">
			<td>
						<span class="custom-checkbox">
							<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
							<label for="checkbox2"></label>
						</span>
					</td>
				<td><?php echo $i; ?></td>
				<td><?php echo $row["nis"]; ?></td>
				<td><?php echo $row["nama"]; ?></td>
				<td><?php echo $row["kelas"]; ?></td>
				<td><?php echo $row["jurusan"]; ?></td>
				<td><?php echo $row["jk"]; ?></td>
				<td><?php echo $row["alamat"]; ?></td>
				<td>
					<a href="#editEmployeeModal" class="edit" data-toggle="modal">
						<i class="material-icons update" data-toggle="tooltip" 
						data-id="<?php echo $row["id"]; ?>"
						data-nis="<?php echo $row["nis"]; ?>"
						data-nama="<?php echo $row["nama"]; ?>"
						data-kelas="<?php echo $row["kelas"]; ?>"
						data-jurusan="<?php echo $row["jurusan"]; ?>"
						data-jk="<?php echo $row["jk"]; ?>"
						data-alamat="<?php echo $row["alamat"]; ?>"
						title="Edit"></i>
					</a>
					<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						title="Delete"></i></a>
				</td>
			</tr>
			<?php
			$i++;
			}
			?>
			</tbody>
		</table>
		
	</div>
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="user_form">
				<div class="modal-header">						
					<h4 class="modal-title">Add Student</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>NIS</label>
						<input type="text" id="nis" name="nis" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" id="nama" name="nama" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Kelas</label>
						<input type="text" id="kelas" name="kelas" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Jurusan</label>
						<input type="text" id="jurusan" name="jurusan" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<input type="text" id="jk" name="jk" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" id="alamat" name="alamat" class="form-control" required>
					</div>
					</div>
				<div class="modal-footer">
					<input type="hidden" value="1" name="type">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button type="button" class="btn btn-success" id="btn-add">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="update_form">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Student</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_u" name="id" class="form-control" required>
					<div class="form-group">
						<label>NIS</label>
						<input type="text" id="nis_u" name="nis" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" id="nama_u" name="nama" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Kelas</label>
						<input type="email" id="kelas_u" name="kelas" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Jurusan</label>
						<input type="phone" id="jurusan_u" name="jurusan" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<input type="city" id="jk_u" name="jk" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="city" id="alamat_u" name="alamat" class="form-control" required>
					</div>			
				</div>
				<div class="modal-footer">
				<input type="hidden" value="2" name="type">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button type="button" class="btn btn-info" id="update">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Student</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_d" name="id" class="form-control">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button type="button" class="btn btn-danger" id="delete">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>