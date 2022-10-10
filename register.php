<?php 
include('function.php');
if (isset($_POST['backendData'])) {
	 $name= $_POST['name'];
	 $email= $_POST['email'];
	 $password= $_POST['password'];
	 $active='1';
	
	 // if ($result=$conn->query("INSERT INTO users(name,email,password,active)VALUES('$name','$email','$password','1')")) {
	 // 	if ($result==true) {
	 // 			echo "Data insert successfully";
	 			
	 // 		}else{
	 // 			echo "Something else please try again";
	 // 		}
	 // }

}
$stmt=$conn->prepare("INSERT INTO users (name,email,password,active)VALUES(?,?,?,?)");
		$stmt->bind_param("sssi",$name,$email,$password,$active);
		$result=$stmt->execute();
		if ($result==true) {
			echo "Data Insert Successfully ";
		}else{
			echo "Something else please try again letter";
		}







 ?>