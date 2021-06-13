<?php
    
    session_start();
    if (!isset($_SESSION['username']) || $_SESSION['role'] != 1) {
                    header("Location:../");
                    die();
    }
    $uname = $_SESSION['username'];
    include('db-connection.php');
    $reg1 = new user();
    //error_reporting(0);
    error_reporting(E_ERROR | E_PARSE);
    
    //--------------------------------------FOR SUPERADMIN PETROL STATION-------------------------------------//
    //add petrol station starts
    if (isset($_POST['btn_addstation'])) {
                    extract($_POST);
                    $query_checkownerid  = "SELECT Email FROM `user_login`";
                    $result_checkownerid = mysqli_query($reg1->con, $query_checkownerid);
                    foreach ($result_checkownerid as $key) {
                                    $email = $key['Email'];
                    }
                    if ($OID == $station_ownerid || $email == $staion_owneremail) {
                                    header('location:superadmin-addtruck?action=failed-email-already-exist');
                                    die();
                    } else {
                                    $query_addpetrolstation  = "INSERT INTO `petrol_stations`(`P_Name`, `P_Address`, `Owner_Id`, `Owner_Name`, `Owner_Contact`, `P_Fuel_Price`) VALUES ('$station_name','$station_address','$station_ownerid','$station_ownername','$station_ownercontact','$station_fuelrate')";
                                    $result_addpetrolstation = mysqli_query($reg1->con, $query_addpetrolstation);
                                    
                                    $query_addpetroluser  = "INSERT INTO `user_login` (`UserName`, `Email`, `PassWord`, `User_Role`, `Owner_Id`) VALUES ('$station_ownerusername','$station_owneremail','$station_ownerpass','4','$station_ownerid')";
                                    $result_addpetroluser = mysqli_query($reg1->con, $query_addpetroluser);
                                    
                                    
                                    if ($result_addpetrolstation == true) {
                                                    header('location:superadmin-addpetrolstation?action=success');
                                                    die();
                                    } else {
                                                    echo "something happend";
                                    }
                    }
    }
    //add petrol station ends
    //update petrol station starts
    if (isset($_POST['btn_upstation'])) {
                    extract($_POST);
                    if (isset($_GET['id']) && $_GET['id'] != "") {
                                    $getid = $_GET['id'];
                    }
                    $query_uppetrolstation = "UPDATE `petrol_stations` SET `P_Address`='$upstation_address',`Owner_Id`='$upstation_ownerid',`Owner_Name`='$upstation_ownername',`Owner_Contact`='$upstation_ownercontact',`Username`='$upstation_ownerusername',`Password`='$upstaion_ownerpass'WHERE Id = '$getid'";
                    
                    $result_uppetrolstation = mysqli_query($reg1->con, $query_uppetrolstation);
                    if ($result_uppetrolstation == true) {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&updated');
                                    die();
                    } else {
                                    echo "something happend";
                    }
    }
    
    //update petrol station ends
    //add petrol station litre annex details starts
    if (isset($_POST['btn_addpslitreannex'])) {
                    extract($_POST);
                    if (isset($_GET['id']) && $_GET['id'] != "") {
                                    $getid = $_GET['id'];
                    }
                    $img_name       = $_FILES['addpstransactionannex']['name'];
                    $tmp_name       = $_FILES['addpstransactionannex']['tmp_name'];
                    $file_size      = $_FILES['addannexcashannex']['size'];
                    $valid_format   = array(
                                    'jpg',
                                    'jpeg',
                                    'png'
                    );
                    $file_extension = explode('.', $img_name);
                    $file_extension = strtolower(end($file_extension));
                    if (in_array($file_extension, $valid_format)) {
                                    $new_file_name    = uniqid('etruck', true) . '.' . $file_extension;
                                    $file_destination = 'petrolstation-litre_annex_transactions/' . $new_file_name;
                                    move_uploaded_file($tmp_name, $file_destination);
                    }
                    if (file_exists($file_destination)) {
                                    $query_addpstransaction  = "INSERT INTO `ps_transaction_annex_litre`(`Ps_Id`, `Date`, `Amount`, `Annex`) VALUES ('$getid','$addpstransactiondate','$addpstansactionamount','$new_file_name')";
                                    $result_addpstransaction = mysqli_query($reg1->con, $query_addpstransaction);
                                    
                                    $query_addcapital  = "UPDATE `petrol_stations` SET `P_Litre_Capital`= P_Litre_Capital + $addpstansactionamount WHERE Id = $getid";
                                    $result_addcapital = mysqli_query($reg1->con, $query_addcapital);
                                    
                                    if ($result_addpstransaction == true) {
                                                    header('location:superadmin-pstransactionlitre?id='.$getid.'&action=success');
                                                    die();
                                    }
                    }
                    
                    else {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=failed-file-extension-error');
                                    die();
                    }
                    
    }
    //add petrol station litre annex details ends
    //litre annex history starts
    //joining two tables
    $query_litreannex  = "SELECT petrol_stations.P_Name, petrol_stations.P_Address,ps_transaction_annex_litre.Id, ps_transaction_annex_litre.Date, ps_transaction_annex_litre.Amount, ps_transaction_annex_litre.Annex FROM petrol_stations, ps_transaction_annex_litre WHERE petrol_stations.Id = ps_transaction_annex_litre.Ps_Id ORDER BY petrol_stations.Id ";
    $result_litreannex = mysqli_query($reg1->con, $query_litreannex);
    //litre annex history ends
    
    
    //add petrol station cash annex details starts
    if (isset($_POST['btn_annexcash'])) {
                    extract($_POST);
                    if (isset($_GET['id']) && $_GET['id'] != "") {
                                    $getid = $_GET['id'];
                    }
                    //for randomly generate name of images duplication hack XD
                    //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx//
                    $img_name       = $_FILES['addannexcashannex']['name'];
                    $tmp_name       = $_FILES['addannexcashannex']['tmp_name'];
                    $file_size      = $_FILES['addannexcashannex']['size'];
                    $valid_format   = array(
                                    'jpg',
                                    'jpeg',
                                    'png'
                    );
                    $file_extension = explode('.', $img_name);
                    $file_extension = strtolower(end($file_extension));
                    if (in_array($file_extension, $valid_format)) {
                                    $new_file_name    = uniqid('etruck', true) . '.' . $file_extension;
                                    $file_destination = 'petrolstation-cash_annex_transactions/' . $new_file_name;
                                    move_uploaded_file($tmp_name, $file_destination);
                    }
                    //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx//
                    
                    if (file_exists($file_destination)) {
                                    $query_addannexcash  = "INSERT INTO `ps_transaction_annex_cash`(`Ps_Id`, `Date`, `Amount`, `Annex`) VALUES ('$getid','$addannexcashdate','$addannexcashamount','$new_file_name')";
                                    $result_addannexcash = mysqli_query($reg1->con, $query_addannexcash);
                                    
                                    $query_addcapital  = "UPDATE `petrol_stations` SET `P_Cash_Capital`= P_Cash_Capital + $addannexcashamount WHERE Id = '$getid'";
                                    $result_addcapital = mysqli_query($reg1->con, $query_addcapital);
                                    if ($result_addannexcash == true) {
                                                    header('location:superadmin-pstransactioncash?id='.$getid.'&action=success');
                                                    die();
                                    }
                    }
                    //for not getting mentioned file extension
                    else {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=failed-file-extension-error');
                                    die();
                    }
    }
    //add petrol station cash annex details ends
    
    
    
    
    //cash annex history starts
    //joining two tables
    $query_cashannex  = "SELECT petrol_stations.P_Name, petrol_stations.P_Address, ps_transaction_annex_cash.Id, ps_transaction_annex_cash.Date, ps_transaction_annex_cash.Amount, ps_transaction_annex_cash.Annex FROM petrol_stations, ps_transaction_annex_cash WHERE petrol_stations.Id = ps_transaction_annex_cash.Ps_Id ORDER BY ps_transaction_annex_cash.Id ";
    $result_cashannex = mysqli_query($reg1->con, $query_cashannex);
    //cash annex history ends        
    
    
    
    //petrol station transacion of drivers in litres starts
    if (isset($_GET['id']) && $_GET['id'] != "") {
                    $getid                      = $_GET['id'];
                    $query_pstransacioninlitre  = "SELECT *  FROM `petrol_stations` WHERE Id = '$getid'";
                    $result_pstransacioninlitre = mysqli_query($reg1->con, $query_pstransacioninlitre);
                    
                    $query_pstransacionofdriverinlitre = "SELECT * FROM token_data, truck_company, petrol_stations, truck_drivers WHERE token_data.Token_PS = '$getid' AND truck_company.Id = token_data.Token_TC AND petrol_stations.Id = token_data.Token_PS AND truck_drivers.Id = token_data.Token_Driver AND token_data.Status = 'Approved' ORDER BY token_data.Id";
                    
                    $result_pstransacionofdriverinlitre = mysqli_query($reg1->con, $query_pstransacionofdriverinlitre);
                    
                    $query_calculatingcapitalforlitres  = "SELECT * FROM `petrol_stations` WHERE Id = '$getid'";
                    $result_calculatingcapitalforlitres = mysqli_query($reg1->con, $query_calculatingcapitalforlitres);
                    foreach ($result_calculatingcapitalforlitres as $rcc) {
                                    $capitalforcash    = $rcc['P_Cash_Capital'];
                                    $amountforlitre    = $rcc['P_Litre_Capital'];
                                    $fuelpriceforlitre = $rcc['P_Fuel_Price'];
                                    $capitalforlitre   = $amountforlitre / $fuelpriceforlitre;
                    }
                    
                    $query_calculatingspent_forps  = "SELECT Token_PS, SUM(Token_Approved_Cash), SUM(Token_Approved_Litres) FROM token_data WHERE Token_PS ='$getid' GROUP BY Token_PS";
                    $result_calculatingspent_forps = mysqli_query($reg1->con, $query_calculatingspent_forps);
                    $remainingforlitre = $capitalforlitre-$spentforlitre;
    }
    
    //petrol station transacion of drivers in litres ends
    
    //manage petrol station starts
    $query_managepetrol  = "SELECT * FROM petrol_stations , user_login WHERE user_login.Owner_Id = petrol_stations.Owner_Id AND user_login.User_Role = 4";
    $result_managepetrol = mysqli_query($reg1->con, $query_managepetrol);
    //manage petrol station ends
    
    //update all petrolstations starts
    if (isset($_GET['id']) && $_GET['id'] != "") {
                    $getid           = $_GET['id'];
                    $query_updateps  = "SELECT *  FROM `petrol_stations` WHERE Owner_Id = '$getid'";
                    $result_updateps = mysqli_query($reg1->con, $query_updateps);
                    $query_update1   = "SELECT *  FROM `user_login` WHERE Owner_Id = '$getid'";
                    $result_update1  = mysqli_query($reg1->con, $query_update1);
                    //for update fuel price page
                    $query_upfprice  = "SELECT *  FROM `petrol_stations` WHERE Id = '$getid'";
                    $result_upfprice = mysqli_query($reg1->con, $query_upfprice);
                    
                    //for update fuel price selling page
                    $query_upfpriceselling  = "SELECT *  FROM `petrol_stations` WHERE Id = '$getid'";
                    $result_upfpriceselling = mysqli_query($reg1->con, $query_upfpriceselling);
    }
    if (isset($_POST['btn_upstation'])) {
                    extract($_POST);
                    $query_updatepetrolstation = "UPDATE `petrol_stations` SET `P_Address`='$upstation_address',`Owner_Name`='$upstation_ownername',`Owner_Contact`='$upstation_ownercontact'WHERE Owner_Id = '$getid'";
                    
                    $result_updatepetrolstation = mysqli_query($reg1->con, $query_updatepetrolstation);
                    
                    if ($result_updatepetrolstation == true) {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=updated');
                                    die();
                    } else {
                                    echo "something happend";
                    }
    }
    if (isset($_POST['btn_upstationcred'])) {
                    extract($_POST);
                    $query_updatepetrolstation = "UPDATE `user_login` SET `UserName`='$upstation_ownerusernamecred',`PassWord`='$upstaion_ownerpasscred' WHERE Owner_Id = '$getid'";
                    
                    $result_updatepetrolstation = mysqli_query($reg1->con, $query_updatepetrolstation);
                    
                    if ($result_updatepetrolstation == true) {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=updated');
                                    die();
                    } else {
                                    echo "something happend";
                    }
    }
    
    //update all petrolstations ends
    //update fuel price starts
    //updating fuel price buying
    if (isset($_POST['btn_updatefuelprice'])) {
                    extract($_POST);
                    $query_updatefuelprice  = "UPDATE `petrol_stations` SET `P_Fuel_Price`= '$newpricetxt'
                                            WHERE Id = '$getid'";
                    $result_updatefuelprice = mysqli_query($reg1->con, $query_updatefuelprice);
                    if ($result_updatefuelprice == true) {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=success');
                                    die();
                    } else {
                                    echo "something happend";
                    }
    }
    //updating fuel price selling
    if (isset($_POST['btn_updatefuelpriceselling'])) {
                    extract($_POST);
                    $query_updatefuelpriceselling  = "UPDATE `petrol_stations` SET `P_Fuel_Selling_Price`= '$newsellingpricetxt' WHERE Id = '$getid'";
                    $result_updatefuelpriceselling = mysqli_query($reg1->con, $query_updatefuelpriceselling);
                    if ($result_updatefuelpriceselling == true) {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=success');
                                    die();
                    } else {
                                    echo "something happend";
                    }
    }
    //update fuel price ends
    //-------------------------------------------------FOR SUPERADMIN TRUCK---------------------------------------//
    
    //add truck company starts
    if (isset($_POST['btn_addtruckcompany'])) {
                    extract($_POST);
                    $query_checkownerid  = "SELECT Email FROM `user_login`";
                    $result_checkownerid = mysqli_query($reg1->con, $query_checkownerid);
                    foreach ($result_checkownerid as $key) {
                                    $email = $key['Email'];
                    }
                    if($petrolstations == "" || $petrolstations == "0"){
                        header('location:superadmin-addtruck?action=select-petrol-stations');
                               die();
                    }
                    elseif ($OID == $companyownerid || $email == $companyemail) {
                                    header('location:superadmin-addtruck?action=failed-ownerid-or-email-already-exist');
                                    die();
                    } else {
                                    //for getting select values with commas start
                                    $petrolstations        = implode(',', $_POST['petrolstations']);
                                    //for getting select values with commas ends
                                    $query_addtruckcompany = "INSERT INTO `truck_company`(`TC_Name`, `TC_Address`, `TC_Owner_Id`, `TC_Owner_Name`, `TC_Owner_Contact`, `TC_Capital`, `TC_PetrolStations`) VALUES ('$companyname','$companyaddress','$companyownerid','$companyownername','$companyownercontact','0','$petrolstations')";
                                    
                                    $result_addtruckcompany = mysqli_query($reg1->con, $query_addtruckcompany);
                                    $query_addtruckuser     = "INSERT INTO `user_login` (`UserName`, `Email`, `PassWord`, `User_Role`, `Owner_Id`) VALUES ('$companyusername','$companyemail','$companypassword','3','$companyownerid')";
                                    $result_addtruckuser    = mysqli_query($reg1->con, $query_addtruckuser);
                                    
                                    if ($result_addtruckcompany == true) {
                                                    header('location:superadmin-addtruck?action=success');
                                                    die();
                                    } else {
                                                    echo "something happend";
                                    }
                    }
    }
    //add truck company ends
    
    
    
    //update truck company starts
    if (isset($_POST['btn_uptruckcompany'])) {
                    extract($_POST);
                    $getownids                = $_GET['ownerid'];
                    $query_updatetruckcompany = "UPDATE `truck_company` SET `TC_Address`='$upcompanyaddress',`TC_Owner_Name`='$upcompanyownername',`TC_Owner_Contact`= $upcompanyownercontact WHERE TC_Owner_Id = '$getownids'";
                    
                    $result_updatetruckcompany = mysqli_query($reg1->con, $query_updatetruckcompany);
                    
                    if ($result_updatetruckcompany == true) {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=updated');
                                    die();
                    } else {
                                    echo "something happend";
                    }
    }
    if (isset($_POST['btn_uptruckcompanycred'])) {
                    extract($_POST);
                    $getownids                = $_GET['ownerid'];
                    $query_updatetruckcompany = "UPDATE `user_login` SET `Email`='$upcompanyemail',`PassWord`='$upcompanypassword' WHERE Owner_Id = '$getownids'";
                    
                    $result_updatetruckcompany = mysqli_query($reg1->con, $query_updatetruckcompany);
                    
                    if ($result_updatetruckcompany == true) {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=updated');
                                    die();
                    } else {
                                    echo "something happend";
                    }
    }
    //update petrolstations for truckcompany starts
    if (isset($_GET['id-ps']) && $_GET['id-ps'] != "") {
                    $getid         = $_GET['id-ps'];
                    $query_callid  = "SELECT *  FROM `truck_company` WHERE Id = '$getid'";
                    $result_callid = mysqli_query($reg1->con, $query_callid);
                    $id            = '';
                    foreach ($result_callid as $key) {
                                    $id = $key['TC_PetrolStations'];
                    }
                    $arr = array($id);
                    $ids = implode(', ', $arr);
                    $sql = "SELECT * FROM `petrol_stations` 
                    where petrol_stations.Id IN (".$ids.")";
                     $result_truckdetailsforupdate = mysqli_query($reg1->con, $sql);


                    $arrimp = explode(",", $id);
                    $count = count($arrimp);
                    for ($i=0; $i <$count; $i++)
                    { 
                    $sql1 = "SELECT * FROM `petrol_stations`,`truck_company_fuel_data`WHERE truck_company_fuel_data.TC_Id = $getid AND 
                        truck_company_fuel_data.PS_Id = $arrimp[$i] AND
                        petrol_stations.Id = $arrimp[$i]";
                    $resultcheck[$i] = mysqli_query($reg1->con, $sql1);
                    }
                      

        // $query_fueldata  = "SELECT * FROM `truck_company_fuel_data` WHERE truck_company_fuel_data.TC_Id= '$getid' AND truck_company_fuel_data.PS_Id IN (".$ids.")";
        // $result_fueldata = mysqli_query($reg1->con, $query_fueldata);
             

    }
    //update petrolstations for truckcompany ends
    
    if (isset($_POST['btn_uptruckPS'])) {
                    extract($_POST);
                    $getid             = $_GET['id-ps'];
                    //for getting select values with commas start
                    $petrolstations    = implode(',', $_POST['petrolstations']);
                    //for getting select values with commas ends
                    $query_updatetcps  = "UPDATE `truck_company` SET `TC_PetrolStations` = '$petrolstations'
                                            WHERE Id = '$getid'";
                    $result_updatetcps = mysqli_query($reg1->con, $query_updatetcps);
                    if ($result_updatetcps == true) {
                                    header('location:superadmin-edittruck-petrolstation?id-ps='.$getid.'&action=updated');
                                    die();
                    } else {
                                    echo "something happend";
                    }
    }
    if (isset($_POST['btn_upfueltruck'])) {
            extract($_POST);
            $getid = $_GET['id-ps'];
            $query_checkdata  = "SELECT * FROM `truck_company_fuel_data` WHERE TC_Id= '$getid' AND PS_Id= '$ps_id'";
            $result_checkdata = mysqli_query($reg1->con, $query_checkdata);
            $res =  mysqli_num_rows($result_checkdata);
            if(mysqli_num_rows($result_checkdata) == 1){
            $query_updatefuel  = "UPDATE `truck_company_fuel_data` SET `PS_Fuel_Price` = '$fuelpricefortruck' WHERE TC_Id = '$getid' AND PS_Id = '$ps_id'";
                    $result_updatefuel = mysqli_query($reg1->con, $query_updatefuel);
                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=success');
              die();
            }
            else{
              $query_insertfuel  = "INSERT INTO `truck_company_fuel_data`(`TC_Id`, `PS_Id`, `PS_Fuel_Price`) VALUES ('$getid','$ps_id','$fuelpricefortruck')";
              $result_insertfuel = mysqli_query($reg1->con, $query_insertfuel);  
              header('location:' . $_SERVER['HTTP_REFERER'] . '&action=success');
              die();
            }
           die(); 
    }

    //update truck company ends
    
    //manage truck company starts
    $query_managetruckcompany  = "SELECT * FROM truck_company, user_login WHERE user_login.Owner_Id = truck_company.TC_Owner_Id AND user_login.User_Role = 3";
    $result_managetruckcompany = mysqli_query($reg1->con, $query_managetruckcompany);
    //manage truck company ends
    
    
    //manage truck company transactions starts
    if (isset($_GET['id']) && $_GET['id'] != "") {
                    $getids = $_GET['id'];
                    
                    $query_managetrucktrans  = "SELECT *  FROM `truck_company` WHERE Id = '$getids'";
                    $result_managetrucktrans = mysqli_query($reg1->con, $query_managetrucktrans);
                    
                    //for trucktransactiondetails starts
                    $query_checktoken  = "SELECT * FROM token_data, truck_company, petrol_stations, truck_drivers,truck_company_fuel_data WHERE token_data.Token_TC = $getids AND truck_company.Id = token_data.Token_TC AND petrol_stations.Id = token_data.Token_PS AND truck_drivers.Id = token_data.Token_Driver AND truck_company_fuel_data.TC_Id = token_data.Token_TC AND truck_company_fuel_data.PS_Id=token_data.Token_PS AND token_data.Status = 'Approved' ORDER BY token_data.Id";
                    $result_checktoken = mysqli_query($reg1->con, $query_checktoken);
                    
                    $query_calculatingspent  = "SELECT Token_TC,SUM(Token_Total_Amount), SUM(Token_Approved_Cash), SUM(Token_Approved_Litres) FROM token_data WHERE Token_TC ='$getids' GROUP BY Token_TC";
                    $result_calculatingspent = mysqli_query($reg1->con, $query_calculatingspent);
                    
                    $query_calculatingcapital  = "SELECT * FROM `truck_company` WHERE Id = $getids";
                    $result_calculatingcapital = mysqli_query($reg1->con, $query_calculatingcapital);
                    foreach ($result_calculatingcapital as $rcc) {
                                    $capital = $rcc['TC_Capital'];
                    }
                    //for trucktransactiondetails starts
                    
                    
    }
    //for trcuk company calling by owner id only
    if (isset($_GET['ownerid']) && $_GET['ownerid'] != "") {
                    $getownids = $_GET['ownerid'];
                    
                    $query_managetrucktranscred  = "SELECT *  FROM `user_login` WHERE Owner_Id = '$getownids'";
                    $result_managetrucktranscred = mysqli_query($reg1->con, $query_managetrucktranscred);
                    
                    $query_managetrucktrans  = "SELECT *  FROM `truck_company` WHERE TC_Owner_Id = '$getownids'";
                    $result_managetrucktrans = mysqli_query($reg1->con, $query_managetrucktrans);
                    
    }
    //manage truck company transactions ends
    
    //add annex truck starts
    if (isset($_POST['btn_annexcashtruck'])) {
                    extract($_POST);
                    if (isset($_GET['id']) && $_GET['id'] != "") {
                                    $getid = $_GET['id'];
                    }
                    $img_name       = $_FILES['truckaddannex']['name'];
                    $tmp_name       = $_FILES['truckaddannex']['tmp_name'];
                    $file_size      = $_FILES['truckaddannex']['size'];
                    $valid_format   = array(
                                    'jpg',
                                    'jpeg',
                                    'png'
                    );
                    $file_extension = explode('.', $img_name);
                    $file_extension = strtolower(end($file_extension));
                    if (in_array($file_extension, $valid_format)) {
                                    $new_file_name    = uniqid('etruck', true) . '.' . $file_extension;
                                    $file_destination = 'truck-annex-transactions/' . $new_file_name;
                                    move_uploaded_file($tmp_name, $file_destination);
                    }
                    if (file_exists($file_destination)) {
                                    $query_addtctransaction  = "INSERT INTO `truck_transaction_annex`(`TC_Id`, `Date`, `Amount`,`Credit_Amount`, `Annex`) VALUES ('$getid','$truckaddannexdate','$truckaddannexamount','Debit annex','$new_file_name')";
                                    $result_addtctransaction = mysqli_query($reg1->con, $query_addtctransaction);
                                    
                                    $query_addcapital  = "UPDATE `truck_company` SET `TC_Capital`= TC_Capital + $truckaddannexamount WHERE Id = $getid";
                                    $result_addcapital = mysqli_query($reg1->con, $query_addcapital);
                                    if ($result_addtctransaction == true) {
                                    header('location:superadmin-trucktransactiondetails?id='.$getid.'&action=success');
                                    die();
                                    }
                    }
                    
                    else {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=failed-file-extension-error');
                                    die();
                    }
                    
    }
    
    //add annex truck ends
    //add annex truck credit starts
    if (isset($_POST['btn_annexcashtruckcredit'])) {
                    extract($_POST);
                    if (isset($_GET['id']) && $_GET['id'] != "") {
                                    $getid = $_GET['id'];
                    }
                    $img_name       = $_FILES['truckaddannexcredit']['name'];
                    $tmp_name       = $_FILES['truckaddannexcredit']['tmp_name'];
                    $file_size      = $_FILES['truckaddannexcredit']['size'];
                    $valid_format   = array(
                                    'jpg',
                                    'jpeg',
                                    'png'
                    );
                    $file_extension = explode('.', $img_name);
                    $file_extension = strtolower(end($file_extension));
                    if (in_array($file_extension, $valid_format)) {
                                    $new_file_name    = uniqid('etruck', true) . '.' . $file_extension;
                                    $file_destination = 'truck-annex-transactions/' . $new_file_name;
                                    move_uploaded_file($tmp_name, $file_destination);
                    }
                    if (file_exists($file_destination)) {
                                    $query_addtctransactioncredit  = "INSERT INTO `truck_transaction_annex`(`TC_Id`, `Date`, `Amount`, `Credit_Amount`, `Annex`) VALUES ('$getid','$truckaddannexdatecredit','Credit annex','$truckaddannexamountcredit','$new_file_name')";
                                    $result_addtctransactioncredit = mysqli_query($reg1->con, $query_addtctransactioncredit);
                                    $query_addcapital              = "UPDATE `truck_company` SET `TC_Capital`= TC_Capital + $truckaddannexamountcredit WHERE Id = $getid";
                                    $result_addcapital             = mysqli_query($reg1->con, $query_addcapital);
                                    if ($result_addtctransactioncredit == true) {
                                                    header('location:superadmin-trucktransactiondetails?id='.$getid.'&action=success');
                                                    die();
                                    }
                    }
                    
                    else {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=failed-file-extension-error');
                                    die();
                    }
                    
    }
    
    //add annex truck credit ends
    
    
    
    //call truck trans starts
    if (isset($_GET['id']) && $_GET['id'] != "") {
                    $getid                      = $_GET['id'];
                    $query_tctransacioninlitre  = "SELECT * FROM `truck_company` WHERE Id = $getid";
                    $result_tctransacioninlitre = mysqli_query($reg1->con, $query_tctransacioninlitre);
    }
    //call truck trans end
    
    //call truck annex history starts
    $query_callannextruck  = "SELECT truck_company.TC_Name, truck_company.TC_Address, truck_transaction_annex.Id, truck_transaction_annex.Date, truck_transaction_annex.Amount,truck_transaction_annex.Credit_Amount, truck_transaction_annex.Annex FROM truck_company, truck_transaction_annex WHERE truck_company.Id = truck_transaction_annex.TC_Id ORDER BY truck_transaction_annex.Id ";
    $result_callannextruck = mysqli_query($reg1->con, $query_callannextruck);
    //call truck annex history end        
    
    //update fuel price starts
    if (isset($_GET['id']) && $_GET['id'] != "") {
                    $getid            = $_GET['id'];
                    $query_uptcprice  = "SELECT *  FROM `truck_company` WHERE Id = $getid";
                    $result_uptcprice = mysqli_query($reg1->con, $query_uptcprice);
    }
    //updating fuel price
    if (isset($_POST['btn_updatetruckrate'])) {
                    extract($_POST);
                    $query_updatetcprice  = "UPDATE `truck_company` SET `TC_Rate`= '" . $trucknewpricetxt . "'
                                            WHERE Id = '$getid'";
                    $result_updatetcprice = mysqli_query($reg1->con, $query_updatetcprice);
                    if ($result_updatetcprice == true) {
                                    header('location:superadmin-alltruck?action=updated');
                                    die();
                    } else {
                                    echo "something happend";
                    }
    }
    //update fuel price ends
    //for add truck petrol station dropdown start
    $query_tcps  = "SELECT * FROM `petrol_stations`";
    $result_tcps = mysqli_query($reg1->con, $query_tcps);
    //for add truck petrol station dropdown end
    
    //for add fuel price to truck company's petrol station starts
    $query_tcps  = "SELECT * FROM `petrol_stations`";
    $result_tcps = mysqli_query($reg1->con, $query_tcps);
    //for add fuel price to truck company's petrol station ends

    
    
    //for truck company drivers starts
    $query_Drivers  = "SELECT * FROM `truck_drivers`,`truck_company` WHERE truck_drivers.Driver_TC_Owner_Id = truck_company.TC_Owner_Id";
    $result_Drivers = mysqli_query($reg1->con, $query_Drivers);
    //for truck company drivers ends
    
    //for tokens starts
    $query_token  = "SELECT * FROM `token_data`,`truck_company`,`truck_drivers`,`petrol_stations` WHERE token_data.Token_TC = truck_company.Id AND truck_drivers.Id = token_data.Token_Driver AND petrol_stations.Id = token_data.Token_PS ORDER BY token_data.Id DESC";
    $result_token = mysqli_query($reg1->con, $query_token);
    //for tokens ends
    //-----------------------------------Superadmin-Dashboard---------------------------------//
    
    
    
    
    
    
    //dashboard transaction calling monthly
    $query_calltransbymonth  = "SELECT * FROM `token_data` WHERE MONTH(Token_Date) = MONTH(CURRENT_DATE()) AND YEAR(Token_Date) = YEAR(CURRENT_DATE())";
    $result_calltransbymonth = mysqli_query($reg1->con, $query_calltransbymonth);
    $rowsforcalltransbymonth = mysqli_num_rows($result_calltransbymonth);
    
    $query_calltruckcompany  = "SELECT * FROM `truck_company`";
    $result_calltruckcompany = mysqli_query($reg1->con, $query_calltruckcompany);
    $rowsforcalltruckcompany = mysqli_num_rows($result_calltruckcompany);
    
    $query_callps  = "SELECT * FROM `petrol_stations`";
    $result_callps = mysqli_query($reg1->con, $query_callps);
    $rowsforcallps = mysqli_num_rows($result_callps);
    
    $query_calldr  = "SELECT * FROM `truck_drivers`";
    $result_calldr = mysqli_query($reg1->con, $query_calldr);
    $rowsforcalldr = mysqli_num_rows($result_calldr);
    
    //for closing popup
    if (isset($_POST['btn_cancel_pass'])) {
                    extract($_POST);
                    header('location:superadmin-changepassword');
                    die();
    }
    //checking pass and values
    $messagecheck = "";
    $validation   = "No";
    if (isset($_POST['btn_checkpass'])) {
                    extract($_POST);
                    $query_checkpass  = "SELECT * FROM `user_login` WHERE UserName = '" . $uname . "' && PassWord = '" . $checkpass . "'";
                    $result_checkpass = mysqli_query($reg1->con, $query_checkpass);
                    if (mysqli_num_rows($result_checkpass) == 1) {
                                    $validation = "Yes";
                    } else {
                                    $validation   = "No";
                                    $messagecheck = "incorrect password please try again";
                                    
                    }
    }
    
    
    //updating pass with validation
    
    if (isset($_POST['btn_pass_new_up'])) {
                    extract($_POST);
                    $querycheck  = "SELECT * FROM `user_login` WHERE UserName = '" . $uname . "' && PassWord = '" . $new_pass . "'";
                    $resultcheck = mysqli_query($reg1->con, $querycheck);
                    
                    if (mysqli_num_rows($resultcheck) == 1) {
                                    $messagecheck = "You entered your old password try again";
                    } else {
                                    $query_uppass  = "UPDATE `user_login` SET PassWord = '" . $new_pass . "' WHERE UserName = '" . $uname . "' ";
                                    $result_uppass = mysqli_query($reg1->con, $query_uppass);
                                    header("location:superadmin-changepassword?action=success");
                                    die();
                    }
    }
    
    
    
    //-----------------------------------Credit Section---------------------------------//
    
    
    //credit request starts
    $messagerequest    = "";
    $carret            = "";
    $query_allrequest  = "SELECT truck_credit_request.Id,truck_credit_request.Date,truck_credit_request.Date_Of_Approval,truck_credit_request.Amount,truck_credit_request.Paid_Amount,truck_credit_request.TC_Id,truck_credit_request.Status,truck_credit_request.Action,truck_company.TC_Name,truck_company.TC_Address FROM `truck_credit_request` , truck_company WHERE truck_credit_request.Action = 'pending' AND truck_company.Id = truck_credit_request.TC_Id";
    $result_allrequest = mysqli_query($reg1->con, $query_allrequest);
    if (mysqli_num_rows($result_allrequest) == 0) {
                    $messagerequest = "No PENDING requests found";
    } else {
                    $carret = "New";
    }
    
    if (isset($_POST['btn_approve'])) {
                    extract($_POST);
                    //calling amount
                    $query_getamount  = "SELECT Amount, TC_Id FROM `truck_credit_request` WHERE Id = '" . $idget . "' ";
                    $result_getamount = mysqli_query($reg1->con, $query_getamount);
                    foreach ($result_getamount as $rga) {
                                    $amountforcredit = $rga['Amount'];
                                    $idforcredit     = $rga['TC_Id'];
                    }
                    //updating status
                    $date                 = date('Y/m/d H:i:s');
                    $query_uprequest      = "UPDATE `truck_credit_request` SET Date_Of_Approval = '" . $date . "', Action ='Approved'  WHERE Id = '" . $idget . "' ";
                    $result_uprequest     = mysqli_query($reg1->con, $query_uprequest);
                    //updating capital
                    $query_updatecapital  = "UPDATE `truck_company` SET TC_Capital = TC_Capital+'$amountforcredit' WHERE Id = '" . $idforcredit . "' ";
                    $result_updatecapital = mysqli_query($reg1->con, $query_updatecapital);
                    header("location:superadmin-truck-credit-request?action=approved");
                    die();
    }
    //credit request ends
    
    //approved credit starts
    $query_approvedrequest  = "SELECT *  FROM truck_company,`truck_credit_request` WHERE truck_credit_request.Action = 'approved' AND truck_credit_request.Status = 'Notpaid' AND truck_company.Id = truck_credit_request.TC_Id";
    $result_approvedrequest = mysqli_query($reg1->con, $query_approvedrequest);
    if (mysqli_num_rows($result_approvedrequest) == 0) {
                    $messageapproved = "No APPROVED requests found";
    }
    //pay credits//
    if (isset($_GET['id']) && $_GET['id'] != "") {
                    extract($_POST);
                    $getidforcredit   = $_GET['id'];
                    $query_paycredit  = "SELECT *  FROM `truck_credit_request`, `truck_company` WHERE truck_credit_request.Id = '$getidforcredit' AND truck_credit_request.TC_Id = truck_company.Id";
                    $result_paycredit = mysqli_query($reg1->con, $query_paycredit);
                    $am               = 0;
                    $pm               = 0;
                    foreach ($result_approvedrequest as $rar) {
                                    $am = $rar['Amount'];
                                    $pm = $rar['Paid_Amount'];
                    }
                    $remaining = $am - $pm;
    }
    if (isset($_GET['action']) && ($_GET['action']) == "successfully-paid") {
                    if ($am == $pm) {
                                    $query_paid  = "UPDATE `truck_credit_request` SET Status ='Paid' WHERE Id = '$getidforcredit' ";
                                    $result_paid = mysqli_query($reg1->con, $query_paid);
                                    header('location:superadmin-truck-credit-history');
                                    die();
                    }
    }
    if (isset($_POST['btn_paycredit'])) {
                    extract($_POST);
                    if ($_POST['paycredits'] > $remaining) {
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=failed');
                                    die();
                    } else {
                                    $getid               = $_GET['id'];
                                    $query_paycreditnow  = "UPDATE `truck_credit_request` SET Paid_Amount = Paid_Amount + $paycredits WHERE Id = $getid ";
                                    $result_paycreditnow = mysqli_query($reg1->con, $query_paycreditnow);
                                    header('location:' . $_SERVER['HTTP_REFERER'] . '&action=successfully-paid');
                                    die();
                    }
    }
    //approved credit ends
    
    //credit history starts
    $query_paidcredits  = "SELECT *  FROM  `truck_company`,`truck_credit_request` WHERE Action = 'approved' AND Status = 'paid' AND truck_credit_request.TC_Id = truck_company.Id";
    $result_paidcredits = mysqli_query($reg1->con, $query_paidcredits);
    //credit history ends
    
    
    //-----------------------------------Sub-Admin Section---------------------------------//        
    
    //add subadmin starts
    
    if (isset($_POST['btn_addsubadmin'])) {
                    extract($_POST);
    $query_emailcheck  = "SELECT * FROM `user_login` where Email = '$sub_email'";
    $result_emailcheck = mysqli_query($reg1->con, $query_emailcheck);
                    if(mysqli_num_rows($result_emailcheck) > 0){
                        header('location:superadmin-addsubadmin?action=emailalreadyexist');
                        die();
                    }else{
                       
                    
                    if ($sub_role == 'Truck-Sub-Admin') {
                                    $role_user = '2.1';
                    } else {
                                    $role_user = '2';
                    }
                    $query_addsubadmin  = "INSERT INTO `user_login`(`UserName`, `Email`, `PassWord`, `User_Role`, `Owner_Id`) VALUES ('$sub_username','$sub_email','$sub_password','$role_user','$sub_role')";
                    $result_addsubadmin = mysqli_query($reg1->con, $query_addsubadmin);
                    if ($result_addsubadmin == true) {
                                    header('location:superadmin-addsubadmin?action=success');
                                    die();
                    } else {
                                    header('location:superadmin-addsubadmin?action=failed');
                                    die();
                    }
    }}
    //add subadmin ends
    
    //manage subadmin starts
    $query_callsubadmin  = "SELECT *  FROM  `user_login` WHERE User_role in (2,2.1)";
    $result_callsubadmin = mysqli_query($reg1->con, $query_callsubadmin);
    //manage subadmin ends    
    
    
    //forupdateprofile starts
    $query_callsadmindata  = "SELECT *  FROM  `user_login` WHERE Owner_Id = 'superadmin'";
    $result_callsadmindata = mysqli_query($reg1->con, $query_callsadmindata);

    if (isset($_POST['btn_updatesuperdata'])) {
                    extract($_POST);
    $query_upsuperdata = "UPDATE `user_login` SET `Email`='$txt_email' WHERE Owner_Id = 'superadmin'";
    $result_upsuperdata = mysqli_query($reg1->con, $query_upsuperdata);
    header('location:superadmin-updateemail?action=success');
    die();
                }
    //forupdateprofile ends  
    
    
?>