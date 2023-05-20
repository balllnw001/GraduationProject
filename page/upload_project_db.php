<meta charset="UTF-8">
<?php
echo '<pre>';
print_r($_FILES);
echo '</pre>';
//1. เชื่อมต่อ database: 
include('../backend/connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$allowedExts = array("pdf");
$temp = explode(".", $_FILES["pdf_file"]["name"]);
$extension = end($temp);
$upload_pdf=$_FILES["pdf_file"]["name"];
move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"../uploads/เอกสาร/" . $_FILES["pdf_file"]["name"]);
$sql=mysqli_query($conn,"INSERT INTO project(P_upload)VALUES('$upload_pdf')");
if($sql){
	echo "Data Submit Successful";
}
else{
	echo "Data Submit Error!!";
}
?>


<?php
$uploaddir = '../uploads/เอกสาร/';
$uploadfile = $uploaddir . basename($_FILES['pdf_file']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

print "</pre>";

?>