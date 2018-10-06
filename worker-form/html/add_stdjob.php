<?php
        session_start();
        require'../../class.php';
        $id = $_SESSION['id_show'];    
        $obj = new Dataphp();    
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
                            <b class="hidden-xs">User</b>
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
                        <a href="price.php" class="waves-effect">
                            <i class="fa fa-money fa-fw" aria-hidden="true"></i>เบิกค่าบริการ</a>
                    </li>
                    <li>
                        <a href="customer_request.php" class="waves-effect">
                            <i class="fa fa-bars fa-fw" aria-hidden="true"></i>จัดการคำขอลูกค้า</a>
                    </li>
                    <li>
                        <a href="map-google.html" class="waves-effect">
                            <i class="fa fa-globe fa-fw" aria-hidden="true"></i>Google Map</a>
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
                            <form class="form-horizontal form-material" method="GET" id="standardjob_data">
                                <div class="form-group"> 
                                <table id="myTable" >
                                    <tr>
                                        <th width="30%">
                                            ชื่องาน
                                        </th>
                                        <th width="38%">
                                            รายละเอียด
                                        </th>
                                        <th width="20%" >
                                            ราคา
                                        </th>
                                        <th width="10%" >
                                            เพิ่ม
                                        </th>
                                      
                                    </tr>
                                    <tr>
                                        <td>
                                            <input name="name_set-0" type="text" placeholder="ชื่องาน" class="form-control form-control-line">
                                        </td>
                                        <td>
                                            <input name="detail_set-0" type="text" placeholder="รายละเอียด" class="form-control form-control-line">
                                        </td>
                                        <td>
                                        <input name="price_set-0" type="text" placeholder="ราคา" class="form-control form-control-line">
                                        </td>
                                        <td>
                                            <a class="btn btn-success" onclick="add_detail()">เพิ่มหัวข้อ
                                                </a>
                                        </td>                                     
                                    </tr>
                                </table>
                                <div class="form-group" style="margin-top: 1%;">
                                    <label class="col-md-12">ใบเสนอราคา</label>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control form-control-line">
                                    </div>
                                </div>
                                <a  onclick="quotation_submit()" type="submit" class="btn btn-success" href="JavaScript:void(0)">ยืนยัน</a>
                                    <button class="btn btn-danger" type="reset">ยกเลิก</button>
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
    <script>
        var num = 1;
        function add_detail() {
            $('#myTable').append('<tr><td><input name="name_set-'+num+'" type="text" placeholder="หัวข้อ" class="form-control form-control-line"></td><td><input name="detail_set-'+num+'" type="text" placeholder="รายละเอียด" class="form-control form-control-line"></td> <td><input name="price_set-'+num+'" type="text" placeholder="ราคา" class="form-control form-control-line"></td><td></td></tr>');
                num++;
        }
       
        function quotation_submit(){
            
            var data_set = $('#standardjob_data').serializeArray();
            data_set[data_set.length] = { name: "num", value: num };        
            $.ajax({
                url:'add_standardjob.php',
                type:'post',
                data:data_set,
                success:function(result){
                  alert(result);
                }
            });
        }
    </script>
</body>

</html>