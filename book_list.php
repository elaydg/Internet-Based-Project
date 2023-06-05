<?php
session_start();
include('connections/baglanti.php');
$hostname = "localhost";
$database = "kutuphane";
$username = "root";
$password = "";

$baglanti = mysqli_connect($hostname, $username, $password, $database);


$sql = "SELECT * FROM books";
$result = $baglanti->query($sql);


ob_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <?php include "ortak_sayfalar/baslik.php"; ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

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
                    <h3 class="box-title">Library App</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body"
                <!-- ****************************************************************************** -->



                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <!-- /.box -->

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">BOOK LIST </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Book Name</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <?php if(isset($_SESSION['login']) == "true" and ($_SESSION['authority']) >= ($_SESSION['super_admin']) ) { ?>
                                                <th> </th>
                                            <?php } ?>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php

                                        // Veritabanından alınan verileri tabloya eklemek için döngüyü kullanın
                                        while ($row = $result->fetch_assoc()) {
                                            $bookName = $row["book_name"];
                                            $author = $row["writer"];
                                            $publisher = $row["publisher"];
                                            $bookImg = $row["book_img"];

                                            echo "<tr>";
                                            echo "<td>" . $bookName . "</td>";
                                            echo "<td>" . $author . "</td>";
                                            echo "<td>" . $publisher . "</td>";
                                            echo "<td><img src='" . $bookImg . "' alt='Book Image' width='100'></td>";

                                            if (isset($_SESSION['user_name']) && $_SESSION['user_name'] == "user1"){
                                                echo "<td><a href='sil.php?book_name=" . $bookName . "'>Delete</a></td>";
                                            }

                                            echo "</tr>";

                                        }
                                        ?>
                                        </tbody>

                                        <thead>
                                        <tfoot>
                                        <tr>
                                            <th>Book Name</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <?php if(isset($_SESSION['login']) == "true" and ($_SESSION['authority']) >= ($_SESSION['super_admin']) ) { ?>
                                                <th></th>
                                            <?php } ?>
                                        </tr>
                                        </tfoot>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->

                <!-- ****************************************************************************** -->

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
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging' : true,
            'lengthChange' : false,
            'searching' : false,
            'ordering' : true,
            'info' : true,
            'autoWidth' :false
        })
    })


</script>
<script>
    $(document).ready(function() {
// Sil düğmesine tıklama işlemi
        $(".delete-user").click(function() {
            var userId = $(this).data("user-id");

            if (confirm("Bu kullanıcıyı silmek istediğinize emin misiniz?")) {
                $.ajax({
                    url: "sil.php", // Silme işlemini gerçekleştiren PHP dosyasının yolunu buraya yazın
                    type: "POST",
                    data: { userId: userId },
                    success: function(response) {
                        alert(response); // Silme işlemi sonucunu kullanıcıya göstermek için bir bildirim
// Silinen satırı tablodan kaldırma
                        $(this).closest("tr").remove();
                    }
                });
            }
        });
    });
</script>

</body>
<?php ob_end_flush(); ?>
</html>