<?php 
$sayfa = 'kullanicilar';
include 'inc/header.php'; 

$bilgiVeri = $conn->query('SELECT * FROM kullanicilar where kul_id = ' . $_GET['id'])->fetch(PDO::FETCH_ASSOC);

?>



<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">






    <section class="py-5">
      <div class="row">

        <div class="col-lg-12 mb-4">
          <div class="card">
            <div class="card-header">
              <h6 class="text-uppercase mb-0">Kullanıcı Düzenle</h6>
            </div>
            <div class="card-body">


              <p>Bu kısımdan kullaniciyi düzenleyebilirsiniz.</p>
              <form method="POST" action="islemler.php" enctype="multipart/form-data">
                <input type="hidden" name="kul_id" value="<?php echo $_GET['id']; ?>">

                <div class="row" >

                  <div class="col-md-6" >
                    <label>Kullanıcı Adı</label>
                    <input required="" type="text" class="form-control" name="ad" placeholder="Kullanıcı Adı ve Soyadı" value="<?php echo $bilgiVeri['ad']; ?>">
                  </div>


                   <div class="col-md-6" >
                    <label>E-Posta Adresi</label>
                    <input required="" type="text" class="form-control" name="mail" placeholder="E-Posta Adresi" value="<?php echo $bilgiVeri['mail']; ?>">
                  </div>



                  <div class="col-md-6 mt-3" >
                    <button name="kulDuzenle" class="btn btn-primary" >Güncelle</button>
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

