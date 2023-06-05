<?php
session_start();
include('connections/baglanti.php');
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // POST verilerini alma
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $authority = $_POST['authority'];
    $user_password = $_POST['user_password'];

    // Veritabanına veri eklemek için SQL sorgusu
    $sql = "INSERT INTO members (user_name, user_email, authority, user_password) VALUES ('$user_name', '$user_email', '$authority', '$user_password')";

    // SQL sorgusunu çalıştırma
    if (mysqli_query($baglanti, $sql)) {
        echo "New member added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($baglanti);
    }

    // Veritabanı bağlantısını kapatma
    mysqli_close($baglanti);

    header("Location: index.php"); // Kullanıcıları listeleme sayfasına yönlendirme
    exit;
}




?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <script>
        function redirectToPage() {
            window.location.href = "add_member.php";
        }
    </script>


    <?php include "ortak_sayfalar/baslik.php"; ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <?php include "ortak_sayfalar/logo.php"; ?>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <?php include "ortak_sayfalar/gsm_menu.php"; ?>


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <?php include "ortak_sayfalar/mesajlar.php"; ?>

                    <!-- Notifications: style can be found in dropdown.less -->
                    <?php include "ortak_sayfalar/bildirimler.php"; ?>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <?php include "ortak_sayfalar/gorevler.php"; ?>

                    <!-- User Account: style can be found in dropdown.less -->
                    <?php include "ortak_sayfalar/profil.php"; ?>

                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <?php include "ortak_sayfalar/user_panel.php"; ?>



            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php include "ortak_sayfalar/left_menu.php"; ?>

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <?php include "ortak_sayfalar/site_info.php"; ?>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>


                </div>
                <div class="box-body">



                    <div class="register-box">
                        <div class="register-logo">
                            <a href="index2.html"><b>Welcome</b>Admin</a>
                        </div>

                        <div class="register-box-body">
                            <p class="login-box-msg">Register a new membership</p>

                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="User Name" name="user_name">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>


                                <div class="form-group has-feedback">
                                    <input type="email" class="form-control" placeholder="Email" name="user_email">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>


                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Authority" name="authority">
                                    <span class="fa fa-heart form-control-feedback"></span>
                                </div>


                                <div class="form-group has-feedback">
                                    <input type="password" class="form-control" placeholder="Password" name="user_password">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>


                                <!-- <div class="form-group has-feedback">
                                    <input type="password" class="form-control" placeholder="Retype password">
                                    <span class=" fa fa-exchange form-control-feedback"></span>
                                </div>-->


                                <div class="row">

                                    <!-- /.col -->
                                    <div class="col-xs-6 text-right">
                                        <button type="button" class="btn btn-primary btn-block btn-flat" onclick="redirectToPage()">Add Member</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                        </div>
                        <!-- /.form-box -->
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <?php include "ortak_sayfalar/altbilgi.php"; ?>


    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <ul class="control-sidebar-menu">
                </ul>
            </div>
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">

                </form>
            </div>
        </div>
    </aside>

    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>



</body>
<?php ob_end_flush(); ?>
</html>