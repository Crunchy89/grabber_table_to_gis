<?php
$url="https://corona.ntbprov.go.id/list-data";

if(isset($_GET['url']))
	$url=$_GET['url'];

if(!empty($url))
	echo file_get_contents($url);
?>
alamat tidak ditemukan
<?php
$url=null;
 
if(isset($_GET['url']))
	$url=$_GET['url'];
 
if(!empty($url))
	echo file_get_contents($url);
?>