<?php 
include "config.php";

//write the query to get data from users table

$sql = "SELECT * FROM user_corona";

//execute the query

$result = $db->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>View Data</title>
	 <!-- to make it looking good im using bootstrap -->
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body style="background-color: aliceblue;">
	<div class="container">
		<p>&larr; <a href="index.php">HOME</a>
		<h2 style="text-align: center;">Data Covid-19</h2>
		<br>
<table class="table">
	<thead>
		<tr>
		<th>ID</th>
		<th>LOKASI</th>
		<th>KASUS POSITIF</th>
		<th>KASUS SEMBUH</th>
		<th>KASUS MENINGGAL</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['lokasi']; ?></td>
					<td><?php echo $row['kasus_positif']; ?></td>
					<td><?php echo $row['sembuh']; ?></td>
					<td><?php echo $row['meninggal']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Update</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>