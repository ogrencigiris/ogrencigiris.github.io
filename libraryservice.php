<?php
require_once("phpQuery-onefile.php");
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
	$service=array();
	$xml=cUrll($_REQUEST["islem"],true,$_REQUEST["kIsim"]);
	switch($_REQUEST["islem"])
	{
		case 'search':
			$service= new SimpleXMLElement($xml);
		break;
		case 'bookName':
			$service= new SimpleXMLElement($xml);
		break;
		case 'katalogTara':
			phpQuery::newDocument($xml);
			$rows= pq('tr[bgcolor=White]');
			$service["sonuc"]=pq($rows)->length;
			foreach($rows as $idx=>$row)
			{
				$parsedUrl=parse_url(pq($row)->find("a")->attr("href"));
				parse_str($parsedUrl["query"],$parsedUrl);
				$service["arama"][$idx]["ad"]=pq($row)->find("a")->text();
				$service["arama"][$idx]["marchid"]=$parsedUrl["MARCID"];
			}
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
				);
			$kitapDurumlari=array(
				"yerNo",
				"bulunduguYer",
				"yil",
				"cilt",
				"kopya",
				"iadeTarihi"
				);
			foreach($istenenler as $idx=>$istenen)
			{
				$selcukDetay[$idx]=pq('td:contains('.$istenen.') + td')->text();
			}
			$kitapAdetler=pq("#Table3 tr:not(:first)");
			$kitapOzellikler=[];
			foreach($kitapAdetler as $idx=>$kitapAdet)
			{
				foreach(pq($kitapAdet)->find("td") as $idx2=>$td)
				{
					$kitapOzellikler[$idx][$kitapDurumlari[$idx2]]=pq($td)->text();
				}
			}
			$goodReadsDetay=cUrll("bookName",true,$selcukDetay["isbn"]);
			$goodReadsDetay=new SimpleXMLElement($goodReadsDetay);
			$service["detay"]["selcuk"]=$selcukDetay;
			$service["detay"]["selcuk"]["odunc"]=$kitapOzellikler;
			$service["detay"]["goodreads"]=$goodReadsDetay;
		break;
	}
	header("Content-type: application/json; charset=utf-8");
	echo json_encode($service);
}
?>
