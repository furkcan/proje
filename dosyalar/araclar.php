<?php
$sayfa = 'araclar';
 include 'site_assets/inc/header.php'; 


?>



<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">



		<section class="py-5">
			<div class="row">


				<div class="col-md-12" >
					<div class="card">
						<div class="card-header">
							<h3 class="h6 text-uppercase mb-0">YENİ ARAÇ EKLE</h3>
						</div>
						<div class="card-body">
							<p>Bu kısımdan yeni araç ekleyebilirsiniz.</p>
							<form method="POST" action="islemler.php" enctype="multipart/form-data">
								<input type="hidden" name="kul_id" value="<?php echo $_SESSION['kul_id']; ?>">

								<div class="row" >
									<div class="col-md-6" >
										<input required="" type="text" class="form-control" name="plaka" placeholder="Plaka Giriniz">
									</div>

									<div class="col-md-6" >
										<button name="plakaEkle" class="btn btn-primary btn-block" >Ekle</button>
									</div>
								</div>



							</form>
						</div>
					</div>
				</div>





        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header">
              <h6 class="text-uppercase mb-0">ARAÇ LİSTESİ</h6>
            </div>
            <div class="card-body">                           
              <table class="table table-striped table-hover card-text">
                <thead>
                  <tr>

                    <th>#</th>
                    <th>Plaka</th>
                    <th style="width: 100px;">İncele</th>
                    <th style="width: 50px;">Sil</th>


                  </tr>
                </thead>
                <tbody>

                  <?php 

                  $veriCek=$conn->prepare("SELECT * FROM araclar WHERE kul_id ='". $_SESSION['kul_id'] . "'");
                  $veriCek->execute();
                  while ($row=$veriCek->fetch(PDO::FETCH_ASSOC)) {  ?>


                    <tr>
                      <th scope="row"><?php echo $row['arac_id']; ?></th>
                      <th scope="row"><?php echo $row['plaka']; ?></th> 

                      <th> <a href="bakim_detay.php?id=<?php echo $row['arac_id']; ?>" class="btn btn-primary">
                      	<i class="fa fa-search" > </i> İncele</a> </th>

                      <th> <a href="arac_sil.php?id=<?php echo $row['arac_id']; ?>" class="btn btn-danger">
                      	<i class="fa fa-trash" > </i></a> </th>

                    

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



	<?php include 'site_assets/inc/footer.php'; ?>