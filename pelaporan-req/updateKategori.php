<?php 

include 'koneksi.php';

if ($conn) {
	$rating = $_POST['rating'];
	$kritiksaran = $_POST['kritiksaran'];
	$kategoriId = $_POST['kategoriId'];
	$ktp = $_POST['ktp'];
	$kdLap = $_POST['laporanId'];

	$insert = mysqli_query($conn, "INSERT INTO tb_rating values (null, '$kdLap', '$ktp', '$kategoriId', '$rating', '$kritiksaran')");

	if ($insert) {
		echo json_encode("behasil disimpan");
	}
}