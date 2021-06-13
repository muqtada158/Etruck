<?php
	session_start();
	if(!isset($_SESSION['username']) || $_SESSION['role'] != 5)
		{
			header("Location:../");
			die();
		}
	else{
	$uname = $_SESSION['username'];
	include('db-connection.php');
	$reg1 = new user();
	}

//...................................For Dashboard Page...............................//

	//dashboard name and address truck company starts--
	$query_truckcompany = "SELECT * FROM `truck_company_subuser` WHERE Sub_User_Name = '$uname'";
	$result_truckcompany= mysqli_query($reg1->con, $query_truckcompany);
		foreach ($result_truckcompany as $key) {
			$ownerid = $key['Sub_User_Parent'];
		}
	$query_truckcompanydetails = "SELECT * FROM `truck_company` WHERE Id = '$ownerid'";
	$result_truckcompanydetails= mysqli_query($reg1->con, $query_truckcompanydetails);
	foreach ($result_truckcompanydetails as $rtds) {
				$TC_Idfordb = $rtds['Id'];
				$TC_Capital = $rtds['TC_Capital'];
				$TC_Forownerid = $rtds['TC_Owner_Id'];
			}

	//dashboard name and address truck company ends--

	//for dashboard calculations starts
			$query_calculatingspent_forps = "SELECT Token_PS, SUM(Token_Total_Amount) FROM token_data WHERE Token_TC =$ownerid GROUP BY Token_PS";
			$result_calculatingspent_forps= mysqli_query($reg1->con, $query_calculatingspent_forps);
			foreach ($result_calculatingspent_forps as $rcpfl) {
				$spentforcash = $rcpfl['SUM(Token_Total_Amount)'];
			}
	//for dashboard calculations ends



	//dashboard petrol stations starts--
		//getting multiple rows from separated commas value start
		foreach ($result_truckcompanydetails as $key) {
			$id = $key['TC_PetrolStations'];
			$tcid = $key['Id'];
		}
		$arr = array($id); 
		$ids = implode(', ', $arr); 
		$sql = ('SELECT * FROM petrol_stations WHERE Id IN ('.$ids.')' ); 
		$result_truckdetails = mysqli_query($reg1->con, $sql);
		//getting multiple rows from separated commas value start
	//dashboard petrol stations end--
			

	//truck generate token starts--
		//calling data from db of truck drivers start
		$query_tokendriverdetails = "SELECT * FROM `truck_drivers` WHERE `Driver_TC_Owner_Id` = '$TC_Forownerid'";
		$result_tokendriverdetails= mysqli_query($reg1->con, $query_tokendriverdetails);
		//calling data from db of truck drivers end


		//calling data from db of petrolstations starts
		$query_tokenstationdetails = "SELECT * FROM `petrol_stations`";
		$result_tokenstationdetails= mysqli_query($reg1->con, $query_tokenstationdetails);
		//calling data from db of petrolstations end


		//calling data from db of token_data starts
		$query_tokendata = "SELECT * FROM `token_data`,`truck_drivers`,`petrol_stations` WHERE token_data.Token_User = '$uname' AND truck_drivers.Id = token_data.Token_Driver AND petrol_stations.Id = token_data.Token_PS ORDER BY token_data.Id DESC";
		$result_tokendata= mysqli_query($reg1->con, $query_tokendata);
		//calling data from db of token_data end


		//truck company generate token validations starts
				$query_calculatingspent = "SELECT Token_TC, SUM(Token_Approved_Cash), SUM(Token_Approved_Litres),SUM(Token_Total_Amount), Token_Fuel_Rate FROM token_data WHERE Token_TC ='$TC_Idfordb' GROUP BY Token_TC";
				$result_calculatingspent= mysqli_query($reg1->con, $query_calculatingspent);
					foreach ($result_calculatingspent as $rcs) 
					{
					$spentcapital = $rcs['SUM(Token_Total_Amount)']; 
					}
		//truck company generate token validations ends
					

		//inserting data to TOKENDATA Table starts
		if(isset($_POST['Btn_generate'])){
			extract($_POST);
			$query_calculatingamount = "SELECT * FROM `truck_company_fuel_data` WHERE PS_Id = '$petrolstaion_detail' && TC_Id = '$TC_Idfordb'";

			$result_calculatingamount= mysqli_query($reg1->con, $query_calculatingamount);
					foreach ($result_calculatingamount as $rca) 
							{
							$rate = $rca['PS_Fuel_Price']; 
							}

			if($rate == null)
			{
				header('location:truck-company-generate-token?action=fuel-rate-error');
				die();
			}
			else{				
			$litresforcalculating = $gas_litres;
			$cashforcalculating = $cash_amount;
			$checkamount= $rate * $litresforcalculating + $cashforcalculating;
			if($checkamount > $TC_Capital)
			{
				header('location:sub-truck-company-generate-token?action=Notenoughcapital');
				die();
			}
			else{
			$date = date('Y/m/d H:i:s');
			$token = mt_rand(10000,99999);
			$query_tokendata = "INSERT INTO `token_data`(`Token_Date`, `Token_User`, `Token_TC`, `Token_Driver`, `Token_PS`, `Token_Litres`, `Token_Cash`, `Token`, `Status`) VALUES('$date','$uname','$tcid','$driver_detail','$petrolstaion_detail','$gas_litres','$cash_amount','$token','Pending')";
			$result_tokendata= mysqli_query($reg1->con, $query_tokendata);
			if($result_tokendata == true){
				header('location:sub-truck-company-generate-token?action=Success');
				die();
			}
			else{
				header('location:sub-truck-company-generate-token?action=Failed');
				die();
			}}
		}}
		//inserting data to TOKENDATA Table ends
		//truck company Reset Password starts--
			$mykey = ' ';
			$mynewkey = 'Hidden';
			if(isset($_POST['BTN_Old_Pass'])){
				extract($_POST);
				$query_oldpass = "SELECT * FROM `user_login` WHERE UserName = '$uname' && PassWord = '".$old_password."'";
				$result_oldpass= mysqli_query($reg1->con, $query_oldpass);
				if(mysqli_num_rows($result_oldpass) == 1){
					$mykey = 'Hidden';
					$mynewkey = ' ';
				}
				else{
					header('location:sub-truck-company-reset-password?action=notmatched');
					die();
				}
			}
			if(isset($_POST['BTN_new_Pass'])){
				extract($_POST);
				$query_newpass = "UPDATE `user_login` SET `PassWord`='$new_password' WHERE UserName = '".$uname."'";
				$result_newpass= mysqli_query($reg1->con, $query_newpass);
				if($result_newpass == true){
					header('location:sub-truck-company-dashboard?action=Password-Updated');
					die();
				}
				else{
					header('location:sub-truck-company-reset-password?action=failed');
					die();
				}
			}
//truck company Reset Password end--
			//truck company dlt token starts
			if(isset($_POST['btn_dlt_token'])){
				extract($_POST);
				$query_dltToken ="DELETE FROM `token_data` WHERE Token = '".$token_id."'";
				$result_dltToken= mysqli_query($reg1->con, $query_dltToken);
				header('location:sub-truck-company-generate-token?action=deleted');
				die();
			}	
//truck company dlt token ends


//truck company subusers ends


