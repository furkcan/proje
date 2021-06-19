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

                    <th>Düzenle</th>
                    <th>Sil</th>

                    <th style="width: 50px;">Maliyet Gir</th>


                  </tr>
                </thead>
                <tbody>

                  <?php 

                  $veriCek=$conn->prepare("SELECT * FROM araclar,kullanicilar
                    WHERE araclar.kul_id=kullanicilar.kul_id
                    ");
                  $veriCek->execute();
                  while ($row=$veriCek->fetch(PDO::FETCH_ASSOC)) {  ?>


                    <tr>
                      <th scope="row"><?php echo $row['arac_id']; ?></th>
                      <th scope="row"><?php echo $row['plaka']; ?></th> 
                      <th scope="row"><?php echo $row['ad']; ?></th> 



                      <th> <a href="arac_duzenle.php?id=<?php echo $row['arac_id']; ?>" class="btn btn-primary btn-sm">Düzenle</a> </th>

                      <th>   <button value="<?php echo $row['arac_id']; ?>" islem="aracSil"  class="btn btn-danger btn-sm btn-arac-sil"> <i class="fa fa-trash"></i> </button>  </th>



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




    <script src="sweetalert.min.js"></script>
    <script type="text/javascript">

      $(".btn-arac-sil").click(function(e) {

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
              url: "ajax/arac_sil.php",
              data: { 
                islem: $(this).attr("islem"),
            id: $(this).val(), // < note use of 'this' here
          },
          success: function(result) {
            swal("Silme İşlemi Başarılı", {
              icon: "success",
            }).then((result) => {
              window.location="araclar.php";});



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

