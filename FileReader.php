<?php 
 namespace Inventory\Auth\Previous;
class Person {
	public $name,$email,$password;

	public function __construct($name,$email,$password){
		$this->name=$name;
		$this->email=$email;
		$this->password=$password;
	}
	public function getName(){
		return $this->name;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getPassword(){
		return $this->password;
	}
}




 ?>