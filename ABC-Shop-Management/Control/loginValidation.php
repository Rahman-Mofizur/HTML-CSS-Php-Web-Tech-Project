<?php  
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $userName = $password = "";
        $ValidateLogin = "";
    

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            
            $userName = $_REQUEST["username"];
            $password = $_REQUEST["password"];
            $tmpUserName = $tmpPass = "";

            if(empty($userName) || empty($password) )
            {
                $ValidateLogin = "Please Fillup All The Field!!";
            }else{
                include("../control/dbConnect.php");
                $dbTry = new db();
                $connObj = $dbTry->OpenConn();
                $validateLogin = $dbTry->CheckUser($connObj, $userName, $password);
                if ($validateLogin->num_rows > 0) {
                    // echo "Success!!Please wait redirecting...";
                    $_SESSION["userName"] = $userName;
                    $_SESSION["password"] = $password;
                    header('location:profile.php');
                       }
                     else {
                    $ValidateLogin = "Username or Password is invalid";
                    }

                }
            
        }
