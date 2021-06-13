<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != 6)
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


			//calling ownerid from userlogin table starts
			$query_tokenuserdetails = "SELECT * FROM `petrol_station_subuser` WHERE `Sub_User_Name` = '$uname'";
			$result_tokenuserdetails= mysqli_query($reg1->con, $query_tokenuserdetails);
			foreach ($result_tokenuserdetails as $rtuds) {
				$Ps_Owner_Id = $rtuds['Sub_User_Parent'];
			}
			$query_tokenstationdetails = "SELECT * FROM `petrol_stations` WHERE Id = '$Ps_Owner_Id'";
			$result_tokenstationdetails= mysqli_query($reg1->con, $query_tokenstationdetails);
			foreach ($result_tokenstationdetails as $rtds) {
				$Ps_Id = $rtds['Id'];
				$Ps_Name = $rtds['P_Name'];
				$Ps_Address = $rtds['P_Address'];
			}
			//calling ownerid from userlogin table ends

			//for dashbaord calcluations starts
			foreach ($result_tokenstationdetails as $rcc) 
				{
				$capitalforcash = $rcc['P_Cash_Capital'];	
				$amountforlitre = $rcc['P_Litre_Capital'];
				$fuelpriceforlitre = $rcc['P_Fuel_Price'];
				$capitalforlitre = $amountforlitre / $fuelpriceforlitre; 
				}

			$query_calculatingspent_forps = "SELECT Token_TC,Token_PS, SUM(Token_Approved_Cash), SUM(Token_Approved_Litres) FROM token_data WHERE Token_PS =$Ps_Id GROUP BY Token_PS";
			$result_calculatingspent_forps= mysqli_query($reg1->con, $query_calculatingspent_forps);
			foreach ($result_calculatingspent_forps as $rcpfl) {
				$spentforlitre = $rcpfl['SUM(Token_Approved_Litres)'];
				$spentforcash = $rcpfl['SUM(Token_Approved_Cash)'];
				$TC_idforspentcapital = $rcpfl['Token_TC'];
			}
			//for dashbaord calcluations ends

			$query_tokentcdetails = "SELECT * FROM `truck_company` WHERE Id = '$TC_idforspentcapital'";
			$result_tokentcdetails= mysqli_query($reg1->con, $query_tokentcdetails);
			foreach ($result_tokentcdetails as $rttc) {
				$spentcap = $rttc['TC_Capital'];
			}



//...................................For Token Page...............................//

//token details starts
			


			$tokenmessage = "";
			$gettoken = "";
			//calling token starts
			if(isset($_GET['token']) && $_GET['token'] != ""){
			$gettoken = $_GET['token'];
			$query_for_taking_id ="SELECT * FROM `token_data` WHERE Token = '$gettoken'";
		    $result_for_taking_id = mysqli_query($reg1->con, $query_for_taking_id);
		    foreach ($result_for_taking_id as $key) {
		        $tc_id_token = $key['Token_TC'];
		    }
			}
			$query_tokendetails  = "SELECT * FROM `token_data`,`truck_drivers`,`petrol_stations`,`truck_company_fuel_data` WHERE token_data.Token_PS = '$Ps_Id' AND token_data.Token = '$gettoken' AND truck_drivers.Id = token_data.Token_Driver AND token_data.Token_TC = truck_company_fuel_data.TC_Id AND token_data.Token_PS=truck_company_fuel_data.PS_Id AND token_data.Status = 'Pending' AND petrol_stations.Id = '$Ps_Id'";
			$result_tokendetails = mysqli_query($reg1->con, $query_tokendetails);
			foreach ($result_tokendetails as $key) {
			   $Ps_fuelrate =$key['PS_Fuel_Price'];
			}
			 if(mysqli_num_rows($result_tokendetails) == 0){
			$tokenmessage= "There is nothing to show";
			}
			//calling token ends


			//calling token for print starts
			if(isset($_GET['token']) && $_GET['token'] != ""){
			$gettoken = $_GET['token'];
			}
			$query_tokendetailsforprint = "SELECT * FROM `token_data`,`truck_drivers`,`petrol_stations` WHERE token_data.Token_PS = '$Ps_Id' AND token_data.Token = '$gettoken' AND truck_drivers.Id = token_data.Token_Driver AND petrol_stations.Id = '$Ps_Id'";
			$result_tokendetailsforprint= mysqli_query($reg1->con, $query_tokendetailsforprint);
			 if(mysqli_num_rows($result_tokendetailsforprint) == 0){
			$tokenmessage= "There is nothing to show";
			}
			//calling token for print ends


			//token review starts
			if(isset($_POST['BTN_approve_token'])){
				extract($_POST);
				$rate=$Ps_fuelrate;
				$litres=$litres_approved;
				$cash=$cash_approved;
				$litreamount  = $litres * $rate;
			    $total_amount = $litreamount + $cash;
			    if ($total_amount <= $spentcap) {
			        $query_approvetoken  = "UPDATE `token_data` SET `Token_Fuel_Rate`= '$Ps_fuelrate',`Token_Approved_Cash` = '$cash_approved',`Token_Approved_Litres` = '$litres_approved',`Status` = 'Approved', `Token_Total_Amount` = '$total_amount',`Token_App_User`= '$uname' WHERE `Token` = '$gettoken'";
			        $result_approvetoken = mysqli_query($reg1->con, $query_approvetoken);
			        
			        if ($result_approvetoken == true) {
			            $query_update = "UPDATE `truck_company` SET `TC_Capital` = (TC_Capital-$total_amount) WHERE Id = '$tc_id_token' ";
			            $result_update_tc_cap = mysqli_query($reg1->con, $query_update);
			            
			            $query_update_petrol_capital  = "UPDATE `petrol_stations` SET `P_Litre_Capital` = (P_Litre_Capital-$litreamount) ,`P_Cash_Capital` = (P_Cash_Capital-$cash_approved) WHERE Id = '$Ps_Id' ";
			            $result_update_petrol_capital = mysqli_query($reg1->con, $query_update_petrol_capital);
			            
			            header('location:sub-petrol-station-tokens-history?action=Approved&');
			            die();
			        } else {
					header('location:sub-petrol-station-search-token?action=failed');
					die();
				}}
				else{
					header('location:sub-petrol-station-search-token?action=Notenoughamount');
					die();
				}
						
			}
			//token review ends
//token details ends


//token history starts
			$query_tokenhistory = "SELECT * FROM `token_data`,`truck_drivers`,`petrol_stations`,`truck_company` WHERE token_data.Token_PS = '$Ps_Id' AND truck_drivers.Id = token_data.Token_Driver AND token_data.Status = 'Approved' AND petrol_stations.Id = '$Ps_Id' AND token_data.Token_TC = truck_company.Id AND token_data.Token_App_User = '$uname'";
			$result_tokenhistory= mysqli_query($reg1->con, $query_tokenhistory);
//token history ends

//petrol company Reset Password starts--
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
					header('location:sub-petrol-station-reset-password?action=notmatched');
					die();
				}
			}
			if(isset($_POST['BTN_new_Pass'])){
				extract($_POST);
				$query_newpass = "UPDATE `user_login` SET `PassWord`='$new_password' WHERE UserName = '".$uname."'";
				$result_newpass= mysqli_query($reg1->con, $query_newpass);
				if($result_newpass == true){
					header('location:sub-petrol-station-dashboard?action=Password-Updated');
					die();
				}
				else{
					header('location:sub-petrol-station-reset-password?action=failed');
					die();
				}
			}
//petrol Reset Password end--
