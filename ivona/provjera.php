<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<form method="post" action="">
<h1 size="15" align="center">Provjera OIB-a</h1>
<font size=5>
<div align="left" style="margin:auto; background-color:silver; border-style:dotted; border-color:black; width:500px">
        <p style="margin-left:40px">Ime: <input style="margin-left:50px" type="text" name="ime" size="30" /></p>
		<p style="margin-left:40px">Prezime: <input style="margin-left:10px" type="text" name="prezime" size="30" /></p>
        
		
<?php
$error = false;
if(isset($_POST['unos'])){
    $ime = preg_replace('/[^A-Za-z]/', '', $_POST['ime']);
	$prezime = preg_replace('/[^A-Za-z]/', '', $_POST['prezime']);
    if(file_exists('ljudi.xml')){
        //$xml = new SimpleXMLElement('users/' . $ime . '.xml', 0, true);
		$file = 'ljudi.xml';
		$xml = simplexml_load_file($file);
		//$brojunosa = $node->count();
		//$brojunosa = count($node->children());
		$brojunosa = count($xml->osoba);
        for($i=0;$i<$brojunosa;$i++){
		//foreach($file as $ljudi){	
			if($ime == $xml->osoba[$i]->ime && $prezime == $xml->osoba[$i]->prezime){
				//session_start();
				//$_SESSION['ime'] = $ime;
			print('OIB od "' . $xml->osoba[$i]->ime . ' ' . $xml->osoba[$i]->prezime . '" je: ' . $xml->osoba[$i]->oib);
			}
				//header('Location: ispis.php');
				//die;
			//else if{
				//$error = true;
			//}
		}
    }   
}
if(isset($_POST['ispis'])){
header('Location: ispis.php');
exit;
}
?>
    <p><input style="margin-left:370px; background-color:lightblue; padding:10px 16px; border-style:solid; border-color:gray" type="submit" name="unos" value="Provjeri OIB"/></p>
	<p><input style="margin-left:370px; background-color:lightblue; padding:10px 20px; border-style:solid; border-color:gray" type="submit" name="ispis" value="Ispiši bazu"/></p>

		</div>
		</font>
    </form>
</body>
</html>