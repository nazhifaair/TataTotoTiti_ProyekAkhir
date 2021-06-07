<?php 
include "config.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$id=$_POST['id'];
		$lokasi= $_POST['lokasi'];
		$kasus_positif = $_POST['kasus_positif'];
		$sembuh = $_POST['sembuh'];
		$meninggal = $_POST['meninggal'];

		// write the update query
		$sql = "UPDATE `user_corona` SET `lokasi`='$lokasi',`kasus_positif`='$kasus_positif',`sembuh`='$sembuh',`meninggal`='$meninggal' WHERE `id`='$id'";

		// execute the query
		$result = $db->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $db->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `user_corona` WHERE `id`='$id'";

	//Execute the sql
	$result = $db->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$lokasi = $row['lokasi'];
			$kasus_positif = $row['kasus_positif'];
			$sembuh = $row['sembuh'];
			$meninggal  = $row['meninggal'];
		
			$id = $row['id'];
		}

	?>

		
<style>
	body{
		background-color: #157C8C40;
	}
	.inp{
		width: 300px;
		height: 40px;
	}
</style>
	
	
		<h2 style="font-size: 50px">Data Update Form</h2>
		<form action="" method="post">
		  <fieldset>
		    <legend style="font-size: 30px;">Update Data Covid-19:</legend>
		    <label style="font-size: 30px;">Lokasi:<br></label>
		    <input class="inp" type="text" name="lokasi" value="<?php echo $lokasi; ?>">
		    <input type="hidden" name="id" value="<?php echo $id; ?>">
		    <br>
		    <label style="font-size: 30px;">Kasus Positif:<br></label>
		    <input class="inp" type="text" name="kasus_positif" value="<?php echo $kasus_positif; ?>">
		    <br>
		    <label style="font-size: 30px;">Kasus Sembuh:<br></label>
		    <input class="inp" type="text" name="sembuh" value="<?php echo $sembuh; ?>">
		    <br>
		    <label style="font-size: 30px;">Kasus Meninggal:<br></label>
		    <input class="inp" type="text" name="meninggal" value="<?php echo $meninggal; ?>">
		    <br>
		   	<br>
		    <input class="inp" type="submit" value="Update" name="update">
		    <a href="view.php" class="inp">Back</a>

		  </fieldset>
		</form>

		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>