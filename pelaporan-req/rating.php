<?php 

include 'koneksi.php';

$users = mysqli_query($conn, "SELECT count(ktp_lap) as countUser FROM tb_user");
$user = mysqli_fetch_array($users);

$rating = mysqli_query($conn, "SELECT count(id_rate) as countRate FROM tb_rating");
$rate = mysqli_fetch_array($rating);

$ratingByid = mysqli_query($conn, "SELECT sum(rating) as sumRate, kd_kat from tb_rating group by kd_kat");


while ($countRating = mysqli_fetch_array($ratingByid)) {
	echo $hasil = $countRating['sumRate'] / $user['countUser'];
}