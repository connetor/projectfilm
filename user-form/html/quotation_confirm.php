<?php
    session_start();   
    require'../../class.php';
    $obj = new Dataphp();
    $sql = 'SELECT `Member_ID`, `Worker_ID`, `Location`, `JobName`, `RequestDetail`, `IsConfirmRequest` FROM `request` WHERE `Request_ID` = '.$_GET['id_request'];
    $data = mysqli_fetch_assoc(mysqli_query($obj->re_login(),$sql));

    $sql2 = 'SELECT `ISConfirm`,`Quotation_ID`, `Worker_ID`, `Member_ID` FROM `quotation` WHERE `Request_ID` = '.$_GET['id_request'];
    $check = mysqli_num_rows(mysqli_query($obj->re_login(),$sql2));

    $data_c = mysqli_fetch_assoc(mysqli_query($obj->re_login(),$sql2));

    $sql3 = 'SELECT `QutationDetail`, `QuotationPrice` FROM `quotation_detail` WHERE `Quotation_ID` = '.$data_c['Quotation_ID'];

    $id = $_SESSION['id_show'];
    
    $obj->memberinformation($id);

    $datauser = mysqli_fetch_assoc($obj->memberinformation);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Worker Profile</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header">  
                    <!-- /Logo -->
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        
                        <li>
                                <a class="profile-pic" href="#">
                             <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle">
                             <b class="hidden-xs"><?php echo $datauser['Fname'] ; echo "&nbsp&nbsp&nbsp". $datauser['Lname'];?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-header -->
                <!-- /.navbar-top-links -->
                <!-- /.navbar-static-side -->
            </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3>
                        <span class="fa-fw open-close">
                            <i class="ti-close ti-menu"></i>
                        </span>
                        <span class="hide-menu">Navigation</span>
                    </h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="index.php" class="waves-effect">
                            <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>หน้าหลัก</a>
                    </li>
                    <li>
                        <a href="edit_profile.php" class="waves-effect">
                            <i class="fa fa-table fa-fw" aria-hidden="true"></i>แก้ไขข้อมูล</a>
                    </li>
                    <li>
                        <a href="history.php" class="waves-effect">
                            <i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>ประวัติการทำงาน</a>
                    </li>        
                    <li>
                        <a href="customer_request.php" class="waves-effect">
                            <i class="fa fa-bars fa-fw" aria-hidden="true"></i>จัดการงานที่จ้าง</a>
                    </li>
                    <li>
                        <a href="map-google.html" class="waves-effect">
                            <i class="fa fa-globe fa-fw" aria-hidden="true"></i>Google Map</a>
                    </li>
                    <li>
                        <a href="../../del_session.php" class="waves-effect">
                        <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>ออกจากระบบ</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Quotation</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li>
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">Quotation</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">

                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" action="customer_request.php" method="GET">
                                <div class="form-group">
                                    <label class="col-md-12">ชื่องาน</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $data['JobName']; ?>" disabled class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">ระยะเวลาในการทำงาน</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="3 วัน 16/8/61 - 19/8/61" disabled class="form-control form-control-line" name="example-email"
                                            id="example-email"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">สถานที่ทำงาน</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $data['Location']; ?>" disabled class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">รายละเอียดจากลูกค้า</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control form-control-line" disabled><?php
                                            echo $data['RequestDetail'];
                                        ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">รูปของงานที่ต้องทำ</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control form-control-line" disabled></textarea>
                                    </div>
                                </div>
                                <table id="myTable" >
                                        <tr>
                                            <th width="70%">
                                                หัวข้อ
                                            </th>
                                            <th width="70%">
                                                ราคา
                                            </th>
                                            
                                        </tr>
                                <?php 
                $res_c = mysqli_query($obj->re_login(),$sql3);
                while ($data_detial = mysqli_fetch_assoc($res_c)) {
                    echo '<tr><td>
                            <input disabled type="text" placeholder="'.$data_detial['QutationDetail'].'" class="form-control form-control-line">
                        </td>
                        <td>
                            <input disabled type="text" placeholder="'.$data_detial['QuotationPrice'].'" class="form-control form-control-line">
                        </td></tr>';
                        
                }
                        echo '<tr>
                                <td>
                                    <input disabled type="text" placeholder="รวม" class="form-control form-control-line">
                                </td>
                                <td>
                                    <input disabled type="text" placeholder="'. $obj->re_price($data_c['Quotation_ID']).'" class="form-control form-control-line">
                                </td>
                             </tr>';
                                ?>
                                    </table>
                                <div class="form-group" style="margin-top: 1%;">
                                    <label class="col-md-12">ใบเสนอราคา</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="ไฟล์ใบเสนอราคา" disabled class="form-control form-control-line"> 
                                    </div>
                                </div>            
                                หากคุณกดยืนยันจะเป็นการตกลง และ ช่างจะเริ่มทำงานทันที<br> 
                                <a style="<?php if ($data_c['ISConfirm']==1) {
                                    echo "display: none;";
                                } ?>" 
                                onclick="confirm_quotation(<?php echo $data_c['Worker_ID'].','.$data_c['Member_ID'].','.$data_c['Quotation_ID']; ?>)" type="submit" class="btn btn-success" href="#">ยืนยัน</a>
                                <button class="btn btn-danger" onclick="can_quotation(<?php echo $data_c['Worker_ID'].','.$data_c['Member_ID'].','.$data_c['Quotation_ID']; ?>)" class="btn btn-cancel" href="#">ยกเลิก</button>
                                <a class="btn btn-default" href="customer_request.php">ย้อนกลับ</a>                            
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script type="text/javascript">
        function confirm_quotation(id_w,id_m,quotation_ID){
            var data = { 'data':quotation_ID,'id_w':id_w,'id_m':id_m};
            $.ajax({
                url:'con_quo.php',
                type:'post',
                data:data,
                success:function(res){
                    //alert(res)
                    location.reload();
                }
            })
        }
        function can_quotation(id_w,id_m,quotation_ID){
            var data = { 'data':quotation_ID};
            $.ajax({
                url:'cancle.php',
                type:'post',
                data:data,
                success:function(res){
                    // alert(res)
                     location.reload();
                }
            })
        }
        
        
        
    </script>
</body>

</html>