<?php 

require 'product.php';

class Book extends Product{
	protected $isbn_number;
	protected $publish_year;

	public function __construct($id,$title,$price,$isbn_number,$publish_year){
		parent::__construct($id,$title,$price);
		echo "<br>Book Construct....<br>";
		$this->isbn_number=$isbn_number;
		$this->publish_year=$publish_year;
	}
	public function showInfo(){
		parent::__construct();
		echo "ISBN:{$this->isbn_number}<br>";
		echo "Year:{$this->publish_year}<br>";
	}
}


 ?>