<!--<base url="https://asp2.selcuk.edu.tr/asp/ogr/"></base>-->
<?php
$url="https://asp2.selcuk.edu.tr/asp/ogr/nots.asp";
$ch = curl_init($url);
$ayar=curl_setopt_array( $ch,array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER => true,
		CURLOPT_AUTOREFERER => true,
		CURLOPT_CONNECTTIMEOUT => 30,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST =>false,
		CURLOPT_FOLLOWLOCATION => 1,
		CURLOPT_POSTFIELDS=>http_build_query(
				[
				 "ogrno"=>"135035008",
				 "pass" =>"degistirdim",
				 //"islem"=>"giris_yap"
				]),
		CURLOPT_POST=>true,
		CURLOPT_COOKIEFILE=>"/",
		CURLOPT_COOKIEJAR>"/",
		CURLOPT_COOKIE=>http_build_query(
		[
			"ASPSESSIONIDAWSSCRRS"=>"BPOBIKECFPKNKAHFAFMFFKCH"
			//"ogrno"=>"135035008",
			//"pass" =>"07111994"
		])
	)
);
$content = curl_exec( $ch );
$err = curl_errno( $ch );
$errmsg = curl_error( $ch );
$header = curl_getinfo( $ch );
curl_close( $ch );
//echo http_build_query(["ASPSESSIONIDAWSSCRRS"=>"BPOBIKECFPKNKAHFAFMFFKCH"]);
echo $content;
/*
include "phpQuery-onefile.php";
$pq = phpQuery::newDocument($content);
//pq("frame")->attr("src","sadfsdfdsafdfasdf");
//pq("frameset")->html("<frame src='https://asp2.selcuk.edu.tr/asp/ogr/ist.asp'></frame>");
pq("frame:eq(1)")->attr("src","https://asp2.selcuk.edu.tr/asp/ogr/ist.asp");
//pq("frameset")->prepend("<frame src='https://asp2.selcuk.edu.tr/asp/ogr/not.asp'></frame>");
//pq("frameset")->prepend("<frame src='https://asp2.selcuk.edu.tr/asp/ogr/nots.asp'></frame>");
pq("frameset")->append("<frame src='https://asp2.selcuk.edu.tr/asp/ogr/not.asp'></frame>");
$yazi="";
foreach(pq("frame") as $frame)
{
	$yazi.=pq($frame)->html();//attr("src",$url.$frame->attr("src")); 
}
//echo pq("frameset");//pq("frameset");
//print_r( $header);
echo pq($yazi);//pq("frameset");
?>
<!--<frameset>
<frame src='https://asp2.selcuk.edu.tr/asp/ogr/not.asp'></frame>
</frameset>-->*/
?>