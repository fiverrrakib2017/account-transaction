<?php 

class DB{
	private $host="localhost";
	private $username="root";
	private $password="";
	protected $db_name="php_inventory";
	public $conn;
	public function __construct(){
		 try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            return   "Connection success";
        }
        catch (PDOException $e) {
            echo "database problem" . $e->getMessage();
        }
	}
}





 ?>