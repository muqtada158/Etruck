<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != 2)
	{
		header("Location:../index");
		die();
	}
$uname = $_SESSION['username'];
include('db-connection.php');
$reg1 = new user();



//add petrol station starts
			if(isset($_POST['btn_addstation'])){
				extract($_POST);
				$query_checkownerid = "SELECT Email FROM `user_login`";
				$result_checkownerid= mysqli_query($reg1->con, $query_checkownerid);
				foreach ($result_checkownerid as $key) {
					$email = $key['Email'];
				}
					if($OID == $station_ownerid || $email == $staion_owneremail){
						header('location:subadmin-addtruck?action=failed-email-already-exist');
						die();
					}else{
					$query_addpetrolstation ="INSERT INTO `petrol_stations`(`P_Name`, `P_Address`, `Owner_Id`, `Owner_Name`, `Owner_Contact`, `P_Fuel_Price`) VALUES ('$station_name','$station_address','$station_ownerid','$station_ownername','$station_ownercontact','$station_fuelrate')";
					$result_addpetrolstation= mysqli_query($reg1->con, $query_addpetrolstation);

					$query_addpetroluser ="INSERT INTO `user_login` (`UserName`, `Email`, `PassWord`, `User_Role`, `Owner_Id`) VALUES ('$station_ownerusername','$station_owneremail','$station_ownerpass','4','$station_ownerid')";
					$result_addpetroluser= mysqli_query($reg1->con, $query_addpetroluser);


					if($result_addpetrolstation == true){
						header('location:subadmin-addpetrolstation?action=success');
						die();
					}
					else{
						echo "something happend";
					}}
			}
//add petrol station ends




//for dashboard

		$query_callps = "SELECT * FROM `petrol_stations`";
		$result_callps= mysqli_query($reg1->con, $query_callps);
		$rowsforcallps = mysqli_num_rows($result_callps);

		$query_calltransbymonth = "SELECT * FROM `token_data` WHERE MONTH(Token_Date) = MONTH(CURRENT_DATE()) AND YEAR(Token_Date) = YEAR(CURRENT_DATE())";
		$result_calltransbymonth= mysqli_query($reg1->con, $query_calltransbymonth);	
		$rowsforcalltransbymonth = mysqli_num_rows($result_calltransbymonth);
		
		
		$query_calltruckcompany = "SELECT * FROM `truck_company`";
		$result_calltruckcompany= mysqli_query($reg1->con, $query_calltruckcompany);
		$rowsforcalltruckcompany = mysqli_num_rows($result_calltruckcompany);



//for closing popup
		if(isset($_POST['btn_cancel_pass'])){
				extract($_POST);
				header('location:Subadmin-changepassword');
					die();
			}
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