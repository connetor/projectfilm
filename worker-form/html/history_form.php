<?php
    session_start();
    require'../../class.php';
    $obj = new Dataphp();
    
    $sql = 'SELECT * FROM `workerhistory` WHERE `Workhistory_ID` = '.$_GET['history'];
    $res = mysqli_fetch_assoc( mysqli_query($obj->re_login(),$sql));
    $id = $_SESSION['id_show'];
    
        $obj = new Dataphp();
        $obj->workerinformation($id);
    
        $data = mysqli_fetch_assoc($obj->workerinformation);

        $id_history = $_GET['history'];
    $sql2='SELECT * FROM quotation_detail where Quotation_ID = '.$res['Quotation_ID'];
    $resdetail=mysqli_query($obj->re_login(),$sql2);

    $sql4='SELECT Request_ID FROM quotation where Quotation_ID ='.$res['Quotation_ID'];
    $resquo=mysqli_fetch_assoc(mysqli_query($obj->re_login(),$sql4));


    $sql3='SELECT * FROM request where Request_ID = '.$resquo['Request_ID'];
    echo $sql3;
    $res3=mysqli_fetch_assoc(mysqli_query($obj->re_login(),$sql3));

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
                            <img src="<?php echo $data['ProfilePic'] ; ?>" alt="user-img" width="36" class="img-circle">
                                <b class="hidden-xs"><?php echo $data['Fname'] ; echo "&nbsp&nbsp&nbsp". $data['Lname'];?></b>
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
                        <h4 class="page-title">History Detail</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="active">History Detail</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->

                <div class="row">

                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">ลูกค้าที่จ้าง</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $obj->return_namemember($res['Member_ID']); ?>" disabled class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">ชื่องาน</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $obj->return_quotation($res['Quotation_ID']); ?>" disabled class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">เวลาเริ่มต้นในการทำงาน</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="<?php echo $res3['StartDatetime']; ?>" disabled class="form-control form-control-line" name="example-email"
                                            id="example-email"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">สถานที่ทำงาน</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $obj->re_location($res['Quotation_ID']); ?>" disabled class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">รายละเอียด</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control form-control-line" disabled placeholder="<?php echo $obj->re_detail($res['Quotation_ID']); ?>"></textarea>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-md-12">งาน</label>
                                   <div class = "col-md-6">
                                    <?php
                                    
                                    while($detail = mysqli_fetch_assoc($resdetail)){
                                           echo "
                                            <input type='text'  disabled placeholder='".$detail['QutationDetail']."   ---   ราคา : ".$detail['QuotationPrice']."   ฿' class='form-control form-control-line'>                                          
                            
                                            ";
                                          
                                    }
                                   
                                    ?>
                                   </div>
                                
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">ค่าจ้าง</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $obj->re_price($res['Quotation_ID']); ?> บาท" disabled class="form-control form-control-line"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">สถานะงาน</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php
                                            if($res['IsFinish']==0){
                                                echo 'กำลังดำเนินการ';
                                            }
                                            elseif($res['IsFinish']==1){
                                                echo 'เสร็จสิ้น';
                                            }
                                        ?>" disabled class="form-control form-control-line"> </div>
                                </div>
                        </div>

                        <a class="btn btn-danger" href="history.php">ย้อนกลับ</a>
                        <?php 
                        if($res['Isfinish_member']==0&&$res['Isfinish_member']==0){
                            echo "<a class='btn btn-success' onclick='accept()'>    เสร็จสิ้น</a> " ;
                        }
                       
                        
                        ?>
                      
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
</body>
<script type="text/javascript">
        function accept(){
            $.ajax({
                url:'uncon.php',
                type:'post',
                data:{datahistory:<?php echo $id_history; ?>},
                success:function(result){
                    alert(result);
                    location.reload();
                }
            });
        }
        
    </script>
</html>