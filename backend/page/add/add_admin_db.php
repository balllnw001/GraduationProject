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
  $check = "SELECT * FROM admin  WHERE Username = '$Username'and Firstname = '$Firstname'and Lastname = '$Lastname' ";
	$result = mysqli_query($conn,$check) or die;
	$num=mysqli_num_rows($result); 
        if($num > 0)   		
        {
             echo "<script>";
			 echo "alert('มีข้อมูลอาจารย์ที่ปรึกษาในระบบแล้ว กรุณากรอกข้อมูลใหม่');";
			 echo "window.location='add_admin.php';";
          	 echo "</script>";
 
		}else{  
  $sql = "INSERT INTO admin(Username, Password,Prename, Firstname, Lastname, Status)
       VALUES('$Username', '$Password','$Prename', '$Firstname', '$Lastname','$Status')";

  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql ");
    }
  //ปิดการเชื่อมต่อ database
  mysqli_close($conn);
  //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('ลงทะเบียนอาจารย์ที่ปรึกษาสำเร็จ');";
  echo "window.location = '../../admin.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to register again');";
  echo "</script>";
}
?>