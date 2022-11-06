<?php

  use App\Modelo\Config;

  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();

  if(isset($_SESSION['role_id'])) {
    setcookie($_SESSION['role_id'],"role_id",time() + 120);
  } else {
    if (isset($_SERVER['HTTP_COOKIE'])) {
      $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
      foreach($cookies as $cookie) {
          $parts = explode('=', $cookie);
          $name = trim($parts[0]);
          setcookie($name, '', time()-1000);
          setcookie($name, '', time()-1000, '/');
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistemas Control de Donaciones | Dashboard</title>
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/Visual-Password-Strength-Indicator/passtrength.css" media="screen" title="no title">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet"  href="<?php echo $rutaServer; ?>/vista/dist/css/stepbystep.css">
    <link rel="stylesheet"  href="<?php echo $rutaServer; ?>/vista/dist/css/personalizados.css">
    <link href="<?php echo $rutaServer; ?>/favicon.png" rel="icon" type="image/png" />
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini <?php echo !isset($_SESSION['validarSesion']) /*|| ($_SESSION['password_change_required'] == 1)*/ ? "login-page" : ""; ?>">

    <?php

        if(isset($_SESSION['validarSesion']) && $_SESSION['validarSesion'] === 'ok') {
            
            echo '<div class="wrapper">';

            /*=============================================
            CABEZOTE
            =============================================*/ 

            include "modulos/cabecera.view.php";

            /*=============================================
            LATERAL
            =============================================*/ 

            include "modulos/lateral.view.php";

            /*=============================================
            CONTENIDO
            =============================================*/
            
            if(isset($_GET['ruta'])) {
              
              $url = explode("/", $_GET["ruta"]);
              $ruta = $url[0];

              if($ruta === "inicio" || $ruta === "salir" || $ruta === "agregar-entrada"
                || $ruta === "agregar-producto" || $ruta === "listar-productos" || $ruta === "agregar-persona"
                || $ruta === "listar-personas" || $ruta === "agregar-salida" || $ruta === "listar-salidas"
                || $ruta === "listar-entradas" || $ruta === "listar-usuarios" || $ruta === "nuevo-usuario"
                || $ruta === "agregar-empresa" || $ruta === "editar-empresa" || $ruta === "descarga"
                || $ruta === "listar-empresas" || $ruta === "editar-persona" || $ruta === "editar-usuario"
                || $ruta === "recibir-donacion") {

                include "modulos/".$ruta.".php";

              }

            } else {

              echo '<script> window.location="inicio"</script>';

            }
            
            /*=============================================
            LATERAL
            =============================================*/ 

            include "modulos/footer.view.php";

            echo '</div>';


        }  else {

            include("modulos/login.php");

        }

        //session_destroy();
    ?>

    <!-- REQUIRED JS SCRIPTS -->

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="<?php echo $rutaServer; ?>/vista/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo $rutaServer; ?>/vista/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo $rutaServer; ?>/vista/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
    </script>
    <!-- Password Strength -->
    <script type="text/javascript" src="<?php echo $rutaServer; ?>/vista/bower_components/Visual-Password-Strength-Indicator/jquery.passtrength.js"></script>
    <script type="text/javascript">
      $('#password').passtrength({
        minChars: 4,
        passwordToggle: true,
        tooltip: true
      });
    </script>
    <script src="<?php echo $rutaServer; ?>/vista/plugins/input-mask/jquery.maskMoney.js"></script>
    <script src="<?php echo $rutaServer; ?>/vista/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo $rutaServer; ?>/vista/plugins/input-mask/jquery.inputmask.numeric.extensions.js"></script>
    <script src="<?php echo $rutaServer; ?>/vista/plugins/input-mask/jquery.inputmask.phone.extensions.js"></script>
    <script src="<?php echo $rutaServer; ?>/vista/plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('#tListarPersonas').DataTable();
          $('#tListarEmpresas').DataTable();
          $(function() {
            $(".money").maskMoney();
          })
      } );      
    </script>
    <script src="<?php echo $rutaServer; ?>/vista/bower_components/chart.js/Chart.js"></script>
    <script src="<?php echo $rutaServer; ?>/vista/dist/js/funciones.js"></script>
    <script src="<?php echo $rutaServer; ?>/vista/dist/js/statistics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="<?php echo $rutaServer; ?>/vista/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    <script>
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('YYYY-MM-DD') + ' ' + end.format('YYYY-MM-DD'))
        }
      )
    </script>
  </body>
</html>