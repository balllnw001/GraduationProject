<meta charset="UTF-8">
<?php
// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
//1. เชื่อมต่อ database: 
include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
    $ID = $_REQUEST["ID"];
  $Pro_final = $_REQUEST["Pro_final"];
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE submit_an_examination_request_assess_evidence SET  
      Pro_final='$Pro_final'
      WHERE Pro_id='$ID' ";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql ");

mysqli_close($conn); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('อัปเดต สถานะสำเร็จ');";
  echo "window.location = '../../final_project.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>