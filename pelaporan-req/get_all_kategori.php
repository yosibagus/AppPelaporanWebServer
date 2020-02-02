<?php 

include 'koneksi.php';
$kategori = array();

$kategori["error"] = false;
$kategori["message"] = "Berhasil mendapatkan data kategori";

// $sql = "SELECT * FROM tb_kategori";
// $res = mysqli_query($conn,$sql);
// while($row = mysqli_fetch_array($res)){
// 	$kategori['kategori'][] = array(
// 		'kd_kat' => $row['kd_kat'],
// 		'nm_kat' => $row['nm_kat'],
// 		'img_kat' => $row['img_kat']
// 	);
// }

//untuk rating
$users = mysqli_query($conn, "SELECT count(ktp_lap) as countUser FROM tb_user");
$user = mysqli_fetch_array($users);

$rating = mysqli_query($conn, "SELECT count(id_rate) as countRate FROM tb_rating");
$rate = mysqli_fetch_array($rating);

$ratingByid = mysqli_query($conn, "SELECT *, sum(tb_rating.rating) as sumRate from tb_rating join tb_kategori on tb_rating.kd_kat = tb_kategori.kd_kat group by tb_rating.kd_kat");


while($countRating = mysqli_fetch_array($ratingByid)){
	$hasil = $countRating['sumRate'] / $user['countUser'];
	$kategori['kategori'][] = array(
			'kd_kat' => $countRating['kd_kat'],
			'nm_kat' => $countRating['nm_kat'],
			'img_kat' => $countRating['img_kat'],
            'rating' => substr($hasil, 0,3)
     );
}


echo json_encode($kategori);