<?php 
// namespace Inventory;
// class CD{
// 	public $gf_name='';
// 	public function __construct($gf_name){
// 		echo $this->gf_name=$gf_name;
// 	}
// }

include 'function.php';

use Product\Apple\AnotherClass as Rakib;

$apple=new Rakib();
$apple->leptop("Mackbook M1 Pro","Core i3 5th gen",87000.00,"Apple");
echo "<br>";
echo "<br>";
echo "<br>";

$al=new Rakib();
$al->AllInOnePc("Apple Desktop");

 ?>