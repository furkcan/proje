<?php 

include 'panel/inc/ayar.php';

ob_start();
session_start();

if (isset($_POST['kayitOl'])) {



	if ($_POST['kul_sifre'] == $_POST['kul_sifreTekrar']) {
	//Şifre Eşleşiyorsa

		$kayitSql = $conn->prepare("INSERT INTO kullanicilar SET
			ad = :ad,
			kul_sifre = :kul_sifre,
			mail = :mail");

		$insert = $kayitSql->execute(array(
			"ad" => $_POST['ad'],
			"kul_sifre" => $_POST['kul_sifre'],
			"mail" => $_POST['mail']
		));



		if ($insert){
			header("Location: login.php?durum=yeniKayit"); 

		} else {

			header("Location: login.php?durum=basarisiz");

		}
	}else {
		header("Location: register.php?durum=sifreHata");
	}



}





if (isset($_POST['girisYap'])) {




	$mail = $_POST['mail'];
	$kul_sifre = $_POST['kul_sifre'];


	if ($mail && $kul_sifre) {
		$kullanicisor=$conn->prepare("SELECT * FROM kullanicilar WHERE mail = :mail AND kul_sifre = :kul_sifre");
		$kullanicisor->execute(array(
			'mail' => $mail,
			'kul_sifre' => $kul_sifre
		));

		$say=$kullanicisor->rowCount();



		if ($say > 0) {


			$veri = $conn->query("SELECT * FROM kullanicilar WHERE mail = '$mail' " )->fetch(PDO::FETCH_ASSOC);
			$kul_id = $veri['kul_id'];


			$_SESSION["kul_giris"] = "true";
			$_SESSION["kul_mail"] = $mail;
			$_SESSION["kul_id"] = $kul_id;


			header("Location: index.php?durum=giris");
		} else {
			header("Location: login.php?durum=basarisiz");
		}
	}





}







if (isset($_POST['plakaEkle'])) {


		$kayitSql = $conn->prepare("INSERT INTO araclar SET
			plaka = :plaka,
			kul_id = :kul_id
			");

		$insert = $kayitSql->execute(array(
			"plaka" => $_POST['plaka'],
			"kul_id" => $_POST['kul_id']

		));



		if ($insert){
			header("Location: araclar.php?durum=basarili"); 

		} else {

			header("Location: araclar.php?durum=basarisiz");

		}
	



}



?>