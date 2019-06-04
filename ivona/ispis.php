<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>
<body>
    <font size=5 face="garamond">
    <form method="post" action="">
        <div align="center">
		<h1 size="15"> Ispis baze ljudi </h1>
		<div align="left" style="margin:auto; background-color:silver; border-style:dotted; border-color:black; width:500px">
<?php
$error = false;
if(file_exists('ljudi.xml')){
	$file = 'ljudi.xml';
	$xml = simplexml_load_file($file);
	$brojunosa = count($xml->osoba);
    for($i=0;$i<$brojunosa;$i++){	
		print($xml->osoba[$i]->ime . ' ' . $xml->osoba[$i]->prezime . ' ' . $xml->osoba[$i]->oib);
		echo "<br>";
			
		//header('Location: ispis.php');
		//die;
	}
}   
?>
		</div>
		</div>
    </form>
</body></font>
</html>