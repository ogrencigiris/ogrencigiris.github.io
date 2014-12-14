<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<form method="POST" action="" >
<input type="text" name="kIsim" />
<select name="islem">
	<option value="search" >Arama</option>
	<option value="bookName">Kitap Detayı</option>
	<option value="katalogTara">Katalog Tara</option>
</select>

<input type="submit"  />
</form>
<?php
header('Content-Type: text/html; charset=utf-8');
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
			echo "<table>";
				foreach($rows as $row)
				{
					$parsedUrl=parse_url(pq($row)->find("a")->attr("href"));
					parse_str($parsedUrl["query"],$parsedUrl);
					echo"
						<tr>
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
			echo "</table>";
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
			$basliklar=pq("#Table3 tr:not(:first)");
			$kitapAdetler=pq("#Table3 tr:not(:first)");
			$satirlar=[];
			foreach($kitapAdetler as $kitapAdet)
			{
				foreach(pq($kitapAdet)->find("td") as $index=>$td)
				{
					$satirlar[$kitapDurumlari[$index]]=pq($td)->text()."<br>";
				}
				//echo pq($kitapAdet)->text()."<br>";
				/*foreach($kitapDurumlari as $kitapDurum)
				{
					echo pq($kitapAdet)->text()."<br>";
				}*/
			}
			print_r($satirlar);
			//echo pq('td:contains("Ödünç") + td')->text()."--";
			//$isbn= pq('td:contains(ISBN) + td')->text();
			$goodReadsDetay=cUrll("bookName",true,$selcukDetay["isbn"]);
			$goodReadsDetay=new SimpleXMLElement($goodReadsDetay);
			echo "<table>";
				echo "
					<tr>
						<td>Yayın Yeri:</td>
						<td>".$selcukDetay["yayinYeri"] ."</td>
					</tr>
					<tr>
						<td>Kitap Adı:</td>
						<td>".$goodReadsDetay->book->title ."</td>
					</tr>
					<tr>
						<td>Kitap ISBN:</td>
						<td>isbn : ".$selcukDetay["isbn"] ." , isbn13 : ".$goodReadsDetay->book->isbn13."</td>
					</tr>
					<tr>
						<td>Kitap Resmi:</td>
						<td><img src='".$goodReadsDetay->book->image_url."' /></td>
					</tr>
					<tr>
						<td>Kitap Yazarı:</td>
						<td>".$goodReadsDetay->book->authors->author->name ."</td>
					</tr>
					<tr>
						<td>Kitap Yazarı Resmi:</td>
						<td><img src='".$goodReadsDetay->book->authors->author->image_url ."' /></td>
					</tr>
					<tr>
						<td>Kitap Sayfası:</td>
						<td>".$goodReadsDetay->book->num_pages ."</td>
					</tr>
					<tr>
						<td>Kitap Oyu:</td>
						<td>".$goodReadsDetay->book->average_rating ."</td>
					</tr>
					<tr>
						<td>Kitap Açıklaması:</td>
						<td>".$goodReadsDetay->book->description ."</td>
					</tr>
				";
			echo "</table>";
		break;
	}
	
	
}
?>
