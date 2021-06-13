<?php
//connecting to database//
$hostname = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname= "etruck";

$conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
if(!$conn){
    die("Unable to connect");
}
//connecting to database end//

//checking sessions starts

ini_set('session.gc_maxlifetime', 10);

session_start();
if(isset($_SESSION['username'])){
  session_destroy();
}
//checking sessions ends//


$message = "";
if(isset($_POST['btn_signin'])){
    $uemail = mysqli_real_escape_string($conn, $_POST["email"]);
    $upass = mysqli_real_escape_string($conn, $_POST["password"]);
    $query = "SELECT * FROM `user_login` WHERE Email = '$uemail' && PassWord = '$upass'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){

        //getting value of userrole from database
        foreach ($result as $res) {
        $Role = $res['User_Role'];
        $Username = $res['UserName'];
        }
        //
        switch ($Role) {
        case "1":
                $_SESSION['username'] = $Username;
                $_SESSION['role'] = $Role;
                header("Location:super-admin/superadmin-dashboard");
                die();
            break;
        case "2":
                $_SESSION['username'] = $Username;
                $_SESSION['role'] = $Role;
                header("Location:sub-admin-petrol/subadmin-dashboard");
                die();
            break;
        case "2.1":
                $_SESSION['username'] = $Username;
                $_SESSION['role'] = $Role;
                header("Location:sub-admin-truck/subadmin-dashboard");
                die();
            break;
        case "3":
                $_SESSION['username'] = $Username;
                $_SESSION['role'] = $Role;
            header("Location:truck-company/truck-company-dashboard");
                die();
            break;
        case "4":
                $_SESSION['username'] = $Username;
                $_SESSION['role'] = $Role;
            header("Location:petrol-station/petrol-station-dashboard");
                die();
            break;   
        case "5":
                $_SESSION['username'] = $Username;
                $_SESSION['role'] = $Role;
            header("Location:sub-truck-company/sub-truck-company-dashboard");
                die();
            break;  
        case "6":
                $_SESSION['username'] = $Username;
                $_SESSION['role'] = $Role;
            header("Location:sub-petrol-station/sub-petrol-station-dashboard");
                die();
            break;            
        }
    }
    else
    {
        $message = "Incorrect Email Or Pass...";
    }
}
?>