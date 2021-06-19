<?php 
$sayfa = 'kullanicilar';
include 'inc/header.php'; 




?>



<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">






    <section class="py-5">
      <div class="row">

        <div class="col-lg-12 mb-4">
          <div class="card">
            <div class="card-header">
              <h6 class="text-uppercase mb-0">Kullanıcı LİSTESİ</h6>
            </div>
            <div class="card-body">                           
              <table class="table table-striped table-hover card-text">
                <thead>
                  <tr>

                    <th>#</th>
                    <th>İsim ve Soyisim</th>
                    <th>Mail</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                    <th style="width: 50px;">Araçlarını Gör</th>


                  </tr>
                </thead>
                <tbody>

                  <?php 

                  $veriCek=$conn->prepare("SELECT * FROM kullanicilar
                    ");
                  $veriCek->execute();
                  while ($row=$veriCek->fetch(PDO::FETCH_ASSOC)) {  ?>


                    <tr>
                      <th scope="row"><?php echo $row['kul_id']; ?></th>
                      <th scope="row"><?php echo $row['ad']; ?></th> 
                      <th scope="row"><?php echo $row['mail']; ?></th> 


                      <th> <a href="kul_duzenle.php?id=<?php echo $row['kul_id']; ?>" class="btn btn-primary btn-sm">Düzenle</a> </th>

                      <th>   <button value="<?php echo $row['kul_id']; ?>" islem="kulSil"  class="btn btn-danger btn-sm btn-kul-sil"> <i class="fa fa-trash"></i> </button>  </th>




                      <th> <a href="araclari_gor.php?id=<?php echo $row['kul_id']; ?>" class="btn btn-primary">Araçları Gör</a> </th>

                    
                    

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

      $(".btn-kul-sil").click(function(e) {

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
              url: "ajax/kullanici_sil.php",
              data: { 
                islem: $(this).attr("islem"),
            id: $(this).val(), 
          },
          success: function(result) {
            swal("Silme İşlemi Başarılı", {
              icon: "success",
            }).then((result) => {
              window.location="kullanicilar.php";});



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

