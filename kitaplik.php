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
function apiTip($tip)
{
	switch($tip)
	{
		case"search":
			return "https://www.goodreads.com/search.xml?key=jWA4PG0LIZfFT1m3Xe2Gg&q=".urlencode($_REQUEST["kIsim"])."";
		break;
		case"bookName":
			return "https://www.goodreads.com/book/show/".urlencode($_REQUEST["kIsim"])."?format=xml&key=jWA4PG0LIZfFT1m3Xe2Gg";
		break;
		case "katalogTara":
			return "http://www.kutuphane.selcuk.edu.tr/katalog_tarama.aspx";
		break;
	}
}
function cUrll($tip=NULL)
{
	$gonderi["TextBox1"]=urlencode($_REQUEST["kIsim"]);
	$ch = curl_init(apiTip($tip));
	$state="/wEPDwULLTEyNzUwNzY1NTEPZBYCAgEPZBYCAgEPZBYCZg9kFgJmD2QWCAIJD2QWBGYPZBYCZg9kFgICBQ8PZBYCHglvbmtleWRvd24FowFpZihldmVudC53aGljaCB8fCBldmVudC5rZXlDb2RlKXtpZiAoKGV2ZW50LndoaWNoID09IDEzKSB8fCAoZXZlbnQua2V5Q29kZSA9PSAxMykpIHtkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnQnV0dG9uMScpLmNsaWNrKCk7cmV0dXJuIGZhbHNlO319IGVsc2Uge3JldHVybiB0cnVlfTsgZAIBD2QWAmYPZBYCZg88KwALAGQCCw8WAh4HVmlzaWJsZWgWBGYPZBYCZg9kFgICAQ8QZGQWAWZkAgEPZBYCZg9kFgJmDzwrAAsAZAINDxYCHwFoFgICAQ9kFgJmD2QWAmYPPCsACwBkAg8PFgIfAWgWBGYPZBYCZg9kFgICAQ8QZGQWAWZkAgEPZBYCZg9kFgJmDzwrAAsAZGSPMw0XZS9Bj3MMKinuExAFNFcYp1Qkx65OuV/Sp3Zbmw==";
	$validation="/wEWEgKQtI2GCwK7q7GGCALWlM+bAgKF2fXbAwKgwpPxDQKTg/7sCQLR5pjpDQKkxtWADwLqjefYBwKBia7QDgLw+urtCQLJ363zDQLAnIfOBgLH0LDtAgLUho6cCAL7y8ufCQLs0bLrBgKM54rGBrsrD05OUFjltuSuvx/UgzJP3E0Upk+pXHmdwFi6F2+z";
	$search=$_REQUEST["kIsim"];
	curl_setopt_array( $ch,array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POSTFIELDS=>"__VIEWSTATE=".urlencode($state)."&__EVENTVALIDATION=".urlencode($validation)."&DropDownList1=anahtar&Dropdownlist2=hepsi&TextBox1=$search&Button1=Ara",
	CURLOPT_POST=>true,
	CURLOPT_AUTOREFERER => true,
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_SSL_VERIFYHOST =>false,
	CURLOPT_FOLLOWLOCATION => 1,
	CURLOPT_COOKIEFILE=>"/",
	CURLOPT_COOKIEJAR>"/"
	));
	$content = curl_exec( $ch );
	curl_close( $ch );
	return $content;
}
if($_REQUEST)
{ 
	
	$xml=cUrll($_REQUEST["islem"]);
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
							<td>kitap oyu 5 üzerinden ". $xml->book->average_rating ."</td>
							<td>".$xml->book->title ."</td>
							<td>".$xml->book->authors->author->name ."</td>
							<td><img src='".$xml->book->authors->author->image_url ."' /></td>
							<td>Kitap Sayfası ".$xml->book->num_pages ."</td>
						</tr>
						<tr>
							<td align='center' ><img src='".$xml->book->image_url."' /></td>
							<td> ".$xml->book->description ."</td>
						</tr>";
			echo "</table>";
		break;
		case 'katalogTara':
			require_once("phpQuery-onefile.php");
			phpQuery::newDocument($xml);
			$rows= pq('tr[bgcolor=White]');
			foreach($rows as $row)
			{
				echo pq($row)->find("a")->text()."<br>";
				echo pq($row)->children("td")->filter(":eq(1)")->text()."<br>";
			}
			echo $xml;
		break;
	}
	
	
}
?>
