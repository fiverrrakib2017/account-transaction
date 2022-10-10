<?php 
include 'function.php';
//$con->autocommit(FALSE);


if (isset($_GET['getCstmrData'])) {
	if ($stmt=$con->prepare("SELECT * FROM account_info")) {
		$stmt->execute();
		$customers = $stmt->fetchAll();
		foreach($customers as $rows){
        echo '<tr>
            <td>'.$rows['id'].'</td>
            <td>'.$rows['customer_name'].'</td>
            <td>'.$rows['account_number'].'</td>
            <td>'.$rows['account_type'].'</td>
            <td>'.$rows['current_balance'].'</td>
            
           

            </tr>';

    	}
	}
	
}
//get single all  customer name
if (isset($_GET['getCstmrName'])) {
	if ($stmt=$con->prepare("SELECT * FROM account_info")) {
		$stmt->execute();
		$customers = $stmt->fetchAll();
		echo '<option>select</option>';
		foreach($customers as $rows){

        echo '<option value="'.$rows['id'].'">'.$rows['customer_name'].'['.$rows['account_number'].']</td>';

    	}
	}
	
}
//add  customer data
if (isset($_POST['customer_name'])) {
		 $customer_name=$_POST['customer_name'];
		 $account_number=$_POST['account_number'];
		 $account_type=$_POST['account_type'];
		 $current_balance=$_POST['current_balance'];
	if ($stmt=$con->prepare("INSERT INTO account_info(account_number,customer_name,account_type,current_balance)VALUES(?,?,?,?)")) {
		$result=$stmt->execute([$account_number,$customer_name,$account_type,$current_balance]);
		if ($result==true) {
			echo 1;
		}else{
			echo 0;
		}
		
	}
	
}
//add  transfer  data
if (isset($_POST['addTransferData'])) {
	$from=$_POST['from'];
	$to=$_POST['to'];
	$amount=$_POST['amount'];
	$date=date("Y-m-d H:i:s");
	

	//update receiver account
	$stmt=$con->prepare("UPDATE account_info SET current_balance=current_balance + ? WHERE id= ? ");
	//$stmt->bind_param('ii',);
	$result=$stmt->execute([$amount,$to]);
	if ($result!==true) {
		echo $stmt->error;
		$con->rollback();//if error roll back transcation 
	}

	//update sender account
	$stmt=$con->prepare("UPDATE account_info SET current_balance=current_balance -? WHERE id=?");
	//$stmt->bind_param('ii',$amount,$from);
	$result=$stmt->execute([$amount,$from]);
	if ($result!==true) {
		echo $stmt->error;
		$con->rollback();//if error roll back transcation 
	}

	//insert credit ledger for sender account
	$stmt=$con->prepare("INSERT INTO account_ledger(account_id,trnx_date,particulars,debit,	credit)VALUES(?,?,?,?,?)");
	$particulars="Fund Transfer to {$to}";
	$debit=0;
	//$stmt->bind_param('issii',);
	$result=$stmt->execute([$from,$date,$particulars,$debit,$amount]);
	if ($result!==true) {
		echo $stmt->error;
		$con->rollback();//if error roll back transcation 
	}

	//insert debit ledger for receiver account
	$stmt=$con->prepare("INSERT INTO account_ledger(account_id,trnx_date,particulars,debit,	credit)VALUES(?,?,?,?,?)");
	$particulars="Fund Receive to {$from}";
	$credit=0;
	//$stmt->bind_param('issii',);
	$result=$stmt->execute([$to,$date,$particulars,$amount,$credit]);
	if ($result!==true) {
		echo $stmt->error;
		$con->rollback();//if error roll back transcation 
	}
	//assuming no errors commit transaction 
	//$con->commit();
	echo 1;
}