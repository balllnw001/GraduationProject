<meta charset="UTF-8">
<?php
// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $Username = $_REQUEST["Username"];
  $Password = $_REQUEST["Password"];
  $Prename = $_REQUEST["Prename"];
  $Firstname = $_REQUEST["Firstname"];
  $Lastname = $_REQUEST["Lastname"];
  $Status = $_REQUEST["Status"];
  //เพิ่มเข้าไปในฐานข้อมูล
  $sql = "INSERT INTO admin(Username, Password,Prename, Firstname, Lastname, Status)
       VALUES('$Username', '$Password','$Prename', '$Firstname', '$Lastname','$Status')";

  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql ");
  
  //ปิดการเชื่อมต่อ database
  mysqli_close($conn);
  //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Register Succesfuly');";
  echo "window.location = '../../admin.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to register again');";
  echo "</script>";
}
?>