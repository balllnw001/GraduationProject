<?php

$menu = "index";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <title>Document</title>
</head>
<body>


<?php include("header.php"); ?>

<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa-address-card"></i> ลูกค้า</h1>
    </div>
  </section>

  <section class="content">
         <div align="right"> 
        <a href="member_from_add.php">      
        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-user-plus"></i> เพิ่มข้อมูล ลูกค้า</button></a>
        

        
          </div>
     <p></p>
    
  <?php
      
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM member ORDER BY m_id ASC" or die;
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);?>
        

                   <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">';
                   <thead>        
                      <tr>
                      <td>รหัสลูกค้า</td>
                      <td>ชื่อ</td>
                      <td>นามสกุล</td>
                      <td>อีเมล์</td>                  
                      <td>เบอร์โทรศัพท์</td>
                      <td>ที่อยู่</td>
                      <td></td>
                      <td></td>                 
                    </tr>
                    </thead>
                  <?php

                  while($row = mysqli_fetch_array($result)) {  ?>
                  <tbody>
                  <tr>
                    <td><?php echo $row["m_id"]?></td> 
                    <td><?php echo $row["m_name"]?></td> 
                   <td><?php echo $row["m_lasttname"]?></td> 
                   <td><?php echo $row["m_email"]?></td> 
                   <td><?php echo $row["m_tel"]?></td> 
                    <td><?php echo $row["m_address"]?></td> 


                  
                    <td><a href='member.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td>  
                    
                    <td><a href='admin_form_delete_db.php?ID=$row[0]' onclick="return confirm('Do you want to delete this record? !!!')" class='btn btn-danger btn-xs'>ลบ</a></td> 
                  </tr> 
                  </tbody>
                  <?php
                  }?>
                </table>
                <?php
                mysqli_close($con);
                ?>


                
</section>
<!-- /.content -->
<?php include('footer.php'); ?>
<script>
$(function () {
$(".datatable").DataTable();
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
});
});
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</body>
</html>