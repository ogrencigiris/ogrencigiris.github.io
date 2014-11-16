<?php 
$id = "135035028"; 
$pw = "qwerqwer5"; 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt"); 
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt"); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, "ogrno=".$id."&pass=".$pw."&submit=Giris"); 
curl_setopt($ch, CURLOPT_URL, "https://asp2.selcuk.edu.tr/asp/ogr/giris.htm"); 
curl_setopt($ch, CURLOPT_URL, "https://asp2.selcuk.edu.tr/asp/ogr/not.asp"); 
echo curl_exec($ch);
//curl_close($ch);
?> 