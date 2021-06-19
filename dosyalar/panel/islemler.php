<?php 
include 'inc/ayar.php';
ob_start();
session_start();

if (isset($_POST['girisYap'])) {

	$k_adi = $_POST['k_adi'];
	$sifre = $_POST['sifre'];


	if ($k_adi && $sifre) {
		$kullanicisor=$conn->prepare("SELECT * FROM admin WHERE k_adi = :mail AND sifre = :sifre");
		$kullanicisor->execute(array(
			'mail' => $k_adi,
			'sifre' => $sifre
		));

		$say=$kullanicisor->rowCount();


		if ($say > 0) {

			$_SESSION["admin_giris"] = "true";
			header("Location: index.php?durum=giris");
		} else {
			header("Location: giris.php?durum=basarisiz");
		}
	}


}














if (isset($_POST['giderEkle'])) {



	if ($_FILES['ilk_img']['size'] > 0 ) {


		$uploads_dir = '../images';
		@$tmp_name = $_FILES['ilk_img']["tmp_name"];
		$name = $_FILES['ilk_img']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2;
		$imgyol_ilk =substr($uploads_dir, 3)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");



	} else {

		$imgyol_ilk = '';
	}





	if ($_FILES['son_img']['size'] > 0  ) {


		$uploads_dir = '../images';
		@$tmp_name = $_FILES['son_img']["tmp_name"];
		$name = $_FILES['son_img']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2;
		$imgyol_son =substr($uploads_dir, 3)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");



	} else {

		$imgyol_son = '';

	}




	

	$query = $conn->prepare("INSERT INTO gider SET

		gider_adi = :gider_adi,
		gider_tutar = :gider_tutar,
		ilk_img = :ilk_img,
		son_img = :son_img,
		gider_arac_id = :gider_arac_id,
		gider_kul_id = :gider_kul_id
		");


	$insert = $query->execute(array(
		"gider_adi" => $_POST['gider_adi'],
		"gider_tutar" => $_POST['gider_tutar'],
		"ilk_img" => $imgyol_ilk,
		"son_img" => $imgyol_son,
		"gider_arac_id" => $_POST['gider_arac_id'],
		"gider_kul_id" => $_POST['gider_kul_id']


	));


	if ($insert) {
		header("Location: maliyet_gir.php?durum=basarili&id=".$_POST['gider_arac_id']);
	}else {

		header("Location: maliyet_gir.php?durum=basarisiz&id=".$_POST['gider_arac_id']);
	}



}





if (isset($_POST['kulDuzenle'])) {
	


	$query = $conn->prepare("UPDATE kullanicilar SET

		ad = :ad,
		mail = :mail
		where kul_id = :kul_id
		");


	$insert = $query->execute(array(
		"ad" => $_POST['ad'],
		"mail" => $_POST['mail'],
		"kul_id" => $_POST['kul_id']



	));


	if ($insert) {
		header("Location: kul_duzenle.php?durum=basarili&id=".$_POST['kul_id']);
	}else {

		header("Location: kul_duzenle.php?durum=basarisiz&id=".$_POST['kul_id']);
	}


}








if (isset($_POST['aracDuzenle'])) {
	


	$query = $conn->prepare("UPDATE araclar SET

		plaka = :plaka
		where arac_id = :arac_id
		");


	$insert = $query->execute(array(
		"plaka" => $_POST['plaka'],
		"arac_id" => $_POST['arac_id']




	));


	if ($insert) {
		header("Location: arac_duzenle.php?durum=basarili&id=".$_POST['arac_id']);
	}else {

		header("Location: arac_duzenle.php?durum=basarisiz&id=".$_POST['arac_id']);
	}


}



















?>