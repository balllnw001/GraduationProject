<?php include('../head.php')?>
<body class="sb-nav-fixed">
    <?php include('../navbar.php')?>
    <div id="layoutSidenav">
    <?php include('../menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">อัปบท ข้อเสนอโครงงาน กับ บทคัดย่อ</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="../../student.php">ตารางข้อมูลหลักฐาน</a></li>
                        <li class="breadcrumb-item active">อัปบท ข้อเสนอโครงงาน กับ บทคัดย่อ</li>
                    </ol>
<?php
// echo '<pre>';
// print_r($_FILES);
// echo '</pre>';
// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
//1. เชื่อมต่อ database: 
include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง: 
$project_id = $_REQUEST["ID"];

$sql = "SELECT P.P_id,S.Username,CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name,
                        P.P_name_th,P.P_name_eng,P.P_year,CONCAT(A.Prename,A.Firstname,' ',A.Lastname) AS A_Name,
                        P.P_loding_1,P.P_loding_2,P.P_loding_3,P.P_loding_4,P.P_loding_5,P.P_status,PT.Pt_id,PT.Pt_name,P.P_upload 
                        FROM project AS P
                        INNER JOIN admin AS A ON P.A_ID = A.A_ID
                        INNER JOIN student AS S ON P.S_ID = S.S_ID
                        INNER JOIN project_type AS PT ON P.Pt_id = PT.Pt_id WHERE P.P_id = '$project_id'
                        ";
                        $result = mysqli_query($conn, $sql) ;
                        $row = mysqli_fetch_array($result);
                        extract($row);
?>
<br/>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> แบบฟอร์มอัป ข้อเสนอโครงงาน กับ บทคัดย่อ
                        </div>
                  <form action="upload_trace_project_db.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">
                    <input type="hidden" name="ID" value="<?php echo $project_id;?>">
                    </br>
                    <div class="form-group">
                                <div class="col-sm-5" align="left">
                                    <tr>
                                        <td align="center" bgcolor="#EDEDED">อัปโหลด ข้อเสนอโครงงาน</td></br>
                                        <td bgcolor="#EDEDED"><label>
                                            <input type="file" name="P_upload_pdf" id="P_upload_pdf" accept="application/pdf"/>
                                        </label></td>
                                    </tr>
                                </div>
                                </div>
                            <div class="form-group">
                                <div class="col-sm-5" align="left">
                                    <tr>
                                        <td align="center" bgcolor="#EDEDED">อัปโหลด บทคัดย่อ</td></br>
                                        <td bgcolor="#EDEDED"><label>
                                            <input type="file" name="P_upload" id="P_upload" accept="application/pdf" onchange="return fileValidation()"/>
                                        </label></td>
                                    </tr>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                    <tr>
                                        <td align="center" bgcolor="#EDEDED">*อัพได้เฉพาะไฟล์ PDF เท่านั้น</td></br>
                                        
                                    </tr>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5" align="right">
                                        <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> อัปโหลด </button>
                                        <input type=button onClick='window.history.back()' class="btn btn-primary" value='กลับ'>
                                        <!-- <input type="button" value="กลับหน้าหลัก" name="home" onclick="goBack()">
                                    <input name="Back" type="button" value=" Back"onClick="jascript:history.go(-1)"> -->
                                </div>  
                            </form>
                    </div>