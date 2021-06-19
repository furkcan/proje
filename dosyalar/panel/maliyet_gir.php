<?php 
$sayfa = 'araclar';
include 'inc/header.php'; 

$id = $_GET['id'];


$veri = $conn->query('SELECT * FROM araclar,kullanicilar
	WHERE araclar.kul_id=kullanicilar.kul_id and araclar.arac_id = ' . $id)->fetch(PDO::FETCH_ASSOC);



	?>

	<style type="text/css">
		.card-header span {
			font-weight: bold;
		}
	</style>


	<div class="page-holder w-100 d-flex flex-wrap">
		<div class="container-fluid px-xl-5">



			<section class="py-5">
				<div class="row">


					<div class="col-md-12" >
						<div class="card">
							<div class="card-header">
								<h3 class="text-uppercase mb-0">MALİYET EKLE</h3><br>

								<h4>Araç Sahibi Bilgileri</h4>
								<p><span>Adı: </span><?php echo $veri['ad']; ?></p>

								<p><span>Plaka: </span><?php echo $veri['plaka']; ?></p>

								<p><span>Mail: </span><?php echo $veri['mail']; ?></p>

							</div>
							<div class="card-body">
								<p>Bu kısımdan maliyet ekleyebilirsiniz.</p>
								<form method="POST" action="islemler.php" enctype="multipart/form-data">
									<input type="hidden" name="gider_arac_id" value="<?php echo $id; ?>">

									<input type="hidden" name="gider_kul_id" value="<?php echo $veri['kul_id']; ?>">



									<div class="row" >


										<div class="col-md-12 mb-3" >
											<button id="yakitButton" class="btn btn-success" ><i class="fa fa-gas-pump" ></i> Yakıt Gideri</button>
											<button id="vergiButton" class="btn btn-danger" ><i class="fa fa-money-bill-alt" ></i> Vergi Gideri</button>
											<button id="digerButton" class="btn btn-primary"><i class="fa fa-lira-sign" ></i> Diğer Gider</button>
										</div>

										<div class="col-md-6 mb-3" >
											<label>Gider Adı</label>
											<input id="giderAdiInput" required="" type="text" class="form-control" name="gider_adi" placeholder="Gider Adı Giriniz">
										</div>

										<div class="col-md-6 mb-3" >
											<label>Gider Tutarı</label>
											<input id="giderAdiTutari" required="" type="text" class="form-control" name="gider_tutar" placeholder="Gider Tutarı Giriniz">
										</div>


										<div class="col-md-6 mb-3" >
											<label id="ilkGorselLabel">İlk Hali</label>
											<input id="ilkGorsel" type="file" class="form-control" name="ilk_img">
										</div>


										<div id="sonGorselDiv" class="col-md-6 mb-3" >
											<label id="sonGorselLabel">Son Hali</label>
											<input id="sonGorsel" type="file" class="form-control" name="son_img">
										</div>




										<div class="col-md-12" >
											<button name="giderEkle" class="btn btn-primary btn-block" >Ekle</button>
										</div>


									</div>



								</form>
							</div>
						</div>
					</div>




				</div>








			</section>




		</div>



		<?php include 'inc/footer.php'; ?>


		<script type="text/javascript">
			

			$(document).ready(function() {
				$('#yakitButton').click(function(){
					
					$('#giderAdiInput').val('Yakıt Gideri');
					$('#giderAdiInput').attr('readonly','true');

					$('#ilkGorselLabel').html('Varsa Yakıt Fişi');

					$('#sonGorselDiv').fadeOut(500);

					return false;

				})



				$('#vergiButton').click(function(){
					
					$('#giderAdiInput').val('Vergi Gideri');
					$('#giderAdiInput').attr('readonly','true');

					$('#ilkGorselLabel').html('Varsa Dekont');

					$('#sonGorselDiv').fadeOut(500);
					return false;

				})



				$('#digerButton').click(function(){
					
					$('#giderAdiInput').val('');
					$('#giderAdiInput').removeAttr('readonly');

					$('#ilkGorselLabel').html('İlk Görsel');

					$('#sonGorselDiv').fadeIn(500);


					return false;

				})


			});

		</script>