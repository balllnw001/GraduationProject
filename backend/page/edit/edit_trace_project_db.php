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
  $P_complate_word = $_REQUEST["P_complate_word"];
  $P_complate_PDF = $_REQUEST["P_complate_PDF"];
  $P_complate_file = $_REQUEST["P_complate_file"];
  $P_complate_book = $_REQUEST["P_complate_book"];
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE project SET  
      P_name_th='$P_name_th', 
      P_name_eng='$P_name_eng', 
      P_year='$P_year',
      P_complate_word='$P_complate_word',
      P_complate_PDF='$P_complate_PDF', 
      P_complate_file='$P_complate_file', 
      P_complate_book='$P_complate_book' 
      WHERE P_id='$ID' ";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql ");

mysqli_close($conn); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('แก้ไขข้อมูลหลักฐานโครงงาน สำเร็จ');";
  echo "window.location = '../../trace_project.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>