<?php
$sayfa = 'anasayfa';
 include 'site_assets/inc/header.php'; 


?>

<style type="text/css">
	.tabloResim {
		height: 150px;
		width: 150px;
		object-fit: cover;
	}


	#chart-container {
		width: 100%;
		height: auto;
	}

</style>




<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">


		<section class="py-5" >
			
			<div class="row" >

				

				<div class="col-md-2" ></div>
				<div style="display: block;" id="aylikPieChatDiv" class="col-md-4" >
					<h1 class="text-center" >Aylık Gider Grafiği</h1>
					<canvas id="myChart" width="400"  height="400"></canvas>

					<div class="text-center" >
						<button id="aylikChartDegisPie" class="btn btn-success text-center" > <i class="fa fa-sync-alt" ></i> Değiştir</button>
					</div>

				</div>




				<div style="display: none;" id="aylikBarChatDiv" class="col-md-4" >
					<h1 class="text-center" >Aylık Gider Grafiği</h1>
					<canvas id="aylikBarChat" width="400"  height="400"></canvas>
					<div class="text-center" >
						<button id="aylikChartDegisBar" class="btn btn-danger text-center" ><i class="fa fa-sync-alt" ></i> Değiştir</button>
					</div>
				</div>





				<div style="display: block;"  id="yillikPieChatDiv"  class="col-md-4" >
					<h1 class="text-center" >Yıllık Gider Grafiği</h1>
					<canvas id="yillikChart" width="400"  height="400"></canvas>
					<div class="text-center" >
						<button id="yillikChartDegisPie" class="btn btn-success text-center" > <i class="fa fa-sync-alt" ></i> Değiştir</button>
					</div>
				</div>



				



				<div style="display: none;" id="yillikBarChatDiv" class="col-md-4" >
					<h1 class="text-center" >Yıllık Gider Grafiği</h1>
					<canvas id="yillikBarChat" width="400"  height="400"></canvas>
					<div class="text-center" >
						<button id="yillikChartDegisBar" class="btn btn-danger text-center" ><i class="fa fa-sync-alt" ></i> Değiştir</button>
					</div>
				</div>



			</div>
		</section>



		<section class="py-5">
			<div class="row">

				<div class="col-md-12" >

					<div class="card">
						<div class="card-header">
							<h6 class="text-uppercase mb-0">Son Bakımlar</h6>
						</div>
						<div class="card-body">                           
							<table class="table table-striped table-hover card-text">
								<thead>
									<tr>

										<th>#</th>
										<th>Gider Adı</th>
										<th>Gider Tutar</th>
										<th>İlk Görsel</th>
										<th>Sonraki Görsel</th>
										<th>Tarih</th>
										<th>Plaka</th>


									</tr>
								</thead>
								<tbody>

									<?php 

									$veriCek=$conn->prepare("SELECT * FROM gider,araclar WHERE  gider.gider_arac_id = araclar.arac_id and araclar.kul_id ='". $_SESSION['kul_id'] . "'");
									$veriCek->execute();
									while ($row=$veriCek->fetch(PDO::FETCH_ASSOC)) { 
										


										?>


										<tr>
											<th scope="row"><?php echo $row['gider_id']; ?></th>
											<th scope="row"><?php echo $row['gider_adi']; ?></th> 
											<th scope="row"><?php echo $row['gider_tutar']; ?></th> 


											<th scope="row">
												<?php if ($row['ilk_img'] != '' ) {?>

													<a download href="<?php echo $row['ilk_img']; ?>">
														<img class="tabloResim" src="<?php echo $row['ilk_img']; ?>">
														<p>Tıkla İndir</p>
													</a>
												<?php } ?>
											</th>


											<th scope="row">
												<?php if ($row['son_img'] != '' ) {?>
													<a download href="<?php echo $row['son_img']; ?>">
														<img class="tabloResim" src="<?php echo $row['son_img']; ?>">
														<p>Tıkla İndir</p>
													</a>

												<?php } ?>
											</th>


											<th scope="row"><?php echo $row['tarih']; ?></th> 
											<th scope="row"><?php echo $row['plaka']; ?></th> 




										</tr>


									<?php } ?>


								</tbody>
							</table>
						</div>
					</div>


				</div>

			</div>
		</section>




	</div>



	<?php
	$aylıkSql = 'SELECT gider_adi, sum(gider_tutar)as gider_tutar FROM gider where tarih >= NOW() - INTERVAL 1 month and gider_kul_id = '.$_SESSION['kul_id'].' GROUP BY gider_adi';
	
	$dataGiderAdiAylik = array();
	$dataGiderTutarAylik = array();


	$veriCekAylik=$conn->prepare($aylıkSql);
	$veriCekAylik->execute();
	while ($rowAylik=$veriCekAylik->fetch(PDO::FETCH_ASSOC)) { 

		array_push($dataGiderAdiAylik, $rowAylik['gider_adi']);
		array_push($dataGiderTutarAylik, $rowAylik['gider_tutar']); 
	}




	$yillikSql = 'SELECT gider_adi, sum(gider_tutar)as gider_tutar FROM gider where tarih >= NOW() - INTERVAL 1 YEAR and gider_kul_id = '.$_SESSION['kul_id'].' GROUP BY gider_adi';
	
	$dataGiderAdiYillik = array();
	$dataGiderTutarYillik = array();


	$veriCekYillik=$conn->prepare($yillikSql);
	$veriCekYillik->execute();
	while ($rowYillik=$veriCekYillik->fetch(PDO::FETCH_ASSOC)) { 

		array_push($dataGiderAdiYillik, $rowYillik['gider_adi']);
		array_push($dataGiderTutarYillik, $rowYillik['gider_tutar']); 
	}






	?>


	<?php include 'site_assets/inc/footer.php'; ?>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script type="text/javascript">

		var ctx = document.getElementById('myChart').getContext('2d');

		var yillikChart = document.getElementById('yillikChart').getContext('2d');

		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: <?php echo json_encode($dataGiderAdiAylik); ?>,
				datasets: [{
					label: 'Tutar (₺)',
					data: <?php echo json_encode($dataGiderTutarAylik); ?>,
					backgroundColor: [
					'rgba(255, 99, 132)',
					'rgba(54, 162, 235)',
					'rgba(255, 206, 86)',
					'rgba(75, 192, 192)',
					'rgba(153, 102, 255)',
					'rgba(255, 159, 64)'
					],
					borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: false
					}
				}
			}
		});





		var yillikChart = new Chart(yillikChart, {
			type: 'pie',
			data: {
				labels: <?php echo json_encode($dataGiderAdiYillik); ?>,
				datasets: [{
					label: 'Tutar (₺)',
					data: <?php echo json_encode($dataGiderTutarYillik); ?>,
					backgroundColor: [
					'rgba(255, 99, 132)',
					'rgba(54, 162, 235)',
					'rgba(255, 206, 86)',
					'rgba(75, 192, 192)',
					'rgba(153, 102, 255)',
					'rgba(255, 159, 64)'
					],
					borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: false
					}
				}
			}
		});
	</script>






	<script type="text/javascript">

		var aylikBarChat = document.getElementById('aylikBarChat').getContext('2d');

		var yillikBarChat = document.getElementById('yillikBarChat').getContext('2d');

		var aylikBarChat = new Chart(aylikBarChat, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($dataGiderAdiAylik); ?>,
				datasets: [{
					label: 'Tutar (₺)',
					data: <?php echo json_encode($dataGiderTutarAylik); ?>,
					backgroundColor: [
					'rgba(255, 99, 132)',
					'rgba(54, 162, 235)',
					'rgba(255, 206, 86)',
					'rgba(75, 192, 192)',
					'rgba(153, 102, 255)',
					'rgba(255, 159, 64)'
					],
					borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			}

		});





		var yillikBarChat = new Chart(yillikBarChat, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($dataGiderAdiYillik); ?>,
				datasets: [{
					label: 'Tutar (₺)',
					data: <?php echo json_encode($dataGiderTutarYillik); ?>,
					backgroundColor: [
					'rgba(255, 99, 132)',
					'rgba(54, 162, 235)',
					'rgba(255, 206, 86)',
					'rgba(75, 192, 192)',
					'rgba(153, 102, 255)',
					'rgba(255, 159, 64)'
					],
					borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			}
		});
	</script>



	<script type="text/javascript">



		$( document ).ready(function() {

			$('#aylikChartDegisPie').click(function(){
				$('#aylikBarChatDiv').fadeIn(1);
				$('#aylikPieChatDiv').fadeOut(1);
			});

			$('#aylikChartDegisBar').click(function(){
				$('#aylikBarChatDiv').fadeOut(1);
				$('#aylikPieChatDiv').fadeIn(1);
			});






			$('#yillikChartDegisPie').click(function(){
				$('#yillikBarChatDiv').fadeIn(1);
				$('#yillikPieChatDiv').fadeOut(1);
			});

			$('#yillikChartDegisBar').click(function(){
				$('#yillikBarChatDiv').fadeOut(1);
				$('#yillikPieChatDiv').fadeIn(1);
			});






		});

	</script>