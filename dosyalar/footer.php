


<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<?php if (@$_GET['durum'] == "yeniKayit") { ?>

  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: false,
      position: 'center',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,

    })

    Toast.fire({
      icon: 'success',
      title: 'Kayıt işleminiz başarıyla gerçekleştirildi. Giriş yapabilirsiniz'
    })

  </script>

<?php } ?>




<?php if (@$_GET['durum'] == "sifreHata") { ?>

  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: false,
      position: 'center',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,

    })

    Toast.fire({
      icon: 'error',
      title: 'İşlem Başarısız, Lütfen şifreyi kontrol ediniz.'
    })

  </script>

<?php } ?>




<?php if (@$_GET['durum'] == "basarili") { ?>

  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: false,
      position: 'center',
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







<?php if (@$_GET['durum'] == "basarisiz") { ?>

  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: false,
      position: 'center',
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

