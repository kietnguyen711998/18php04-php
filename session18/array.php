<?php
	// khai bao 1 mang
	$arr = [];
	$arr = ['NHU Y', 'Suong', 'Tai', 'Kiet', 'Minh'];
	$arr1 = [0 =>'NHU Y',1 => 'Suong',2 => 'Tai',3 => 'Kiet',4=> 'Minh'];
	$arr2 = ['nhuy' =>'NHU Y','suong' => 'Suong','tai' => 'Tai','kiet' => 'Kiet','minh=> 'Minh'];
	/*var_dump($arr);
	var_dump($arr1)
	cosole.log();*/

	foreach($arr as $key =>$value){
		echo $key.', '.$value;
		echo "<br>";
	}
	echo "<br>";
	foreach ($arr1 as $key => $value) {
		echo $key.', '.$value;
		echo "<br>";
	}
	//foreach ($arr as $key => $value) {
	//	echo $key.', '.$value;
	//	echo "<br>";
	//}
?>