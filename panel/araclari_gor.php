<?php 

$sayfa = 'araclar';
include 'inc/header.php'; 


?>



<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">






    <section class="py-5">
      <div class="row">

        <div class="col-lg-12 mb-4">
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
                    <th>Sahibi</th>
                    <th style="width: 50px;">Maliyet Gir</th>


                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $id = $_GET['id'];
                  $veriCek=$conn->prepare("SELECT * FROM araclar,kullanicilar
                    WHERE araclar.kul_id=kullanicilar.kul_id and araclar.kul_id = '$id'
                    ");
                  $veriCek->execute();
                  while ($row=$veriCek->fetch(PDO::FETCH_ASSOC)) {  ?>


                    <tr>
                      <th scope="row"><?php echo $row['arac_id']; ?></th>
                      <th scope="row"><?php echo $row['plaka']; ?></th> 
                      <th scope="row"><?php echo $row['ad']; ?></th> 

                      <th> <a href="maliyet_gir.php?id=<?php echo $row['arac_id']; ?>" class="btn btn-primary">Maliyet Gir (₺)</a> </th>

                    
                    

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



  <?php include 'inc/footer.php'; ?>