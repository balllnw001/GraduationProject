<?php 
session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
        if(isset($_POST['Username'])){
				//connection
                  include("backend/connection.php");
				//รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = $_POST['Password'];
				//query 
                  $sql="SELECT A_ID as ID,Username,Prename,Firstname,Lastname,Status  FROM admin WHERE Username='".$Username."' and Password='".$Password."'
                  UNION 
                  SELECT S_ID,Username,Prename,Firstname,Lastname,Status FROM student WHERE Username='".$Username."' and Password='".$Password."'";

                  $result = mysqli_query($conn,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);
                      
                      $_SESSION["User_ID"] = $row["Username"];
                      // $_SESSION["Password"] = $row["Password"];
                      $_SESSION["User"] = $row["Prename"]." ".$row["Firstname"]." ".$row["Lastname"];
                      $_SESSION["Status"] = $row["Status"];
                      
                      if($_SESSION["Status"]=="A"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
                        // $_SESSION["ID"] = $row["A_ID"];
                        Header("Location: backend/index.php");

                      }

                      if($_SESSION["Status"]=="T"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
                        // $_SESSION["ID"] = $row["A_ID"];
                         Header("Location: backend/index.php");

                      }

                      if ($_SESSION["Status"]=="M"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
                      $_SESSION["Student_ID"] = $row["ID"];
                         Header("Location: index.php");

                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" Username หรือ  Password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>