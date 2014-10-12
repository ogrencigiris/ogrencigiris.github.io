<?php
header('Content-Type: text/html; charset=utf-8');
$ch = curl_init("http://www.kutuphane.selcuk.edu.tr/katalog_tarama.aspx?MARCID=232932&CURR=0");
$state="/wEPDwULLTEyNzUwNzY1NTEPZBYCAgEPZBYCAgEPZBYCZg9kFgJmD2QWCAIJD2QWBGYPZBYCZg9kFgICBQ8PZBYCHglvbmtleWRvd24FowFpZihldmVudC53aGljaCB8fCBldmVudC5rZXlDb2RlKXtpZiAoKGV2ZW50LndoaWNoID09IDEzKSB8fCAoZXZlbnQua2V5Q29kZSA9PSAxMykpIHtkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnQnV0dG9uMScpLmNsaWNrKCk7cmV0dXJuIGZhbHNlO319IGVsc2Uge3JldHVybiB0cnVlfTsgZAIBD2QWAmYPZBYCZg88KwALAGQCCw8WAh4HVmlzaWJsZWgWBGYPZBYCZg9kFgICAQ8QZGQWAWZkAgEPZBYCZg9kFgJmDzwrAAsAZAINDxYCHwFoFgICAQ9kFgJmD2QWAmYPPCsACwBkAg8PFgIfAWgWBGYPZBYCZg9kFgICAQ8QZGQWAWZkAgEPZBYCZg9kFgJmDzwrAAsAZGTo+iWg3Q5MkeaMUvhPgthxzBaEsF68o4iILntHyRjoWw==";
$validation="/wEWEgLSm5amAQK7q7GGCALWlM+bAgKF2fXbAwKgwpPxDQKTg/7sCQLR5pjpDQKkxtWADwLqjefYBwKBia7QDgLw+urtCQLJ363zDQLAnIfOBgLH0LDtAgLUho6cCAL7y8ufCQLs0bLrBgKM54rGBmqFN2hCVWwh2i31o7v3K5A+10vPvVhXG1jm8wI/K3bU";
$search=isset($_GET["q"])?$_GET["q"]:"babıali";
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
	CURLOPT_POSTFIELDS=>"__VIEWSTATE=".urlencode($state)."&__EVENTVALIDATION=".urlencode($validation)."&DropDownList1=anahtar&Dropdownlist2=hepsi&TextBox1=$search&Button1=Ara",
	CURLOPT_POST=>true,
	CURLOPT_COOKIEFILE=>"/",
	CURLOPT_COOKIEJAR>"/",
));
$content = curl_exec( $ch );
curl_close( $ch );
echo $content;
?>