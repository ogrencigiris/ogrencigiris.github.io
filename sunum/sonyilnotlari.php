<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Son Yıl Notları</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php
        	include "header.php";
        ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                
				<?php
                    include "menu.php";
                ?>
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Son Yıl Notları
                        <small>2013-2014 Bahar Dönemi Not Durumları</small>
                    </h1>
                    <!-- <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol> -->
                </section>

                <!-- Main content -->
                
                <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Dersler ve Not Durumları</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tr>
                                            <th style="width:9">Ders Kodu</th>
                                            <th style="width:19%">Ders Adı</th>
                                            <th style="width:9%">Kredi</th>
                                            <th style="width:9%">Vize</th>
                                            <th style="width:9%">Final</th>
                                            <th style="width:9%">Bütünleme</th>
                                            <th style="width:9%">Muaf</th>
                                            <th style="width:9%">Geçme Notu</th>
                                            <th style="width:9%">Harf</th>
                                            <th style="width:9%">Durum</th>
                                        </tr>
                                        <tr>
                                            <td>5035201</td>
                                            <td>Mesleki Matematik</td>
                                            <td>2</td>
                                            <td><span class="badge bg-green">65</span></td>
                                            <td><span class="badge bg-red">20</span></td>
                                            <td>-1</td>
                                            <td>-1</td>
                                            <td><span class="badge bg-red">50</span></td>
                                            <td><span class="badge bg-red">FF</span></td>
                                            <td><span class="badge bg-red">Kaldı</span></td>
                                        </tr>
                                        <tr>
                                            <td>5035202</td>
                                            <td>Görsel Programlama</td>
                                            <td>2</td>
                                            <td><span class="badge bg-green">90</span></td>
                                            <td><span class="badge bg-green">70</span></td>
                                            <td>-1</td>
                                            <td>-1</td>
                                            <td><span class="badge bg-green">79</span></td>
                                            <td><span class="badge bg-green">BB</span></td>
                                            <td><span class="badge bg-green">Geçti</span></td>
                                        </tr>
                                        <tr>
                                            <td>5035203</td>
                                            <td>Teknik Resim</td>
                                            <td>2</td>
                                            <td><span class="badge bg-red">50</span></td>
                                            <td><span class="badge bg-green">100</span></td>
                                            <td>-1</td>
                                            <td>-1</td>
                                            <td><span class="badge bg-green">90</span></td>
                                            <td><span class="badge bg-green">BB</span></td>
                                            <td><span class="badge bg-green">Geçti</span></td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
                </div>


                <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">2013-2014 Bahar Dönemi Geçici Ağırlıklı Ortalama</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Açıklanan Ağırlıklı Not Toplamı</th>
                                            <th>Açıklanan Kredi Toplamı</th>
                                            <th>Şuanki Dönem Ağırlıklı Not Ortalaması</th>
                                        </tr>
                                        <tr>
                                            <td>72</td>
                                            <td>30</td>
                                            <td>3,27</td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
                </div>
                
                <!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>