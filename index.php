<?php
	include "vendor/autoload.php";
	header('Content-Type: text/html; charset=utf-8');
	$app = new \Slim\Slim();
	$app->post('/kitapliklar', function () {
		extract($_POST);
		$data=["ogrenci_no"=>$_SESSION["ogr_no"],"kitaplik_adi"=>$kitaplikadi]
		if(Medoo::has("kitapliktablosu",$data))
		{echo "zaten var dümbük."}
		else{
		Medoo::insert("kitapliktablosu",$data);
		}
	});
	
	$app->run();
?>
