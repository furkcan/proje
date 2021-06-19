
<?php

try {

	include '../inc/ayar.php';
	$id = $_POST['id'];
	$sonuc = $conn->exec("DELETE FROM araclar  WHERE arac_id = '$id'");

	if ($sonuc > 0) {
			echo "ok";
	} else {
		

	}

} catch (PDOException $e) {
	die($e->getMessage());
}

$conn = null;

?>