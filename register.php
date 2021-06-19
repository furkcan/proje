<!DOCTYPE html>
<html lang="tr">

<head>
	<title>Kayıt Ol</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="login_assets/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="login_assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="login_assets/css/main.css">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="login_assets/images/img-01.png" alt="IMG">
				</div>

				<form method="POST" action="islemler.php" class="login100-form validate-form">
					<span class="login100-form-title">
						Kayıt Ol
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Lütfen bir email giriniz">
						<input class="input100" type="text" name="mail" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Lütfen adınızı giriniz">
						<input class="input100" type="text" name="ad" placeholder="Adınız ve Soyadınız">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>




					<div class="wrap-input100 validate-input" data-validate = "Şifre Gerekli">
						<input class="input100" type="password" name="kul_sifre" placeholder="Şifre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Şifre Gerekli">
						<input class="input100" type="password" name="kul_sifreTekrar" placeholder="Şifre Tekrar">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>


					<div class="container-login100-form-btn">
						<button name="kayitOl" type="submit" class="login100-form-btn">
							Kayıt Ol
						</button>
					</div>



					<div class="text-center p-t-136">
						<a class="txt2" href="login.php">
							GİRİŞ YAP
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




	<script src="login_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="login_assets/vendor/bootstrap/js/popper.js"></script>
	<script src="login_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="login_assets/vendor/select2/select2.min.js"></script>
	<script src="login_assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="login_assets/js/main.js"></script>


	<?php include 'footer.php'; ?>

</body>
</html>
