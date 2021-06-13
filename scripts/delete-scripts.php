<?php
session_start();
if(!isset($_SESSION['username']))
	{
		header("Location:../index");
		die();
	}
include('db-connection.php');
$reg1 = new user();

///////////////////////////////////Delete Section For Superadmin ////////////////////////////////////

//Delete petrol station starts
if(isset($_GET['id']) && $_GET['action'] == "dlt_petrolstation")
		{ 
		    $ID =$_GET['id'];
		    $query_dlt_petrolstation = "DELETE FROM `petrol_stations` WHERE Id = '$ID'"; 
			$result_dlt_petrolstation= mysqli_query($reg1->con, $query_dlt_petrolstation);
			header("Location:../super-admin/superadmin-allpetrolstation?action=deleted");
			die();
		}
//Delete petrol station ends

//Delete truck company starts
if(isset($_GET['id']) && $_GET['action'] == "dlt_truckcompany")
		{ 
		    $ID =$_GET['id'];
		    $query_dlt_truckcompany = "DELETE FROM `truck_company` WHERE TC_Owner_Id = '$ID'"; 
			$result_dlt_truckcompany= mysqli_query($reg1->con, $query_dlt_truckcompany);
			$query_dlt_truckcompany1 = "DELETE FROM `user_login` WHERE Owner_Id = '$ID'"; 
			$result_dlt_truckcompany1= mysqli_query($reg1->con, $query_dlt_truckcompany1);

			header("Location:../super-admin/superadmin-alltruck?action=deleted");
			die();
		}
//Delete truck company ends

//Delete cash annex history starts
if(isset($_GET['id']) && $_GET['action'] == "dlt_cashannexhistory")
		{ 
		    $ID =$_GET['id'];
		    $Annex = '../super-admin/petrolstation-cash_annex_transactions/'.$_GET['img'];
		    $query_dlt_cahistory = "DELETE FROM `ps_transaction_annex_cash` WHERE Id = '$ID'"; 
			$result_dlt_cahistory= mysqli_query($reg1->con, $query_dlt_cahistory);
			unlink($Annex);
			header("Location:../super-admin/superadmin-cashannexhistory?action=deleted");
			die();
		}
//Delete cash annex history ends

//Delete litre annex history starts
if(isset($_GET['id']) && $_GET['action'] == "dlt_litreannexhistory")
		{ 
		    $ID =$_GET['id'];
		    
		    $query_dlt_lahistory = "DELETE FROM `ps_transaction_annex_litre` WHERE Id = '$ID'"; 
			$result_dlt_lahistory= mysqli_query($reg1->con, $query_dlt_lahistory);
			//deleting image
			$Annex = '../super-admin/petrolstation-litre_annex_transactions/'.$_GET['img'];
			unlink($Annex);
			header("Location:../super-admin/superadmin-litreannexhistory?action=deleted");
			die();
		}
//Delete litre annex history ends

//Delete litre annex history starts
if(isset($_GET['id']) && $_GET['action'] == "dlt_truckannexhistory")
		{ 
		    $ID =$_GET['id'];
		    
		    $query_dlt_tchistory = "DELETE FROM `truck_transaction_annex` WHERE Id = '$ID'"; 
			$result_dlt_tchistory= mysqli_query($reg1->con, $query_dlt_tchistory);
			//deleting image
			$Annex = '../super-admin/truck-annex-transactions/'.$_GET['img'];
			unlink($Annex);
			header("Location:../super-admin/superadmin-truckannexhistory?action=deleted");
			die();
		}
//Delete litre annex history ends

//Delete petrol station starts
if(isset($_GET['id']) && $_GET['action'] == "dlt_credithistory")
		{ 
		    $ID =$_GET['id'];
		    $query_dlt_credithistory = "DELETE FROM `truck_credit_request` WHERE Id = '$ID'"; 
			$result_dlt_credithistory= mysqli_query($reg1->con, $query_dlt_credithistory);
			header("Location:../super-admin/superadmin-truck-credit-history?action=deleted");
			die();
		}
//Delete petrol station ends

//Delete petrol station starts
if(isset($_GET['id']) && $_GET['action'] == "dlt_subadmin")
		{ 
		    $ID =$_GET['id'];
		    $query_dlt_subadmin = "DELETE FROM `user_login` WHERE Id = '$ID'"; 
			$result_dlt_subadmin= mysqli_query($reg1->con, $query_dlt_subadmin);
			header("Location:../super-admin/superadmin-manage-subadmin?action=deleted");
			die();
		}
//Delete petrol station ends




///////////////////////////////////Delete Section For TruckCompany ////////////////////////////////////



//Delete Truck Driver starts
if(isset($_GET['id']) && $_GET['action'] == "dlt_truckdriver")
		{ 
		    $ID =$_GET['id'];
		    $query_dlt_credithistory = "DELETE FROM `truck_drivers` WHERE Id = '$ID'"; 
			$result_dlt_credithistory= mysqli_query($reg1->con, $query_dlt_credithistory);
			header("Location:../truck-company/truck-company-driver-details?action=deleted");
			die();
		}
//Delete Truck Driver ends




///////////////////////////////////Delete Section For SUB-TruckCompany ////////////////////////////////////



//Delete Truck Driver starts
if(isset($_GET['id']) && $_GET['action'] == "dlt_subuser_truck")
		{ 
		    $ID =$_GET['id'];
		    $query_dlt_subuser_truck = "DELETE FROM `truck_company_subuser` WHERE Sub_User_ID = '$ID'"; 
			$result_dlt_subuser_truck= mysqli_query($reg1->con, $query_dlt_subuser_truck);
			$query_dlt_subuser_truck1 = "DELETE FROM `user_login` WHERE Owner_Id = '$ID'"; 
			$result_dlt_subuser_truck1= mysqli_query($reg1->con, $query_dlt_subuser_truck1);
			header("Location:../truck-company/truck-company-user-details?action=deleted");
			die();
		}
//Delete Truck Driver ends



///////////////////////////////////Delete Section For SUB-TruckCompany ////////////////////////////////////



//Delete Truck Driver starts
if(isset($_GET['id']) && $_GET['action'] == "dlt_subuser_petrol")
		{ 
		    $ID =$_GET['id'];
		    $query_dlt_subuser_petrol = "DELETE FROM `petrol_station_subuser` WHERE Sub_User_ID = '$ID'"; 
			$result_dlt_subuser_petrol= mysqli_query($reg1->con, $query_dlt_subuser_petrol);
			$query_dlt_subuser_petrol1 = "DELETE FROM `user_login` WHERE Owner_Id = '$ID'"; 
			$result_dlt_subuser_petrol1= mysqli_query($reg1->con, $query_dlt_subuser_petrol1);
			header("Location:../petrol-station/petrol-station-user-details?action=deleted");
			die();
		}
//Delete Truck Driver ends