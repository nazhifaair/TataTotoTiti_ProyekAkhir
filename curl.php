<?php


//Buat Fungsi http_request
function http_request($url){
	//persiapkan CURL
	$ch = curl_init();

	//set Url
	curl_setopt($ch, CURLOPT_URL, $url);

	//aktifkan fungsi transfer nilai yang berupa string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	//Setting agar dapat dijalankan
	//mematikan ssl verify(https)

	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	//tampung hasil ke dalam variabel $output
	$output = curl_exec($ch);

	//tutup curl
	curl_close($ch);

	//mengembalikkan hasil output
	return $output;

}

//panggil fungsi http_request(url)
$data = http_request("https://api.kawalcorona.com/indonesia/provinsi/");

//ubah format json
$data = json_decode($data, TRUE);

echo "<pre>";
	print_r($data);
echo "</pre>";

?>