<meta charset="UTF-8">
<?php
echo '<pre>';
print_r($_REQUEST);
echo '</pre>';
include('../backend/connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $P_id = $_REQUEST["P_id"];
  $Pro_date = $_REQUEST["Pro_date"];

  //เพิ่มเข้าไปในฐานข้อมูล
  $check = "SELECT * FROM submit_an_examination_request_assess_evidence  WHERE P_id = '$P_id' ";
	$result = mysqli_query($conn,$check) or die;
	$num=mysqli_num_rows($result); 
        if($num > 0)   		
        {
             echo "<script>";
			 echo "alert('มีการยื่นขอสอบในระบบแล้ว');";
			 echo "window.location='../add_project.php';";
          	 echo "</script>";
 
		}else{  
       $sql = "INSERT INTO submit_an_examination_request_assess_evidence
            (P_id,Pro_date)
       VALUES('$P_id','$Pro_date')";
    
  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql ");
    } 
  //ปิดการเชื่อมต่อ database
  mysqli_close($conn);
  //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('ยื่นคำร้องขอสอบสำเร็จ');";
  //echo "window.location = '../exam_project.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to again');";
  echo "</script>";
}
?>