<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != 2.1)
	{
		header("Location:../index");
		die();
	}
$uname = $_SESSION['username'];
include('db-connection.php');
$reg1 = new user();


//add truck company starts
			//for add truck petrol station dropdown start
			$query_tcps = "SELECT * FROM `petrol_stations`";
			$result_tcps= mysqli_query($reg1->con, $query_tcps);
			//for add truck petrol station dropdown end


			if(isset($_POST['btn_addtruckcompany'])){
				extract($_POST);

				$query_checkownerid = "SELECT Email FROM `user_login`";
				$result_checkownerid= mysqli_query($reg1->con, $query_checkownerid);
				foreach ($result_checkownerid as $key) {
					$email = $key['Email'];
				}
					if($OID == $companyownerid || $email == $companyemail){
						header('location:subadmin-addtruck?action=failed-ownerid-or-email-already-exist');
						die();
					}else{
						//for getting select values with commas start
						$petrolstations= implode(',',$_POST['petrolstations']);
						//for getting select values with commas ends
					$query_addtruckcompany ="INSERT INTO `truck_company`(`TC_Name`, `TC_Address`, `TC_Owner_Id`, `TC_Owner_Name`, `TC_Owner_Contact`,`TC_PetrolStations`) VALUES ('$companyname','$companyaddress','$companyownerid','$companyownername','$companyownercontact','$petrolstations')";
					
					$result_addtruckcompany= mysqli_query($reg1->con, $query_addtruckcompany);
					$query_addtruckuser ="INSERT INTO `user_login` (`UserName`, `Email`, `PassWord`, `User_Role`, `Owner_Id`) VALUES ('$companyusername','$companyemail','$companypassword','3','$companyownerid')";
					$result_addtruckuser= mysqli_query($reg1->con, $query_addtruckuser);

					if($result_addtruckcompany == true){
						header('location:subadmin-addtruck?action=success');
						die();
					}
					else{
						echo "something happend";
					}}
			}
//add truck company ends


//for dashboard starts
		$query_callps = "SELECT * FROM `petrol_stations`";
		$result_callps= mysqli_query($reg1->con, $query_callps);
		$rowsforcallps = mysqli_num_rows($result_callps);

		$query_calltransbymonth = "SELECT * FROM `token_data` WHERE MONTH(Token_Date) = MONTH(CURRENT_DATE()) AND YEAR(Token_Date) = YEAR(CURRENT_DATE())";
		$result_calltransbymonth= mysqli_query($reg1->con, $query_calltransbymonth);	
		$rowsforcalltransbymonth = mysqli_num_rows($result_calltransbymonth);
		
		
		$query_calltruckcompany = "SELECT * FROM `truck_company`";
		$result_calltruckcompany= mysqli_query($reg1->con, $query_calltruckcompany);
		$rowsforcalltruckcompany = mysqli_num_rows($result_calltruckcompany);
//for dashboard ends


//for closing popup starts
		if(isset($_POST['btn_cancel_pass'])){
				extract($_POST);
				header('location:subadmin-changepassword');
					die();
			}
//for closing popup starts

$messagecheck = "";
			$validation = "No";
		if(isset($_POST['btn_checkpass'])){
				extract($_POST);
				$query_checkpass ="SELECT * FROM `user_login` WHERE UserName = '".$uname."' && PassWord = '".$checkpass."'";
				$result_checkpass= mysqli_query($reg1->con, $query_checkpass);
				if(mysqli_num_rows($result_checkpass) == 1){
					$validation = "Yes";
				}
				else{
					$validation = "No";
					$messagecheck = "incorrect password please try again";
					
				}
			}


//updating pass with validation
		
		if(isset($_POST['btn_pass_new_up'])){
			extract($_POST);
	    $querycheck = "SELECT * FROM `user_login` WHERE UserName = '".$uname."' && PassWord = '".$new_pass."'";
	    $resultcheck = mysqli_query($reg1->con, $querycheck);
	    	
	    	if(mysqli_num_rows($resultcheck) == 1){
	    	$messagecheck = "You entered your old password try again" ;
	    	} 
	    	else{
	    	$query_uppass = "UPDATE `user_login` SET PassWord = '".$new_pass."' WHERE UserName = '".$uname."' ";
				$result_uppass= mysqli_query($reg1->con, $query_uppass);
				header("location:subadmin-changepassword?action=success");
				die();
	    	}
		}