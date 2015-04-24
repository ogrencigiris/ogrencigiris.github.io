<?php
/*
* Tip opsiyonel (gelen isteme göre belirlenecek)
* Gönderilen data app.js de belirlenecek
* Templating angular ile halledilecek..belki...
*/
include "phpQuery-onefile.php";
class Service extends phpQuery
{
	public $base_domain="https://asp2.selcuk.edu.tr/asp/ogrstd/";
	public $opt_header=true;
	public $login=false;
	public $return=array();
	public $cookies=array();
	public $ogrno="135035008";
	public $pass="degistirdim";
	
	public function __construct()
	{
		echo $this->base_domain;
		/*if(isset($_SESSION["ogrno"]) && isset($_SESSION["pass"]))
		{
			$this->ogrno=$_SESSION["ogrno"];
			$this->pass=$_SESSION["pass"];
		}*/
		//echo pq("table:eq(1)");
		$content=$this::cURL("CAPTCHA/CAPTCHA_image.asp");
		preg_match('/^Set-Cookie:\s*([^;]*)/mi', $content, $m);
		if(isset($m[1]))
		{
			parse_str($m[1], $this->cookies);
		}
	}
	public function profile($url="sag.asp")
	{
		$this::addPage($url);
		$each=pq("table:eq(1) tr");
		$profileDetail=[];
		foreach($each as $row)
		{
			if(pq($row)->find("td:first")->text()!="")
			{
				$profileDetail[$this->clean(pq($row)->find("td:first")->text())]=$this->clean(pq($row)->find("td:last")->text());
			}
		}
		$this->return=$profileDetail;	
	}
	function clean($string)
	{
		$order=array(":","\n","\r","\u00a0");
		$replace="";
		return trim(str_replace($order,$replace,$string));
	}
	public function notlar($url="not.asp")
	{
		$this::addPage($url,array("login"=>"Not Durumu"));
		pq("p:first,table:first,br,font[color='black'],tr>b")->remove();
		$this->return=preg_replace(
		array("/<\/tr>/","/<\/center>/","/<center>/","/<tr/"   ,"/<\/table>/","/<table(.*)>\n<\/tr>/","/&amp;nbsp/"),
		array(""        ,""            ,""         ,"</tr>\n<tr","</tr></table>","<table$1>",""),$this->return);
		phpQuery::newDocument($this->return);
		$donemler=pq("td[bgcolor='#F6D6C9']  ")->addClass("donem");
		//print_r($donemler);
		foreach($donemler as $donem)
		{
			$donemdizi[]=$this->clean(pq($donem)->text());
		}
		$basliklar=pq('tr[bgcolor="#931515"]:eq(1) td');
		foreach($basliklar as $baslik)
		{
			$titles[]=$this->clean(pq($baslik)->text());
		}
		$kayitlar=pq('tr:not([bgcolor="#931515"])');             //[bgcolor="#D9FFEE"]
		$print=[];
		foreach($kayitlar as $i=>$kayit)
		{
			foreach(pq($kayit)->find("td") as $index=>$kolon)
			{
				if(pq($kolon)->is(".donem")){
					$donem=pq($kolon)->text();
					continue;
				}
				
				$print[$donem][$i][$titles[$index]]=pq($kolon)->text();
			}
		}
		$this->return=$print;
		return $print;
	}
	public function sonYilNotlari($url="nots.asp")
	{
		$this::addPage($url,"");
		pq("table:first,p:first,br,font[color='black'],tr>b")->remove();
		$this->return=preg_replace(
		array("/<\/tr>/","/<\/center>/","/<center>/","/<tr/"   ,"/<\/table>/","/<table(.*)>\n<\/tr>/","/&amp;nbsp/"),
		array(""        ,""            ,""         ,"</tr>\n<tr","</tr></table>","<table$1>",""),$this->return);
		phpQuery::newDocument($this->return);
		$basliklar=pq('tr[bgcolor="#931515"]:eq(0) td');
		foreach($basliklar as $baslik)
		{
			$titles[]=$this->clean(pq($baslik)->text());
		}
		$kayitlar=pq('tr[bgcolor="#D9FFEE"]');             //[bgcolor="#D9FFEE"]
		$print=[];
		foreach($kayitlar as $i=>$kayit)
		{
			foreach(pq($kayit)->find("td:not(:last)") as $index=>$kolon)
			{
				$print[$i][$titles[$index]]=pq($kolon)->text();
			}
		}
		$this->return=$print;
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
	private function addPage($page="sag.asp",$fields=[])
	{
		$this->return=phpQuery::newDocument($this::cURL($page));
	}
	public function cURL($url="duyuru.asp",$post_fields=array())
	{
		$post_fields=empty($post_fields)?array(
				"ogrno"=>$this->ogrno,
				"pass" =>$this->pass
		):$post_fields;
		$ch = curl_init($this->base_domain.$url);
		curl_setopt_array( $ch,array(			
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => true,
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
			CURLOPT_COOKIE=>http_build_query($this->cookies)
		));
		$content = curl_exec( $ch );
		curl_close( $ch );
		return $content;		
	}
	public function __destruct()
	{
		if(is_array($this->return))
		{
			header('Content-Type: application/json;charset=utf-8');
			echo json_encode($this->return,JSON_PRETTY_PRINT);
		}
		else 
		{
			echo $this->return;
		}
	}


}
if($_REQUEST)
{
$saas=new Service();
call_user_func([$saas,$_REQUEST["process"]]);
}
//$saas->profile();
//$saas->sinifListesi();
//$saas->notlar();
//$saas->sonYilNotlari();
