


</div>
</div>





<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper.js/umd/popper.min.js"> </script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="js/charts-home.js"></script>
<script src="js/front.js"></script>




<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">





<?php if (@$_GET['durum'] == "basarili") { ?>

  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,

    })

    Toast.fire({
      icon: 'success',
      title: 'İşlem Başarılı'
    })

  </script>

<?php } ?>









<?php if (@$_GET['durum'] == "giris") { ?>

  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,

    })

    Toast.fire({
      icon: 'success',
      title: 'Giriş Başarılı'
    })

  </script>

<?php } ?>



<?php if (@$_GET['durum'] == "basarisiz") { ?>

  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,

    })

    Toast.fire({
      icon: 'error',
      title: 'İşlem Başarısız'
    })

  </script>

<?php } ?>





</body>
</html>