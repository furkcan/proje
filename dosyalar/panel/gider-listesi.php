<?php 

$sayfa = 'gider';
include 'inc/header.php'; 


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

        <div class="col-lg-12 mb-4">
          <div class="card">
            <div class="card-header">
              <h6 class="text-uppercase mb-0">GİDER LİSTESİ</h6>
            </div>
            <div class="card-body">                           
              <table class="table table-striped table-hover card-text">
                <thead>
                  <tr>

                    <th>#</th>
                    <th>Plaka</th>
                    <th>Sahibi</th>
                    <th>Gider Adı</th>
                    <th>İlk Hali</th>
                    <th>Son Hali </th>
                    <th>Tarih</th>
                    <th>Sil</th>


                  </tr>
                </thead>
                <tbody>

                  <?php 

                  $veriCek=$conn->prepare("SELECT * FROM gider,araclar,kullanicilar
                    WHERE gider.gider_arac_id=araclar.arac_id and 
                    kullanicilar.kul_id = araclar.kul_id
                    ");
                  $veriCek->execute();
                  while ($row=$veriCek->fetch(PDO::FETCH_ASSOC)) {  ?>


                    <tr>
                      <th scope="row"><?php echo $row['gider_id']; ?></th>
                      <th scope="row"><?php echo $row['plaka']; ?></th>
                      <th scope="row"><?php echo $row['ad']; ?></th>
                      <th scope="row"><?php echo $row['gider_adi']; ?></th>

                      <th scope="row">


                        <?php if ($row['ilk_img'] != '' ) {?>

                          <a download href="../<?php echo $row['ilk_img']; ?>">
                            <img class="tabloResim" src="../<?php echo $row['ilk_img']; ?>">
                            <p>Tıkla İndir</p>
                          </a>
                        <?php } ?>

                        
                      </th>


                      <th scope="row">

                        <?php if ($row['son_img'] != '' ) {?>
                          <a download href="../<?php echo $row['son_img']; ?>">
                            <img class="tabloResim" src="../<?php echo $row['son_img']; ?>">
                            <p>Tıkla İndir</p>
                          </a>

                        <?php } ?>
                        
                      </th>


                      <th scope="row"><?php echo $row['tarih']; ?></th>

                      <th>   <button value="<?php echo $row['gider_id']; ?>" islem="giderSil"  class="btn btn-danger btn-sm btn-gider-sil"> <i class="fa fa-trash"></i> </button>  </th>


                      
                      

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

   <script src="sweetalert.min.js"></script>
    <script type="text/javascript">

      $(".btn-gider-sil").click(function(e) {

        swal({
          title: "Silme İşlemi",
          text: "Silinen kayıtlar geri alınmaz silmek istediğinize emin misiniz?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          buttons: ["Hayır Silme", "Evet Sil!"],

        })
        .then((willDelete) => {
          if (willDelete) {

            e.preventDefault();
            $.ajax({
              type: "POST",
              url: "ajax/gider_sil.php",
              data: { 
                islem: $(this).attr("islem"),
            id: $(this).val(), 
          },
          success: function(result) {
            swal("Silme İşlemi Başarılı", {
              icon: "success",
            }).then((result) => {
              window.location="gider-listesi.php";});



          },
          error: function(result) {
            swal("Hata Silinmedi.", {
              icon: "success",
            });
          }
        });



          } else {
            swal("Silme İşlemi İptal Edildi.", {
              icon: "error",
            });
          }
        });


      });



    </script> 
