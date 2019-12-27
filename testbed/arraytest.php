<?php



$errData = [
	'error' => [
					0 => [
									'errorCode'=>1000,
									'obj' => 'object0',
									'errorType' => 'validation0',
									'errorMessage' => 'missing field 0',
									'errorAction' => 'Action 0',
					],                                                                                                             
					1 => [
									'errorCode'=>1001,
									'obj' => 'object1',
									'errorType' => 'validation1',
									'errorMessage' => 'missing field 1',
									'errorAction' => 'Action 1',
					],   
	
	],
];  

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<p>Array test</p>

<?php

$errMsg = "";
$topLevel = $errData['error'];
//get the error index number (0,1,2...)
foreach( $topLevel as $level2 => $level2_value){

	$errMsg .= 'Error '. $level2.":";

	foreach( $level2_value as $level3=>$level3_value){

			$errMsg .= "<p>".$level3.": ";
			$errMsg .= $level3_value."\r\n</p>";

	}
}



?>

<p> Error Data </p>
<p> <?php echo $errMsg; ?> </p>

</body>
</html>