<?php 
include "config.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$lokasi= $_POST['lokasi'];
		$kasus_positif = $_POST['kasus_positif'];
		$sembuh = $_POST['sembuh'];
		$meninggal = $_POST['meninggal'];
		

		//write sql query

		$sql = "INSERT INTO `user_corona`(`lokasi`, `kasus_positif`, `sembuh`, `meninggal`) VALUES ('$lokasi','$kasus_positif','$sembuh','$meninggal')";

		// execute the query

		$result = $db->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $db->error;
		}

		$db->close();


     /** menyiapkan query
    $sql = "INSERT INTO users (lokasi, kasus_positif, sembuh, meninggal) 
            VALUES (:lokasi, :kasus_positif, :sembuh, :meninggal)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(

        ":lokasi" => $lokasi,
        ":kasus_positif" => $kasus_positif,
        ":sembuh" => $sembuh,
        ":meninggal" => $meninggal
    );

    // eksekusi query untuk menyimpan ke database
    $save = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($save) header("Location: view.php");*/

	}



?>

<!DOCTYPE html>
<html>

<body>
<style>
  body{
    background-color: #157C8C40;
  }
  .inp{
    width: 300px;
    height: 40px;
  }
  .sub{
    width: 150px;
    height: 40px;
    font-size: 20px;
  }
</style>
  
<h2 style="font-size: 50px">Penampil Data Covid-19</h2>

<form action="" method="POST">
  <fieldset>
    <legend style="font-size: 30px;">Pengisian Data:</legend>
     <label style="font-size: 30px;">Lokasi:<br></label>
    <input class="inp" type="text" name="lokasi">
    <br>
     <label style="font-size: 30px;">Kasus Positif:<br></label>
    <input class="inp" type="text" name="kasus_positif">
    <br>
     <label style="font-size: 30px;">Kasus Sembuh:<br></label>
    <input class="inp" type="text" name="sembuh">
    <br>
     <label style="font-size: 30px;">Kasus Meninggal:<br></label>
    <input class="inp" type="text" name="meninggal">
    <br>
    <br>
    <input class="sub" type="submit" name="submit" value="submit"
     >
  </fieldset>
</form>

</body>
</html>