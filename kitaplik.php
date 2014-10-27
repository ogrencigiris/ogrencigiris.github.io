<form method="POST" action="index.php" >
<input type="text" name="kIsim" />
<input type="submit"  />
</form>
<?php
function apiTip($tip)
{
	switch($tip)
	{
		case"ara":
			return "https://www.goodreads.com/search.xml?key=jWA4PG0LIZfFT1m3Xe2Gg&q=".$_POST["kIsim"]."";
		break;
		case"goodReadsId":
			return "https://www.goodreads.com/book/show/$_POST[kIsim]?format=xml&key=jWA4PG0LIZfFT1m3Xe2Gg";
		break;
	}
}
function cUrll($tip=NULL)
{
	$ch = curl_init(apiTip($tip));
	curl_setopt_array( $ch,array(
	CURLOPT_RETURNTRANSFER => true,
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
	return new SimpleXMLElement($content);
}
if($_POST)
{ 
	$xml=cUrll("ara");
	echo "<table>";
	foreach($xml->search->results->work as $hey)
	{
		echo "<tr>
			<td align='center' ><img src='".$hey->best_book->image_url."' /></td>
			<td> <a href='https://www.goodreads.com/book/show/".$hey->best_book->id."' >".$hey->best_book->title."</a></td>
			</tr>";
	}
	echo "</table>";
}
?>
