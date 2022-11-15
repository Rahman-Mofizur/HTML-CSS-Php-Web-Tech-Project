<?php
if (empty($_GET['page'])) {
    include "header.php";
}
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
include("../control/dbConnect.php");
$dbTry = new db();
$conObj = $dbTry->OpenConn();
$customerSelect = $dbTry->ShowAll($conObj);
echo '<table align="center" border="1" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td>Name</td> 
          <td>Email</td> 
          <td>User Name</td> 
          <td>Gender</td> 
          <td>Date of Birth</td>
          <td>Phone</td>
          <td>Address</td>

      </tr>';


while ($row = $customerSelect->fetch_assoc()) {
    $field2name = $row["name"];
    $field3name = $row["email"];
    $field4name = $row["uname"];
    $field5name = $row["gender"];
    $field6name = $row["dob"];
    $field7name = $row["phone"];
    $field8name = $row["address"];

    echo '<tr> 
            <td>' . $field2name . '</td> 
            <td>' . $field3name . '</td> 
            <td>' . $field4name . '</td> 
            <td>' . $field5name . '</td> 
            <td>' . $field6name . '</td> 
            <td>' . $field7name . '</td> 
            <td>' . $field8name . '</td> 

        </tr>';
}



     if(empty($_SESSION["userName"])){
         header("location:login.php");
    }
    //  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])){
    //      session_destroy();
    //      header("location:login.php");
    //  }
?>
<?php
if (empty($_GET['page'])) {
    include "footer.php";
}
?>