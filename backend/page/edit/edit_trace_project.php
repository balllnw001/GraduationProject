<?php include('../head.php')?>
<body class="sb-nav-fixed">
<?php include('../navbar.php')?>
    <div id="layoutSidenav">
    <?php include('../menu.php')?>
        <div id="layoutSidenav_content">
        <main>
                <div class="container-fluid">
                    <h1 class="mt-4">แก้ไขข้อมูลหลักฐานโครงงาน</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="../../trace_project.php">ตารางข้อมูลหลักฐานโครงงาน</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลหลักฐานโครงงาน</li>
                    </ol>
                    <?php
                    // echo '<pre>';
                    // print_r($_REQUEST);
                    // echo '</pre>';
                                //1. เชื่อมต่อ database:
                                include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                        //2. query ข้อมูลจากตาราง:
                        $project_id = $_REQUEST["ID"];

                        $sql = "SELECT P.P_id,S.Username,CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name,
                        P.P_name_th,P.P_name_eng,P.P_year,CONCAT(A.Prename,A.Firstname,' ',A.Lastname) AS A_Name,
                        P.P_complate_word,P.P_complate_PDF,P.P_complate_file,P.P_complate_book FROM project AS P
                        INNER JOIN admin AS A ON P.A_ID = A.A_ID
                        INNER JOIN student AS S ON P.S_ID = S.S_ID
                        INNER JOIN project_type AS PT ON P.Pt_id = PT.Pt_id 
                        WHERE P.P_id = '$project_id'
                        ";
                        $result = mysqli_query($conn, $sql) ;
                        $row = mysqli_fetch_array($result);
                        extract($row);
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> แบบฟอร์มแก้ไขข้อมูลหลักฐานโครงงาน
                        </div>
                        <form  name="edit_loding_project" action="edit_trace_project_db.php" method="POST" class="form-horizontal">
                        <input type="hidden" name="ID" value="<?=$P_id;?>">
                        <!-- <input type="hidden" id="User_ID" name="User_ID" value="<?php echo $_SESSION["User_ID"]; ?>"> -->
                        </br>
                            <div class="form-group">
                                <div class="col-sm-5" align="left">
                                ชื่อโครงงานภาษาไทย :
                                    <input  readonly="readonly" name="P_name_th" type="text" value="<?=$P_name_th;?>" required class="form-control" id="P_name_th" placeholder="ชื่อโครงงานภาษาไทย" pattern="^[ กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+$" title="ภาษาไทยเท่านั้น" minlength="5" maxlength="100"  />
                                </div>
                            </div> 
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                ชื่อโครงงานภาษาอังกฤษ :
                                    <input  readonly="readonly" name="P_name_eng" type="text" value="<?=$P_name_eng;?>" required class="form-control" id="P_name_eng" placeholder="ชื่อโครงงานภาษาอังกฤษ" pattern="^[ a-zA-Z0-9]+$" minlength="5" maxlength="100" />
                                </div>
                                </div>
                                
                                <!-- <input type="hidden" id="User_ID" name="User_ID" value="<?php echo $_SESSION["User_ID"]; ?>"> -->
                                
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                ปีการศึกษา :
                                    <input  readonly="readonly" name="P_year" type="text" value="<?=$P_year;?>" required class="form-control" id="P_year" placeholder="ปีการศึกษา" pattern="^[0-9]+$" minlength="4" maxlength="4" />
                                </div>
                                </div>
                                <?php
                                $loding1 = $_GET['B1'];
                                $loding2 = $_GET['B2'];
                                $loding3 = $_GET['B3'];
                                $loding4 = $_GET['B4'];
                                $word = explode(",",$loding1);
                                $pdf = explode(",",$loding2);
                                $program = explode(",",$loding3);
                                $book = explode(",",$loding4);
                                ?>
                                
                                <!-- บทที่ 1 -->

                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                เอกสาร Word <br/>
                                <input name="P_complate_word" type="checkbox" class="css_data_item1" id="P_complate_word" value="0"
                                <?php
                                    if(in_array("0",$word))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> ยังไม่ส่ง<br/>
                                <input name="P_complate_word" type="checkbox" class="css_data_item1" id="P_complate_word" value="1" 
                                <?php
                                    if(in_array("1",$word))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> ไม่สมบูรณ์<br/>
                                <input name="P_complate_word" type="checkbox" class="css_data_item1" id="P_complate_word" value="2" 
                                <?php
                                    if(in_array("2",$word))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> สมบูรณ์แล้ว<br/>                        
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-5" align="left">

                                <!-- บทที่ 2  -->

                                เอกสาร Pdf<br/>
                                <input name="P_complate_PDF" type="checkbox" class="css_data_item2" id="P_complate_PDF" value="0"
                                <?php
                                    if(in_array("0",$pdf))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> ยังไม่ส่ง<br/>
                                <input name="P_complate_PDF" type="checkbox" class="css_data_item2" id="P_complate_PDF" value="1" 
                                <?php
                                    if(in_array("1",$pdf))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> ไม่สมบูรณ์<br/>
                                <input name="P_complate_PDF" type="checkbox" class="css_data_item2" id="P_complate_PDF" value="2" 
                                <?php
                                    if(in_array("2",$pdf))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> สมบูรณ์แล้ว<br/>                        
                                </div>
                                </div>

                                <!-- บทที่ 3  -->

                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                เอกสาร ไฟล์งาน<br/>
                                <input name="P_complate_file" type="checkbox" class="css_data_item3" id="P_complate_file" value="0"
                                <?php
                                    if(in_array("0",$program))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> ยังไม่ส่ง<br/>
                                <input name="P_complate_file" type="checkbox" class="css_data_item3" id="P_complate_file" value="1" 
                                <?php
                                    if(in_array("1",$program))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> ไม่สมบูรณ์<br/>
                                <input name="P_complate_file" type="checkbox" class="css_data_item3" id="P_complate_file" value="2" 
                                <?php
                                    if(in_array("2",$program))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> สมบูรณ์แล้ว<br/>                        
                                </div>
                                </div>

                                <!-- บทที่ 4  -->

                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                รูปเล่นสมบูรณ์<br/>
                                <input name="P_complate_book" type="checkbox" class="css_data_item4" id="P_complate_book" value="0"
                                <?php
                                    if(in_array("0",$book))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> ยังไม่ส่ง<br/>
                                <input name="P_complate_book" type="checkbox" class="css_data_item4" id="P_complate_book" value="1" 
                                <?php
                                    if(in_array("1",$book))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> ไม่สมบูรณ์<br/>
                                <input name="P_complate_book" type="checkbox" class="css_data_item4" id="P_complate_book" value="2" 
                                <?php
                                    if(in_array("2",$book))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> สมบูรณ์แล้ว<br/>                        
                                </div>
                                </div>
                                

                                <!-- สถานะ -->

                                <!-- <div class="form-group">
                                <div class="col-sm-5" align="left">
                                สถานะ<br/>
                                <input name="P_status" type="checkbox" class="css_data_item5" id="P_status" value="0"
                                <?php
                                    if(in_array("0",$S))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> ยังไม่ส่ง<br/>
                                <input name="P_status" type="checkbox" class="css_data_item5" id="P_status" value="1" 
                                <?php
                                    if(in_array("1",$S))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> ไม่สมบูรณ์<br/>
                                <input name="P_status" type="checkbox" class="css_data_item5" id="P_status" value="x" 
                                <?php
                                    if(in_array("x",$S))
                                    {
                                        echo "checked";
                                    }
                                ?>
                                /> ยกเลิก<br/>                        
                                </div>
                                </div> -->
                                

                                <div class="form-group">
                                    <div class="col-sm-5" align="right">
                                        <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> ยืนยัน </button>
                                        <input type=button onClick='window.history.back()' class="btn btn-primary" value='กลับ'>
                                        <!-- <input type="button" value="กลับหน้าหลัก" name="home" onclick="goBack()">
                                    <input name="Back" type="button" value=" Back"onClick="jascript:history.go(-1)">  -->
                                </div>     
                            </div>
                            </form>
                    </div>
                </div>
            </main>
            <!-- <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a> &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
