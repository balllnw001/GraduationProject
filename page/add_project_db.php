<meta charset="UTF-8">
<?php
// echo '<pre>';
// print_r($_FILES);
// echo '</pre>';
// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
include('../backend/connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $P_name_th = $_REQUEST["P_name_th"];
  $P_name_eng = $_REQUEST["P_name_eng"];
  $A_ID = $_REQUEST["A_ID"];
  $S_ID = $_REQUEST["User_ID"];
  $P_year = $_REQUEST["P_year"];
  $Pt_id = $_REQUEST["Pt_id"];

  date_default_timezone_set('Asia/Bangkok');
	$date = date("Ymd");
  //ฟังก์ชั่นสุ่มตัวเลข
          $numrand = (mt_rand());
  //เพิ่มไฟล์
  $upload=$_FILES['P_upload_pdf'];
  if($upload <> '') {   //not select file
  //โฟลเดอร์ที่จะ upload file เข้าไป 
  $path="fileupload/"; 

  //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
  $type = strrchr($_FILES['P_upload_pdf']['name'],".");
    
  //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
  $newname = $date.$numrand.$type;
  $path_copy=$path.$newname;
  $path_link="fileupload/".$newname;

  //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
  move_uploaded_file($_FILES['P_upload_pdf']['tmp_name'],$path_copy);  
    }
    $check = "SELECT * FROM project WHERE S_ID = '$S_ID'";
    $result = mysqli_query($conn,$check) or die;
    $num=mysqli_num_rows($result); 
          if($num > 0)   		
          {
               echo "<script>";
         echo "alert('สามารถเสนอโครงงานได้เพียงหัวข้อเดียว (หากต้องการเปลี่ยนหัวข้อจะต้องมีการยกเลิกหัวข้อเดิม)');";
         echo "window.location='../add_project.php';";
               echo "</script>";
   
      }else{
 $check = "SELECT * FROM project  WHERE P_name_th = '$P_name_th'and P_name_eng = '$P_name_eng' ";
	$result = mysqli_query($conn,$check) or die;
	$num=mysqli_num_rows($result); 
        if($num > 0)   		
        {
             echo "<script>";
			 echo "alert('มีโครงงานอยู่ในระบบแล้ว');";
			 echo "window.location='../add_project.php';";
          	 echo "</script>";
 
		}else{ 

    
  //เพิ่มเข้าไปในฐานข้อมูล
  $sql = "INSERT INTO project(P_name_th, P_name_eng,A_ID, S_ID, P_year, Pt_id,P_upload_pdf)
       VALUES('$P_name_th', '$P_name_eng','$A_ID', '$S_ID', '$P_year','$Pt_id','$newname')";

   $result = mysqli_query($conn, $sql) or die ("Error in query: $sql ");
    }
  }
  //ปิดการเชื่อมต่อ database
  mysqli_close($conn);
  //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('ยื่นข้อเสนอสำเร็จ');";
  echo "window.location = '../add_project.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to again');";
  echo "</script>";
}
    
?>