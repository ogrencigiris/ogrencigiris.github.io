<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
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
                        Kütüphane
                        <small>Kitap aramalarını burada yapabilirsiniz.</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
				
				<section class="content-header">
					<!-- Main content -->
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Kitap Araması</h3>
							</div><!-- /.box-header -->
							<!-- form start -->
							<div class="box-body">
								<form method="POST" action="" >
									<div class="input-group input-group-sm">
										<input type="text" name="kIsim" class="form-control">
										<span class="input-group-btn">
											<button class="btn btn-info btn-flat" type="submit"><i class="fa fa-search"></i> Ara</button>
											<select name="islem" style="display:none;">
												<option value="katalogTara">Katalog Tara</option>
												<option value="search" >Arama</option>
												<option value="bookName">Kitap Detayı</option>
											</select>
										</span>
									</div>
								</form>
							</div>
						</div>
				</section>
				<section class="content">
					<?php
						require_once("phpQuery-onefile.php");
						function katalogDetay()
						{
							
						}
						function apiTip($tip,$search)
						{
							switch($tip)
							{
								case"search":
									return "https://www.goodreads.com/search.xml?key=jWA4PG0LIZfFT1m3Xe2Gg&q=".urlencode($search)."";
								break;
								case"bookName":
									return "https://www.goodreads.com/book/isbn?format=xml&isbn=".$search."&key=jWA4PG0LIZfFT1m3Xe2Gg";
									
								break;
								case "katalogTara":
									return "http://www.kutuphane.selcuk.edu.tr/katalog_tarama.aspx";
								break;
								case "katalogDetay":
									return "http://kutuphane.selcuk.edu.tr/tarama_detay.aspx?MARCID=".$search."&CURR=1";
								break;
							}
						}
						function cUrll($tip=NULL,$req=true,$search)
						{
							$gonderi["TextBox1"]=urlencode($search);
							$ch = curl_init(apiTip($tip,$search));
							$state="/wEPDwULLTEyNzUwNzY1NTEPZBYCAgEPZBYCAgEPZBYCZg9kFgJmD2QWCAIJD2QWBGYPZBYCZg9kFgICBQ8PZBYCHglvbmtleWRvd24FowFpZihldmVudC53aGljaCB8fCBldmVudC5rZXlDb2RlKXtpZiAoKGV2ZW50LndoaWNoID09IDEzKSB8fCAoZXZlbnQua2V5Q29kZSA9PSAxMykpIHtkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnQnV0dG9uMScpLmNsaWNrKCk7cmV0dXJuIGZhbHNlO319IGVsc2Uge3JldHVybiB0cnVlfTsgZAIBD2QWAmYPZBYCZg88KwALAGQCCw8WAh4HVmlzaWJsZWgWBGYPZBYCZg9kFgICAQ8QZGQWAWZkAgEPZBYCZg9kFgJmDzwrAAsAZAINDxYCHwFoFgICAQ9kFgJmD2QWAmYPPCsACwBkAg8PFgIfAWgWBGYPZBYCZg9kFgICAQ8QZGQWAWZkAgEPZBYCZg9kFgJmDzwrAAsAZGSPMw0XZS9Bj3MMKinuExAFNFcYp1Qkx65OuV/Sp3Zbmw==";
							$validation="/wEWEgKQtI2GCwK7q7GGCALWlM+bAgKF2fXbAwKgwpPxDQKTg/7sCQLR5pjpDQKkxtWADwLqjefYBwKBia7QDgLw+urtCQLJ363zDQLAnIfOBgLH0LDtAgLUho6cCAL7y8ufCQLs0bLrBgKM54rGBrsrD05OUFjltuSuvx/UgzJP3E0Upk+pXHmdwFi6F2+z";
							$curlAyar=array(
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_POSTFIELDS=>"__VIEWSTATE=".urlencode($state)."&__EVENTVALIDATION=".urlencode($validation)."&DropDownList1=anahtar&Dropdownlist2=hepsi&TextBox1=$search&Button1=Ara",
							CURLOPT_POST=>$req,
							CURLOPT_AUTOREFERER => true,
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYPEER => false,
							CURLOPT_SSL_VERIFYHOST =>false,
							CURLOPT_FOLLOWLOCATION => 1,
							CURLOPT_COOKIEFILE=>"/",
							CURLOPT_COOKIEJAR>"/",
							CURLOPT_COOKIE=>"ASP.NET_SessionId=t4pafxnakyxf1wyighlswtgg"
							);
							curl_setopt_array( $ch,$curlAyar);
							$content = curl_exec( $ch );
							curl_close( $ch );
							return $content;
						}
						if($_REQUEST)
						{ 
							
							$xml=cUrll($_REQUEST["islem"],true,$_REQUEST["kIsim"]);
							switch($_REQUEST["islem"])
							{
								case 'search':
									$xml= new SimpleXMLElement($xml);
									echo "<table>";
										foreach($xml->search->results->work as $hey)
										{
											echo "<tr>
												<td align='center' ><img src='".$hey->best_book->image_url."' /></td>
												<td> <a href='kutuphane.php?islem=bookName&kIsim=".$hey->best_book->id."' >".$hey->best_book->title."</a></td>
												</tr>";
										}
									echo "</table>";
								break;
								case 'bookName':
									$xml= new SimpleXMLElement($xml);
									echo "<table>";
											echo "
												<tr>
													<td>Kitap Adı:</td>
													<td>".$xml->book->title ."</td>
												</tr>
												<tr>
													<td>Kitap Resmi:</td>
													<td><img src='".$xml->book->image_url."' /></td>
												</tr>
												<tr>
													<td>Kitap Yazarı:</td>
													<td>".$xml->book->authors->author->name ."</td>
												</tr>
												<tr>
													<td>Kitap Yazarı Resmi:</td>
													<td><img src='".$xml->book->authors->author->image_url ."' /></td>
												</tr>
												<tr>
													<td>Kitap Sayfası:</td>
													<td>".$xml->book->num_pages ."</td>
												</tr>
												<tr>
													<td>Kitap Oyu:</td>
													<td>".$xml->book->average_rating ."</td>
												</tr>
												<tr>
													<td>Kitap Açıklaması:</td>
													<td>".$xml->book->description ."</td>
												</tr>
											";
									echo "</table>";
								break;
								case 'katalogTara':
									phpQuery::newDocument($xml);
									$rows= pq('tr[bgcolor=White]');
									echo '
									<div class="row">
									<div class="col-xs-12">
										<div class="box">
											<div class="box-header" style="background-color:#c0d8e5">
												<h3 class="box-title">Arama Sonuçları</h3>
											</div><!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
												<table class="table table-hover">
													<tr>
														<th style="width:50px">No</th>
														<th>Kitap Bilgisi</th>
													</tr>
									';
										$donguSayisi=0;
										foreach($rows as $row)
										{
											$donguSayisi=$donguSayisi+1;
											$parsedUrl=parse_url(pq($row)->find("a")->attr("href"));
											parse_str($parsedUrl["query"],$parsedUrl);
											echo"
												<tr>
													<td>
														
														$donguSayisi.
														
													</td>
													<td>
														<a href='?kIsim=".$parsedUrl["MARCID"]."&islem=katalogDetay'>
															".pq($row)->find("a")->text()."
														</a>
													</td>
												</tr>
											";
											//echo pq($row)->find("a")->text()."<br>";
											//echo pq($row)->children("td")->filter(":eq(1)")->text()."<br>";
										}
									echo '
													</table>
												</div><!-- /.box-body -->
											</div><!-- /.box -->
										</div>
									</div>
									';
								break;
								case 'katalogDetay':
									$katalogDetay=cUrll("katalogDetay",false,$_REQUEST["kIsim"]);
									phpQuery::newDocument($katalogDetay);
									$selcukDetay=array();
									$istenenler=array(
										"isbn"=>"isbn",
										"kataloglama"=>"Orjinal Katologlama Bürosu",
										"sinifNo"=>"Sınıflama Numarası (Dw)",
										"baski"=>"Baskı",
										"yayinYeri"=>"Yayın Yeri",
										"diziAdi"=>"Dizi Adı",
										"konu"=>"Konu",
										"odunc"=>"Ödünç Verilebilir"
										);
									foreach($istenenler as $idx=>$istenen)
									{
										$selcukDetay[$idx]=pq('td:contains('.$istenen.') + td')->text();
									}
									echo pq('td:contains("Ödünç") + td')->text()."--";
									//$isbn= pq('td:contains(ISBN) + td')->text();
									$goodReadsDetay=cUrll("bookName",true,$selcukDetay["isbn"]);
									$goodReadsDetay=new SimpleXMLElement($goodReadsDetay);
									echo '
									<div class="row">
									<div class="col-xs-12">
										<div class="box">
											<div class="box-header" style="background-color:#c0d8e5">
												<h3 class="box-title">'.$goodReadsDetay->book->title .' İsimli Kitap Bilgileri</h3>
											</div><!-- /.box-header -->
											<div class="box-body table-responsive no-padding">
												<table class="table table-condensed">
									';
										echo "
											<tr>
												<td rowspan=6 width=200 align=center><img width=150 src='".$goodReadsDetay->book->image_url."' /></td>
												<td width=100px >Kitap İsmi : </td>
												<td>".$goodReadsDetay->book->title ."</td>
											</tr>
											<tr>
												<td>Yazarı : </td>
												<td>".$goodReadsDetay->book->authors->author->name ."</td>
											</tr>
											<tr>
												<td>ISBN :</td>
												<td>".$selcukDetay["isbn"] ." , GRISBN : ".$goodReadsDetay->book->isbn13."</td>
											</tr>
											<tr>
												<td>Sayfa Sayısı :</td>
												<td>".$goodReadsDetay->book->num_pages ."</td>
											</tr>
											<tr>
												<td>Beğeni Oyu :</td>
												<td>".$goodReadsDetay->book->average_rating ."</td>
											</tr>
											<tr>
												<td>Ödünç:</td>
												<td>".$selcukDetay["odunc"] ."</td>
											</tr>
											<tr>
												<td>Kitap Açıklaması:</td>
												<td colspan=2>".$goodReadsDetay->book->description ."</td>
											</tr>
										";
									echo "</table>";
								break;
							}
						}
					?>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
				</section>
				
							
							
                
                
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