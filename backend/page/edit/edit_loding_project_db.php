<meta charset="UTF-8">
<?php
// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
//1. เชื่อมต่อ database: 
include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $ID = $_REQUEST["ID"];
  $P_name_th = $_REQUEST["P_name_th"];
  $P_name_eng = $_REQUEST["P_name_eng"];
  $P_year = $_REQUEST["P_year"];
  $P_loding_1 = $_REQUEST["P_loding_1"];
  $P_loding_2 = $_REQUEST["P_loding_2"];
  $P_loding_3 = $_REQUEST["P_loding_3"];
  $P_loding_4 = $_REQUEST["P_loding_4"];
  $P_loding_5 = $_REQUEST["P_loding_5"];
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE project SET  
      P_name_th='$P_name_th', 
      P_name_eng='$P_name_eng', 
      P_year='$P_year',
      P_loding_1='$P_loding_1',
      P_loding_2='$P_loding_2', 
      P_loding_3='$P_loding_3', 
      P_loding_4='$P_loding_4', 
      P_loding_5='$P_loding_5'
      WHERE P_id='$ID' ";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql ");

mysqli_close($conn); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('อัปเดต สถานะสำเร็จ');";
  echo "window.location = '../../loding_project.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>