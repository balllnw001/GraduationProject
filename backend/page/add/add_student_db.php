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
  $Upload = $_REQUEST["Upload"];
  //เพิ่มเข้าไปในฐานข้อมูล

  $check = "SELECT * FROM student  WHERE Username = '$Username'and Firstname = '$Firstname'and Lastname = '$Lastname' ";
	$result = mysqli_query($conn,$check) or die;
	$num=mysqli_num_rows($result); 
        if($num > 0)   		
        {
             echo "<script>";
			 echo "alert('มีข้อมูลนักศึกษาในระบบแล้ว กรุณากรอกข้อมูลใหม่');";
			 echo "window.location='add_student.php';";
          	 echo "</script>";
 
		}else{  

  $sql = "INSERT INTO student(Username, Password,Prename, Firstname, Lastname, Status,Upload)
       VALUES('$Username', '$Password','$Prename', '$Firstname', '$Lastname','$Status','$Upload')";
    
  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql ");
  }
  //ปิดการเชื่อมต่อ database
  mysqli_close($conn);
  //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('ลงทะเบียนนักศึกษาสำเร็จ');";
  echo "window.location = '../../student.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to register again');";
  echo "</script>";
}
?>