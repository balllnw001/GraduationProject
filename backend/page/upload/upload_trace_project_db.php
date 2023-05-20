<meta charset="UTF-8">
<?php
// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
// echo '<pre>';
// print_r($_FILES);
// echo '</pre>';

//1. เชื่อมต่อ database: 

include('../../connection.php');
$ID = $_REQUEST["ID"];

 //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
 //รับค่าไฟล์จากฟอร์ม	

//ฟังก์ชั่นวันที่
    date_default_timezone_set('Asia/Bangkok');
	$date = date("Ymd");
//ฟังก์ชั่นสุ่มตัวเลข
    $numrand = (mt_rand());
//เพิ่มไฟล์
$upload_pdf=$_FILES['P_upload_pdf'];
$upload=$_FILES['P_upload'];
$file_type=$_FILES['P_upload_pdf']['type'];
$file_type1=$_FILES['P_upload']['type'];
if($upload <> '') {   //not select file
//โฟลเดอร์ที่จะ upload file เข้าไป 

$path="../../../page/fileupload/"; 
$path1="fileupload/";  

//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
 $type = strrchr($_FILES['P_upload_pdf']['name'],".");
 $type1 = strrchr($_FILES['P_upload']['name'],".");
	
//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
$newname = $date.$numrand.$type;
$newname1 = $date.$numrand.$type1;
$path_copy=$path.$newname;
$path_copy1=$path1.$newname1;
$path_link="../../../page/fileupload/".$newname;
$path_link="fileupload/".$newname1;

if(!empty($file_type||$file_type1)){
if ($file_type=="application/pdf"||$file_type1=="application/pdf") {
//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
move_uploaded_file($_FILES['P_upload_pdf']['tmp_name'],$path_copy);  	
move_uploaded_file($_FILES['P_upload']['tmp_name'],$path_copy1); 
	
	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	
		$sql = "UPDATE project SET P_upload_pdf = '$newname',P_upload = '$newname1' WHERE P_id = '$ID'";
		
		$result = mysqli_query($conn, $sql) or die ("Error in query: $sql ");
	
	mysqli_close($conn);
	// javascript แสดงการ upload file
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('อัปโหลดสำเร็จ');";
	echo "window.location = '../../trace_project.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to upload again');";
	echo "</script>";
}

}
else{
	echo "<script type='text/javascript'>";
	echo "alert('เฉพาะไฟล์ PDF เท่านั้น');";
	echo "window.location = '../../trace_project.php'; ";
	echo "</script>";
   }
}else{
	echo "<script type='text/javascript'>";
	echo "alert('ไม่พบไฟล์ที่ต้องการอัพโหลด');";
	echo "window.location = '../../trace_project.php'; ";
	echo "</script>";
}
}
?>