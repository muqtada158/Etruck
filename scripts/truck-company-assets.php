<?php
	session_start();
	if(!isset($_SESSION['username']) || $_SESSION['role'] != 3)
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
	$query_truckcompany = "SELECT * FROM `user_login` WHERE UserName = '$uname'";
	$result_truckcompany= mysqli_query($reg1->con, $query_truckcompany);
		foreach ($result_truckcompany as $key) {
			$oid = $key['Owner_Id'];
		}
	$query_truckcompanydetails = "SELECT * FROM `truck_company` WHERE TC_Owner_Id = '$oid'";
	$result_truckcompanydetails= mysqli_query($reg1->con, $query_truckcompanydetails);
	foreach ($result_truckcompanydetails as $rtds) {
				$TC_Idfordb = $rtds['Id'];
				$TC_Capital = $rtds['TC_Capital'];
				//$TC_Capital_Remaining = $rtds['TC_Capital_Remaining'];
			}

	//dashboard name and address truck company ends--

	//for dashboard calculations starts
			$query_calculatingspent_forps = "SELECT Token_PS, SUM(Token_Total_Amount) FROM token_data WHERE Token_TC =$TC_Idfordb GROUP BY Token_PS";
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
		$query_tokendriverdetails = "SELECT * FROM `truck_drivers` WHERE `Driver_TC_Owner_Id` = '$oid'";
		$result_tokendriverdetails= mysqli_query($reg1->con, $query_tokendriverdetails);
		//calling data from db of truck drivers end


		//calling data from db of petrolstations starts
		$query_tokenstationdetails = "SELECT * FROM `petrol_stations`";
		$result_tokenstationdetails= mysqli_query($reg1->con, $query_tokenstationdetails);
		//calling data from db of petrolstations end


		//calling data from db of token_data starts
		$query_tokendata = "SELECT * FROM `token_data`,`truck_drivers`,`petrol_stations` WHERE token_data.Token_TC = '$tcid' AND truck_drivers.Id = token_data.Token_Driver AND petrol_stations.Id = token_data.Token_PS ORDER BY token_data.Id DESC";
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
				header('location:truck-company-generate-token?action=Notenoughcapital');
				die();
			}
			else{
			$date = date('Y/m/d H:i:s');
			$token = mt_rand(10000,99999);
			$query_tokendata = "INSERT INTO `token_data`(`Token_Date`, `Token_User`, `Token_TC`, `Token_Driver`, `Token_PS`, `Token_Litres`, `Token_Cash`, `Token`, `Status`) VALUES('$date','$uname','$tcid','$driver_detail','$petrolstaion_detail','$gas_litres','$cash_amount','$token','Pending')";
			$result_tokendata= mysqli_query($reg1->con, $query_tokendata);
			if($result_tokendata == true){
				header('location:truck-company-generate-token?action=Success');
				die();
			}
			else{
				header('location:truck-company-generate-token?action=Failed');
				die();
			}}
		}
		}
		//inserting data to TOKENDATA Table ends


		//calling data from truck driver starts
		$query_tokentruckdriver = "SELECT * FROM `truck_drivers` WHERE TC_Id = '$tcid'";
		$result_tokentruckdriver = mysqli_query($reg1->con, $query_tokentruckdriver );
		//calling data from truck driver ends
	//truck generate token ends--





//truck details starts--
			//calling data from db of truck drivers start
			$query_truckdriverdetails = "SELECT * FROM `truck_drivers` WHERE Driver_TC_Owner_Id = '$oid'";
			$result_truckdriverdetails= mysqli_query($reg1->con, $query_truckdriverdetails);
			foreach ($result_truckdriverdetails as $tdd) {
				$d_plate = $tdd['Driver_Plate_No'];
			}
			//calling data from db of truck drivers end
			//inserting new driver into db starts
			$add_driver_mess = '';
			if(isset($_POST['Driver_Add'])){
				extract($_POST);
				//validating plateno starts
				if($d_plate == $Driver_Plate_No){
					header('location:truck-company-driver-details?action=alreadyexist');
					die();
				} //validating plateno ends
					else{
				$query_insertdriver ="INSERT INTO `truck_drivers`(`Driver_Name`, `Driver_Email`, `Driver_Contact`, `Driver_Plate_No`, `Driver_Address`, `Driver_Id_Card`, `Driver_TC_Owner_Id`) VALUES ('$Driver_Name','$Driver_Email', '$Driver_Contact','$Driver_Plate_No','$Driver_Address','$Driver_Id_Card','$oid')";
				$result_insertdriver= mysqli_query($reg1->con, $query_insertdriver);
				if($result_insertdriver == true){
					header('location:truck-company-driver-details?action=success');
					die();
				}
				else{
					echo "something happend";
				}
						}
			}
			//inserting new driver into db ends
			
	//edit truck drivers starts
			//calling data starts
			if(isset($_GET['id']) && $_GET['id'] != ""){
			$driverid = $_GET['id'];
			$query_truckeditdriverdetails = "SELECT * FROM `truck_drivers` WHERE Id = '$driverid'";
			$result_truckeditdriverdetails= mysqli_query($reg1->con, $query_truckeditdriverdetails);
			}
			//calling data ends
			//updating data starts
			if(isset($_POST['BTN_Driver_Update'])){
				extract($_POST);				
				$query_updatedriver ="UPDATE `truck_drivers` SET `Driver_Name` = '$Up_Driver_Name', `Driver_Email` = '$Up_Driver_Email',`Driver_Contact` = '$Up_Driver_Contact', `Driver_Address` = '$Up_Driver_Address', `Driver_Id_Card` = '$Up_Driver_Id_Card' WHERE Id = '$driverid'";
				$result_updatedriver= mysqli_query($reg1->con, $query_updatedriver);
				if($result_updatedriver == true){
					header('location:truck-company-driver-details?action=updated');
					die();
				}
				else{
					header('location:' . $_SERVER['HTTP_REFERER']. '&action=failed');
					die();
				}
						
			}
			//updating data starts
	//edit ruck drivers ends

