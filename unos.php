<?php
$errors = array();
if(isset($_POST['unos'])){
    $ime = preg_replace('/[^A-Za-z]/', '', $_POST['ime']);
	$prezime = preg_replace('/[^A-Za-z]/', '', $_POST['prezime']);
    $oib = $_POST['oib'];
    
    if($ime == ''){
        $errors[] = 'Niste unjeli ime!';
    }
	if($prezime == ''){
        $errors[] = 'Niste unjeli prezime!';
    }
    if($oib == ''){
        $errors[] = 'Niste unjeli OIB!';
    }		
	
    if(count($errors) == 0){
		$file = 'ljudi.xml';
		$xml = simplexml_load_file($file);
		$osoba = $xml->addChild('osoba');
		$osoba->addChild('ime', ($ime));
		$osoba->addChild('prezime', ($prezime));
        $osoba->addChild('oib', ($oib));
		$xml->asXML('ljudi.xml');
        header('Location: provjera.php');
        die;
    }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>
<body>
    <font size=10 face="garamond">
    <form method="post" action="">
        <div align="center">
		<h1 size="15"> Unos osobnih podataka </h1>
		<h3> Molim unesite tražene podatke</h3>
		<div align="left" style="margin:auto; background-color:silver; border-style:dotted; border-color:black; width:500px">
        <p style="margin-left:40px">Ime: <input style="margin-left:50px" type="text" name="ime" size="30" /></p>
		<p style="margin-left:40px">Prezime: <input style="margin-left:12px" type="text" name="prezime" size="30" /></p>
        <p style="margin-left:40px">OIB: <input style="margin-left:45px" type="oib" name="oib" size="30" /></p>
		<?php
        if(count($errors) > 0){
            echo '<ul>';
            foreach($errors as $e){
                echo '<li>' . $e . '</li>';
            }
            echo '</ul>';
			
			
        }
        ?>
        <p><input style="margin-left:390px; background-color:lightblue; padding:10px 20px; border-style:solid; border-color:gray" type="submit" name="unos" value="Spremi"/></p>
		</div>
		</div>
    </form>
</body></font>
</html>