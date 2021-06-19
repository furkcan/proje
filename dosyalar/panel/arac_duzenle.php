<?php 
$sayfa = 'araclar';
include 'inc/header.php'; 

$bilgiVeri = $conn->query('SELECT * FROM araclar where arac_id = ' . $_GET['id'])->fetch(PDO::FETCH_ASSOC);
              
               ?>



<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">






    <section class="py-5">
      <div class="row">

        <div class="col-lg-12 mb-4">
          <div class="card">
            <div class="card-header">
              <h6 class="text-uppercase mb-0">Araç Düzenle</h6>
            </div>
            <div class="card-body">


              <p>Bu kısımdan aracı düzenleyebilirsiniz.</p>
              <form method="POST" action="islemler.php" enctype="multipart/form-data">
                <input type="hidden" name="arac_id" value="<?php echo $_GET['id']; ?>">

                <div class="row" >

                  <div class="col-md-6" >
                    <label>Plaka</label>
                    <input required="" type="text" class="form-control" name="plaka" placeholder="Kullanıcı Adı ve Soyadı" value="<?php echo $bilgiVeri['plaka']; ?>">
                  </div>




                </div>
                <button name="aracDuzenle" class="btn btn-primary mt-3" >Güncelle</button> 


              </form>



            </div>
          </div>
        </div>

      </div>
    </section>




  </div>



  <?php include 'inc/footer.php'; ?>

