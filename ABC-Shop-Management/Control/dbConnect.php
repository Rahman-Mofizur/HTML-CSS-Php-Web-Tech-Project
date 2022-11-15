<?php

class db
{

    function OpenConn()
    {
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "my db 5";

        $conn = new mysqli($serverName, $userName, $password, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connection ready";
        }
        return $conn;
    }

    function InsertUser($connObj, $name, $userName, $password, $type)
    {
        $result = $connObj->query("INSERT INTO `user` (`name`, `username`, `password`, `type`) 
                                VALUES ('$name', '$userName', '$password', '$type')");
        if ($result == TRUE) {
            return "Data Inserted Sucessfully.";
        } else {
            return "Error: <br>" . $connObj->error;
        }
    }
    function InsertCustomer($connObj, $name, $email, $userName, $password, $gender, $dob, $phone, $address)
    {
        $result = $connObj->query("INSERT INTO `customer` (`name`, `email`, `uname`, `password`, `gender`, `dob`, `phone`, `address`) VALUES ('$name', '$email', '$userName', '$password', '$gender', '$dob', '$phone', '$address')");
        if ($result == TRUE) {
            return "Data Inserted Sucessfully.";
        } else {
            return "Error: <br>" . $connObj->error;
        }
    }
    function ShowAll($connObj)
    {
        $result = $connObj->query("SELECT * FROM  customer");
        return $result;
    }
    function CheckUser($connObj, $uname, $password){
        $result = $connObj->query("SELECT * FROM customer WHERE uname='$uname' AND password='$password'");
        return $result;
    }
    

    function CloseConn($connObj)
    {
        $connObj->close();
    }
}
