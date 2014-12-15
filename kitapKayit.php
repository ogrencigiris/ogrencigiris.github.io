<?php
Class VeriTabani
{
	function __construct() 
	{
		header('Content-Type: text/html; charset=utf-8');
		$host="localhost";
		$user="root";
		$database="ogrenci";
		$pass="";
		mysql_connect($host,$user) or die(mysql_error());
		mysql_select_db($database) or die("veri".mysql_error());
		mysql_query("SET COLLATION_CONNECTION = ´utf8´ ");
		mysql_query("SET NAMES ´utf8´");
		mysql_query("SET CHARACTER SET utf8");
	}
	function vtSilme($tabloAdi,$sart=null) 
	{
		//DELETE FROM table_name WHERE some_column = some_value
		if($sart!=null) $sart=" where ".$sart;
		$sorgu='delete from '.$tabloAdi.$sart;
		// oluþturulan sorguyu gönder.
		$calistir=mysql_query($sorgu);
		//print_r($calistir);
		if($calistir)
			return true;
		else
			return false;
	}
	function vtListele($alanlar="*",$tabloAdi,$sart=null) 
	{
		// alanlar girildiyse yazdýr girilmediyse boþ býrak
		$alanlar    =   ($alanlar) ?  '`'.implode('`, `',$alanlar).'`' : '';
		if($sart!=null) $sart=" where ".$sart;
		$sorgu='select '.$alanlar.' from '.$tabloAdi.$sart;
		// oluþturulan sorguyu gönder.
		$calistir=mysql_fetch_array(mysql_query($sorgu));
		//print_r($calistir);
		return $calistir;
	}
	function vtEkle($degerler,$alanlar=null,$tabloAdi) 
	{
		// boþ deðerleri null olarak ayarla
		foreach($degerler as $key => $value) {
			if(empty($value)) $degerler[$key]='NULL';
		}
		// alanlar girildiyse yazdýr girilmediyse boþ býrak
		$alanlar    =   ($alanlar) ?  '(`'.implode('`, `',$alanlar).'`)' : '';
		$sorgu='insert into `'.$tabloAdi.'`'.$alanlar.' values(\''.implode('\',\'',$degerler).'\')';
		// null deðerlerin týrnaklarý kaldýr
		$sorgu=str_replace("'NULL'","NULL",$sorgu);
		// oluþturulan sorguyu string olarak dönder.
		$calistir=mysql_query($sorgu);
		if($calistir)
			return true;
		else
			return false;
	}
	function vtGuncelle($degerler,$alanlar,$tabloAdi,$sart) 
	{
		$veriler="";
		for($i=0;$i<count($alanlar);$i++)
		{
			if($i==count($alanlar)-1)
			{
				$veriler=$veriler.$alanlar[$i]."='".$degerler[$i]."'";
			}
			else
			{
				$veriler=$veriler.$alanlar[$i]."='".$degerler[$i]."', ";
			}
		}
		$sorgu="update ".$tabloAdi." set ".$veriler." where ".$sart;
		$calistir=mysql_query($sorgu);
		if($calistir)
			return true;
		else
			return false;
	}
	
}

$vt=new VeriTabani;

//Silme
echo "Silme : ";
print_r($vt->vtSilme('uyeler','ogrno=135035026'));

//Ekleme
$degerler   =   Array(
	'',
    '135035026',
    'M.Ali',
    'Bahar',
    'TBMYO',
	'Bilgisayar',
	'2/A',
	'muhammedalibahar@gmail.com'
);
echo "<br/>Ekleme : ".$vt->vtEkle($degerler, null, 'uyeler');

//Listeleme
$alanlar   =   Array(
    'ogrno',
    'ad'
);
echo '<br/>Listeleme : ';
print_r($vt->vtListele($alanlar, 'uyeler','ogrno=135035026'));

//Güncelleme
$degerler2   =   Array(
    'Muhammed Ali',
    'BAHAR'
);
$alanlar2   =   Array(
    'ad',
    'soyad'
);
echo '<br/>Güncelleme : '.$vt->vtGuncelle($degerler2,$alanlar2,'uyeler','ogrno=135035026');
?> 