<?php
/*
* Tip opsiyonel (gelen isteme göre belirlenecek)
* Gönderilen data app.js de belirlenecek
* Templating angular ile halledilecek..belki...
*/
include "phpQuery-onefile.php";
class Service extends phpQuery
{
	public $base_domain="https://asp2.selcuk.edu.tr/asp/ogr/";
	public $return="";
	public $ogrno="135035008";
	public $pass="07111994";
	
	/*public function __construct()
	{
		if(isset($_SESSION["ogrno"]) && isset($_SESSION["pass"]))
		{
			$this->ogrno=$_SESSION["ogrno"];
			$this->pass=$_SESSION["pass"];
			
		}
		$content=$this::cURL();
		$page=phpQuery::newDocument($content);
		pq("frameset")->empty();
		$this->return=pq("frameset");
	}*/
	public function duyurular($url="sag.asp")
	{
		$this::addPage($url);
	}
	public function notlar($url="not.asp")
	{
		$this::addPage($url);
		echo $this->return;
	}
	public function sonYilNotlari($url="nots.asp")
	{
		$this::addPage($url,"");
	}
	public function sinifListesi($url="notsinif.asp",$notharf="1",$harftip="0",$bolum="1014",$yil="2014",$dersno="5035201",$dersadi="Mesleki Matematik")
	{
		echo $this->cURL($url,array(
			"ogrno"=>$this->ogrno,
			"pass"=>$this->pass,
			"notharf"=>$notharf,
			"harftip"=>$harftip,
			"bolum"=>$bolum,
			"yil"=>$yil,
			"dersno"=>$dersno,
			"dersadi"=>$dersadi));
	}
	private function addPage($page,$fields)
	{
		//pq($this->return)->append("<frame src='".$this->base_domain."$page'></frame>");
		$this->return=$this->cURL($page,$fields);
	}
	public function cURL($url="duyuru.asp",$post_fields=array())
	{
		$post_fields=empty($post_fields)?array(
				"ogrno"=>$this->ogrno,
				"pass" =>$this->pass,
				"islem"=>"giris_yap"
		):$post_fields;
		$ch = curl_init($this->base_domain.$url);
		echo http_build_query($post_fields);
		curl_setopt_array( $ch,array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => false,
			CURLOPT_ENCODING => "",
			CURLOPT_AUTOREFERER => true,
			CURLOPT_CONNECTTIMEOUT => 30,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST =>false,
			CURLOPT_FOLLOWLOCATION => 1,
			CURLOPT_POSTFIELDS=>http_build_query($post_fields),
			CURLOPT_POST=>true,
			CURLOPT_COOKIEFILE=>"/",
			CURLOPT_COOKIEJAR>"/",
			CURLOPT_COOKIE=>http_build_query(array(
				"ogrno"=>$this->ogrno,
				"pass" =>$this->pass
			))
		));
		$content = curl_exec( $ch );
		curl_close( $ch );
		return $content;
		
	}
	public function __destruct()
	{
		echo $this->return;
	}


}
$saas=new Service();
$saas->sinifListesi();
//$saas->notlar();
//$saas->sonYilNotlari();
/*echo $saas->duyurular();*/
 
