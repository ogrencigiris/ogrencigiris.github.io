<?php
$options = array ( 
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HEADER => false,
		CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_SSL_VERIFYHOST =>false,
	//CURLOPT_ENCODING => "",
	//CURLOPT_AUTOREFERER => true,
	CURLOPT_CONNECTTIMEOUT => 30, 
	CURLOPT_TIMEOUT => 30,
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_SSL_VERIFYHOST =>false,
	CURLOPT_POSTFIELDS=>"ogrno=135035008;pass=07111994",
	CURLOPT_POST=>true,
	CURLOPT_COOKIE => "ogrno=135035008;pass=07111994",
	CURLOPT_COOKIEFILE=>"/",
	CURLOPT_COOKIEJAR>"/"
);

        $ch = curl_init("http://asp1.selcuk.edu.tr/asp/ogr/duyuru.asp");
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err = curl_errno( $ch );
        $errmsg = curl_error( $ch );
        $header = curl_getinfo( $ch );

        curl_close( $ch );

        $header[ 'errno' ] = $err;
        $header[ 'errmsg' ] = $errmsg;
        $header[ 'content' ] = $content;
		echo $errmsg;
        echo $header[ 'content' ];
?>