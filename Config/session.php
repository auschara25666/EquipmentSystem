<?php
include('config/connect.php');
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db, "select user_id from user where user_id = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['user_id'];

if (!isset($_SESSION['login_user'])) {
   header("location:login.php");
   die();
}

?>

<?php
// include("Config/connect.php");
// session_start();
//         if(isset($_POST['User_Id'])){
// 				//connection
// 				//รับค่า user & password
//                   $Username = $_POST['User_Id'];
//                   $Password = ($_POST['Password']);
// 				//query 
//                   $sql= "SELECT * FROM User Where User_Id='". $User_Id."' and Password='".$Password."' ";

//                   $result = mysqli_query($conn,$sql);
				
//                   if(mysqli_num_rows($result)==1){

//                       $row = mysqli_fetch_array($result);

//                       $_SESSION["User_Id"] = $row["User_Id"];
//                       $_SESSION["User"] = $row["Fname"]." ".$row["Lname"];
//                       $_SESSION["Role"] = $row["Role"];

//                       if($_SESSION["Role"]=="admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

//                         Header("Location: index.php");

//                       }

//                       if ($_SESSION["Userlevel"]=="นักศึกษา" || $_SESSION["Userlevel"] == "อาจารย์"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

//                         Header("Location: index-user.php");

//                       }

//                   }else{
//                     echo "<script>";
//                         echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
//                         echo "window.history.back()";
//                     echo "</script>";

//                   }

//         }else{


//              Header("Location: login.php"); //user & password incorrect back to login again

//         }
?>