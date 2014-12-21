<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<form method="GET" action="" >
<input type="text" name="kIsim" />
<select name="islem">
	<option value="search" >Arama</option>
	<option value="bookName">Kitap Detayı</option>
	<option value="katalogTara">Katalog Tara</option>
</select>

<input type="submit"  />
</form>
<?php
isset($_REQUEST["service"])?ob_clean():"";
header('Content-Type: text/html; charset=utf-8');
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
		case"bookId":
			return "https://www.goodreads.com/book/show/".$search."?format=xml&key=jWA4PG0LIZfFT1m3Xe2Gg";
		break;
		case "katalogTara":
			return "http://www.kutuphane.selcuk.edu.tr/katalog_tarama.aspx";
		break;
		case "katalogDetay":
			return "http://kutuphane.selcuk.edu.tr/tarama_detay.aspx?MARCID=".$search."&CURR=1";
		break;
		case "katalogVarmi":
			return "http://www.kutuphane.selcuk.edu.tr/katalog_tarama.aspx";
		break;
	}
}
/*#-#-#-#-#-#-#-#-#-# COOKİE #-#-#-#-#-#-#-#-#-#*/
$content=cUrll("katalogTara",false,"","true");
preg_match('/^Set-Cookie:\s*([^;]*)/mi', $content, $m);
if(isset($m[1]))
{
	parse_str($m[1], $content);
}
/*#-#-#-#-#-#-#-#-#-# COOKİE #-#-#-#-#-#-#-#-#-#*/
function cUrll($tip=NULL,$req=true,$search,$head=false)
{
	$gonderi["TextBox1"]=urlencode($search);
	$ch = curl_init(apiTip($tip,$search));
	$state="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";
	$validation="/wEWFwLeh77mDwK7q7GGCALWlM+bAgKF2fXbAwKgwpPxDQKTg/7sCQLR5pjpDQKkxtWADwLqjefYBwKBia7QDgLw+urtCQLJ363zDQLAnIfOBgLH0LDtAgLUho6cCAL7y8ufCQLs0bLrBgKM54rGBgKV+fjPCwKW+fjPCwKX+fjPCwKQ+fjPCwKR+fjPCx+6zsPK0inzvFAsUnPLCQbYRLNcymc24GTg/jvIIuBT";
	$curlAyar=array(
	CURLOPT_HEADER => $head,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POSTFIELDS=>"__VIEWSTATE=".urlencode($state)."&__EVENTVALIDATION=".urlencode($validation)."&DropDownList1=anahtar&Dropdownlist2=hepsi&TextBox1=$search&Button1=Ara",
	CURLOPT_POST=>$req,
	CURLOPT_AUTOREFERER => true,
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_SSL_VERIFYHOST =>false,
	CURLOPT_FOLLOWLOCATION => 1,
	CURLOPT_COOKIEFILE=>"/",
	CURLOPT_COOKIEJAR=>"/",
	CURLOPT_COOKIE=>"ASP.NET_SessionId=t4pafxnakyxf1wyighlswtgg"
	);
	if(isset($GLOBALS["m"][1]))
	{
		$curlAyar[CURLOPT_COOKIE]=$GLOBALS["m"][1];
	}
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
		case"bookId":
			$xml= new SimpleXMLElement($xml);
			print_r($xml);
		break;
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
			$gId=isset($_REQUEST["gId"])?"gId=".$_REQUEST["gId"]."&":"";
			if(pq($rows)->length()==1)
			{
				$parsedUrl=parse_url(pq($rows)->find("a")->attr("href"));
				parse_str($parsedUrl["query"],$parsedUrl);
				header("location:?".$gId."kIsim=".$parsedUrl["MARCID"]."&islem=katalogDetay");
			}
			elseif(pq($rows)->length()==0 && isset($_REQUEST["gId"]))
			{ 
				header("location:?islem=katalogDetay&kIsim=".$_REQUEST["gId"]."");
			}
			else
			{
				echo "<table id='liste' >";
					foreach($rows as $row)
					{
						$parsedUrl=parse_url(pq($row)->find("a")->attr("href"));
						parse_str($parsedUrl["query"],$parsedUrl);
						/*phpQuery::newDocument(cUrll("katalogDetay",false,$parsedUrl["MARCID"]));
						$goodReadsDetay=cUrll("bookName",true,pq('td:contains(isbn) + td')->text());
						$goodReadsDetay=new SimpleXMLElement($goodReadsDetay);*/
						$renk=!empty($goodReadsDetay->book->isbn)?"bgcolor='green'":"bgcolor='red'";
						echo"
							<tr $renk >
								<td>
									<a href='?".$gId."kIsim=".$parsedUrl["MARCID"]."&islem=katalogDetay'>
										".pq($row)->find("a")->text()."
									</a>
								</td>
							</tr>
						";
						//echo pq($row)->find("a")->text()."<br>";
						//echo pq($row)->children("td")->filter(":eq(1)")->text()."<br>";
					}
				echo "</table>";
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
			
			if(isset($_REQUEST["gId"]))
			{
				$goodReadsDetay=cUrll("bookName",true,$_REQUEST["gId"]);
			}
			else
			{
				if(empty($selcukDetay["isbn"]))
				{
					$goodReadsDetay=cUrll("bookName",true,$_REQUEST["kIsim"]);
				}
				else
				{
					$goodReadsDetay=cUrll("bookName",true,$selcukDetay["isbn"]);
				}
			}
			$goodReadsDetay=new SimpleXMLElement($goodReadsDetay);
			echo "<a href='?".$goodReadsDetay->book->id."'>".$goodReadsDetay->book->name."</a>";
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
			echo "<table cellpadding='10' cellspacing='10' border='2'>
					<tr>
						<th>yerNo</th>
						<th>bulunduguYer</th>
						<th>yil</th>
						<th>cilt</th>
						<th>kopya</th>
						<th>iadeTarihi</th>
					</tr>
				";
				foreach($kitapOzellikler as $idx=>$kitapOzellik)
				{
					echo "<tr>
							<td>".$kitapOzellik["yerNo"]."</td>
							<td>".$kitapOzellik["bulunduguYer"]."</td>
							<td>".$kitapOzellik["yil"]."</td>
							<td>".$kitapOzellik["cilt"]."</td>
							<td>".$kitapOzellik["kopya"]."</td>
							<td>".$kitapOzellik["iadeTarihi"]."</td>
						</tr>
						";
				}
			echo "</table>";
			//echo $goodReadsDetay->book->similar_books->book->title;
			echo "<table>
					<tr>
						<td>Benzer Kitaplar</td>
					</tr><tr>";
			$goodreadsIsbn;
			foreach($goodReadsDetay->book->similar_books->book as $bookss)
			{
				if(!empty($bookss->isbn))
				{
					$goodreadsIsbn=$bookss->isbn;
				}
				elseif(!empty($bookss->isbn13))
				{
					$goodreadsIsbn=$bookss->isbn13;
				}
				else
				{
					$goodreadsIsbn=$bookss->title;
				}
				echo "
					<td><a href='kutuphane.php?gId=".$bookss->id."&kIsim=".$goodreadsIsbn."&islem=katalogTara' ><img src='".$bookss->small_image_url."' /></a></td>
					<td>".$bookss->title."</td>
					";
			}
			echo"</tr></table>";
		break;
	}
	
	
}
?>
