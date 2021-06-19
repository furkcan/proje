<?php
$sayfa = 'araclar';
 include 'site_assets/inc/header.php'; 


?>

<style type="text/css">
  .tabloResim {
    height: 150px;
    width: 150px;
    object-fit: cover;
  }
</style>

<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">



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
                  $veriCek=$conn->prepare("SELECT * FROM gider,araclar WHERE  gider.gider_arac_id = araclar.arac_id and gider.gider_arac_id ='". $_GET['id'] . "'");
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



	<?php include 'site_assets/inc/footer.php'; ?>