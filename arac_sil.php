<?php 
include 'site_assets/inc/giris-kontrol.php';
include 'panel/inc/ayar.php'; 

try {

	$arac_id = $_GET['id'];

	#DBden silme işlemi
	$sonuc = $conn->exec("DELETE FROM araclar WHERE arac_id = '$arac_id'");

	if ($sonuc > 0) {
		header("location:araclar.php?durum=basarili");
	} else {

		header("location:araclar.php?durum=basarisiz");
	}

} catch (PDOException $e) {
	die($e->getMessage());
}

$conn = null;

?>