<?php include('../script.php')?>
    <script type="text/javascript">  
$(function(){        
       
    $(".css_data_item1").click(function(){  // เมื่อคลิก checkbox  ใดๆ  
        if($(this).prop("checked")==true){ // ตรวจสอบ property  การ ของ   
            var indexObj=$(this).index(".css_data_item1"); //   
            $(".css_data_item1").not(":eq("+indexObj+")").prop( "checked", false ); // ยกเลิกการคลิก รายการอื่น  
        }  
    });  

    $(".css_data_item2").click(function(){  // เมื่อคลิก checkbox  ใดๆ  
        if($(this).prop("checked")==true){ // ตรวจสอบ property  การ ของ   
            var indexObj=$(this).index(".css_data_item2"); //   
            $(".css_data_item2").not(":eq("+indexObj+")").prop( "checked", false ); // ยกเลิกการคลิก รายการอื่น  
        }  
    }); 

    $(".css_data_item3").click(function(){  // เมื่อคลิก checkbox  ใดๆ  
        if($(this).prop("checked")==true){ // ตรวจสอบ property  การ ของ   
            var indexObj=$(this).index(".css_data_item3"); //   
            $(".css_data_item3").not(":eq("+indexObj+")").prop( "checked", false ); // ยกเลิกการคลิก รายการอื่น  
        }  
    }); 

    $(".css_data_item4").click(function(){  // เมื่อคลิก checkbox  ใดๆ  
        if($(this).prop("checked")==true){ // ตรวจสอบ property  การ ของ   
            var indexObj=$(this).index(".css_data_item4"); //   
            $(".css_data_item4").not(":eq("+indexObj+")").prop( "checked", false ); // ยกเลิกการคลิก รายการอื่น  
        }  
    }); 

    $(".css_data_item5").click(function(){  // เมื่อคลิก checkbox  ใดๆ  
        if($(this).prop("checked")==true){ // ตรวจสอบ property  การ ของ   
            var indexObj=$(this).index(".css_data_item5"); //   
            $(".css_data_item5").not(":eq("+indexObj+")").prop( "checked", false ); // ยกเลิกการคลิก รายการอื่น  
        }  
    }); 
 
    $("#form_checkbox1").submit(function(){ // เมื่อมีการส่งข้อมูลฟอร์ม  
        if($(".css_data_item:checked").length==0){ // ถ้าไม่มีการเลือก checkbox ใดๆ เลย  
            alert("NO");  
            return false;     
        }  
    });     
           
});  
</script>
</body>
