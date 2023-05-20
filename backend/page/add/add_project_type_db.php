<?php
// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $Pt_name = $_REQUEST["Pt_name"];
  $Pt_detail = $_REQUEST["Pt_detail"];
  //เพิ่มเข้าไปในฐานข้อมูล
  $check = "SELECT * FROM project_type  WHERE Pt_name = '$Pt_name'and Pt_detail = '$Pt_detail'";
	$result = mysqli_query($conn,$check) or die;
	$num=mysqli_num_rows($result); 
        if($num > 0)   		
        {
             echo "<script>";
			 echo "alert('มีข้อมูลประเภทโครงงานในระบบแล้ว กรุณากรอกข้อมูลใหม่');";
			 echo "window.location='add_project_type.php';";
          	 echo "</script>";
 
		}else{  
  $sql = "INSERT INTO project_type(Pt_name, Pt_detail)
       VALUES('$Pt_name', '$Pt_detail')";

  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql ");
    }
  //ปิดการเชื่อมต่อ database
  mysqli_close($conn);
  //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('ลงทะเบียนประเภทโครงงานสำเร็จ');";
  echo "window.location = '../../project_type.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to register again');";
  echo "</script>";
}
?>