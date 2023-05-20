<?php
session_start();
    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';
// เช็คว่า User ได้ผ่านการ Login มาหรือไม่ (ถ้าไม่ได้ Login มาให้ส่งต่อไปหน้าไหนก็ใส่ URL ลงไปครับ ตรงตำแหน่ง login.php)
if (!isset($_SESSION["User_ID"])) {
    header("Location: ../login.php");
     exit; 
}
elseif($_SESSION["Status"]=="M"){ 
     header("Location: ../login.php");
     exit; 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Software Service</title>
    <link rel="shortcut icon" href="../img/Screwdriver.png" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/table.css" rel="stylesheet" />
    <link href="css/profile.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>