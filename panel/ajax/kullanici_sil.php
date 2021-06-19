
<?php

try {

	include '../inc/ayar.php';
	$id = $_POST['id'];
	$sonuc = $conn->exec("DELETE FROM kullanicilar  WHERE kul_id = '$id'");

	if ($sonuc > 0) {
			echo "ok";
	} else {
		

	}

} catch (PDOException $e) {
	die($e->getMessage());
}

$conn = null;

?>