//truck details ends--

//truck company transaction details starts--
			//calling data from db of truck transactions  start
			$query_trucktrans = "SELECT * FROM `truck_transaction_annex` WHERE TC_Id = '$tcid'";
			$result_trucktrans= mysqli_query($reg1->con, $query_trucktrans);
			//calling data from db of truck transactions end
//truck company transaction details ends--

//truck company credit details starts--
			//calling data from db of truck credit  start
			$query_truckcredit = "SELECT * FROM `truck_credit_request` WHERE TC_Id = '$tcid' ORDER BY ID DESC;";
			$result_truckcredit= mysqli_query($reg1->con, $query_truckcredit);
			//calling data from db of truck credit end
			if(isset($_POST['Btn_request'])){
				extract($_POST);
				$date = date('Y/m/d H:i:s');
				$query_creditreq = "INSERT INTO `truck_credit_request`(`Date`, `Amount`,`Paid_Amount`, `TC_Id`, `Status`, `Action`) VALUES ('$date','$TC_Requested_Amount','0','$tcid','Notpaid','Pending')";
				$result_creditreq= mysqli_query($reg1->con, $query_creditreq);
				if($result_creditreq == true){
					header('location:truck-company-credit-details?action=success');
					die();
				}
				else{
					echo "something happend";
				}
			}
//truck company credit details ends--

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
					header('location:truck-company-reset-password?action=notmatched');
					die();
				}
			}
			if(isset($_POST['BTN_new_Pass'])){
				extract($_POST);
				$query_newpass = "UPDATE `user_login` SET `PassWord`='$new_password' WHERE UserName = '".$uname."'";
				$result_newpass= mysqli_query($reg1->con, $query_newpass);
				if($result_newpass == true){
					header('location:truck-company-dashboard?action=Password-Updated');
					die();
				}
				else{
					header('location:truck-company-reset-password?action=failed');
					die();
				}
			}
//truck company Reset Password end--


//truck company subusers starts
			
			//calling data from db of truck subusers start
			$query_trucksubuserdetails = "SELECT * FROM `truck_company_subuser` WHERE Sub_User_Parent = '$TC_Idfordb'";
			$result_trucksubuserdetails= mysqli_query($reg1->con, $query_trucksubuserdetails);
			foreach ($result_trucksubuserdetails as $tsub) {
				$tsub_name = $tsub['Sub_User_Name'];
				$tsub_email = $tsub['Sub_User_Email'];
				$tsub_userid = $tsub['Sub_User_ID'];
			}
			//calling data from db of truck subusers end

			//inserting new driver into db starts
			$add_driver_mess = '';
			if(isset($_POST['Sub_User_Add'])){
				extract($_POST);
				//validation starts
				if($tsub_name == $Sub_Name || $tsub_email == $Sub_Email || $tsub_userid == $Sub_Id_Card){
					header('location:truck-company-user-details?action=alreadyexist');
					die();
				} 
				//validation ends
				else{
				$query_insertsubuser ="INSERT INTO `truck_company_subuser`(`Sub_User_Name`, `Sub_User_Email`, `Sub_User_Password`, `Sub_User_Contact`, `Sub_User_ID`, `Sub_User_Parent`) VALUES ('$Sub_Name','$Sub_Email','$Sub_Password','$Sub_Contact','$Sub_Id_Card','$TC_Idfordb')";
				$result_insertsubuser= mysqli_query($reg1->con, $query_insertsubuser);
				$query_insertsubuserforlogin ="INSERT INTO `user_login`(`UserName`, `Email`, `PassWord`, `User_Role`, `Owner_Id`) VALUES ('$Sub_Name','$Sub_Email','$Sub_Password','5','$Sub_Id_Card')";
				$result_insertsubuserforlogin= mysqli_query($reg1->con, $query_insertsubuserforlogin);

				if($result_insertsubuser == true && $result_insertsubuserforlogin == true){
					header('location:truck-company-user-details?action=success');
					die();
				}
				else{
					header('location:truck-company-user-details?action=failed');
					die();
				}
						}
			}
//truck company subusers ends

//truck company dlt token starts
			if(isset($_POST['btn_dlt_token'])){
				extract($_POST);
				$query_dltToken =" DELETE FROM `token_data` WHERE Token = '".$token_id."'";
				$result_dltToken= mysqli_query($reg1->con, $query_dltToken);
				header('location:truck-company-generate-token?action=deleted');
				die();
			}	

//truck company dlt token ends


