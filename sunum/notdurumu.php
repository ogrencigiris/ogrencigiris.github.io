<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Not Durumu</title>
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
                        Not Durumu
                        <small>Tüm Derslerin Not Durumları</small>
                    </h1>
                    <!-- <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol> -->
                </section>

                <!-- Main content -->
                
                
							<?php
								include "../service.php";
								$saas=new Service();
								$json = $saas->notlar();
								foreach($json as $index=>$donemler)
								{
									echo '
									
									<div class="box" >
					<div class="box-header">
						<h3 class="box-title">'.$index.'</h3>
					</div><!-- /.box-header -->
					<div class="box-body no-padding">
						<table class="table table-striped">
							<tr>
								<th style="width:7%">Ders Kodu</th>
								<th style="width:5%">Yıl</th>
								<th>Ders Adı</th>
								<th style="width:5%">Kredi</th>
								<th style="width:5%">Katsayı</th>
								<th style="width:5%">Muaf</th>
								<th style="width:8%">Ara Sınav-1</th>
								<th style="width:8%">Ara Sınav-2</th>
								<th style="width:8%">Genel Sınav</th>
								<th style="width:6%">Bütünleme</th>
								<th style="width:7%">Tek Ders</th>
								<th style="width:5%">Harf</th>
								<th style="width:6%">Durum</th>

							</tr>
									
									';
								foreach ($donemler as $deger)
								{
									echo '<tr>';
										echo '<td>';
											echo $deger['Ders Kodu'];
										echo '</td>';
										echo '<td>';
											echo $deger['Yıl'];
										echo '</td>';
										echo '<td>';
											echo $deger['Ders Adı'];
										echo '</td>';
										echo '<td>';
											echo $deger['Kredi'];
										echo '</td>';
										echo '<td>';
											echo $deger['Katsayı'];
										echo '</td>';
										echo '<td>';
											echo $deger['Muaf'];
										echo '</td>';
										echo '<td>';
											if($deger['AraSınav1']=="  ")
												echo '<span class="badge bg-yellow">x</span>';
											else if($deger['AraSınav1']>=60)
												echo '<span class="badge bg-green">'.$deger['AraSınav1'].'</span>';
											else
												echo '<span class="badge bg-red">'.$deger['AraSınav1'].'</span>';
										echo '</td>';
										echo '<td>';
											if($deger['AraSınav2']=="  ")
												echo '<span class="badge bg-yellow">x</span>';
											else if($deger['AraSınav2']>=60)
												echo '<span class="badge bg-green">'.$deger['AraSınav2'].'</span>';
											else
												echo '<span class="badge bg-red">'.$deger['AraSınav2'].'</span>';
										echo '</td>';
										echo '<td>';
											if($deger['Genel Sınav']=="  ")
												echo '<span class="badge bg-yellow">x</span>';
											else if($deger['Genel Sınav']>=60)
												echo '<span class="badge bg-green">'.$deger['Genel Sınav'].'</span>';
											else
												echo '<span class="badge bg-red">'.$deger['Genel Sınav'].'</span>';
										echo '</td>';
										echo '<td>';
											echo $deger['Bütünleme'];
										echo '</td>';
										echo '<td>';
											echo $deger['Tekders'];
										echo '</td>';
										echo '<td>';
											switch ($deger['Harf']) {
											case "AA":
												echo '<span class="badge bg-green">'.$deger['Harf'].'</span>';
												break;
											case "BA":
												echo '<span class="badge bg-green">'.$deger['Harf'].'</span>';
												break;
											case "BB":
												echo '<span class="badge bg-green">'.$deger['Harf'].'</span>';
												break;
											case "CB":
												echo '<span class="badge bg-green">'.$deger['Harf'].'</span>';
												break;
											case "CC":
												echo '<span class="badge bg-green">'.$deger['Harf'].'</span>';
												break;
											case "DC":
												echo '<span class="badge bg-red">'.$deger['Harf'].'</span>';
												break;
											case "DD":
												echo '<span class="badge bg-red">'.$deger['Harf'].'</span>';
												break;
											case "FF":
												echo '<span class="badge bg-red">'.$deger['Harf'].'</span>';
												break;
											}
										echo '</td>';
										echo '<td>';
											if($deger['Durum']=="1")
												echo '<span class="badge bg-red">Kaldı</span>';
											else
												echo '<span class="badge bg-green">Geçti</span>';
												
										echo '</td>';
									echo '</tr>';
								}
								echo '</table>
					</div>
                </div>';
								}
							?>
						


                

                
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

		
		
		
		<!-- angular icin
        <script src="js/angular.min.js" type="text/javascript"></script>
        <script src="js/app.js" type="text/javascript"></script> -->

    </body>
</html>