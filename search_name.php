<?php
    session_start();
    require'class.php';
    require'pagination/pagination.php';
    $obj = new Dataphp();
    $link = $obj->re_login();

    if (isset($_POST['data_search'])) {
        $_SESSION['name_search'] = $_POST['data_search'];

    }
    $sql = "SELECT `Worker_ID`, `Fname`, `Lname`, `TypeID`, `Extention`, `TypeID` FROM `workerinformation` WHERE `Fname`  LIKE '%".$_SESSION['name_search']."%' ";

    $data_set = page_query($link, $sql, 6);

    if(isset($_SESSION['id_show'])){            
        if(isset($_SESSION['worker'])){
          $chk=1;
        $id = $_SESSION['id_show'];  
      $obj->workerinformation($id);
      $data = mysqli_fetch_assoc($obj->workerinformation);
        }
        else
        {
          $chk=0;
      $id = $_SESSION['id_show'];
      $obj->memberinformation($id);
      $data = mysqli_fetch_assoc($obj->memberinformation);
        }     
  
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bethany Bootstrap Theme</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- =======================================================
    Theme Name: Bethany
    Theme URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->

</head>

<body>
    <!--header-->
    <header class="main-header" id="header">
        <div class="bg-color">
            <!--nav-->
            <nav class="nav navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false"
                                aria-controls="navbar">
                                <span class="fa fa-bars"></span>
                            </button>
                            <a href="index.php" class="navbar-brand">FIXED</a>
                        </div>
                        <div class="collapse navbar-collapse navbar-right" id="mynavbar">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="index.php">หน้าหลัก</a>
                                </li>
                                <li>
                                    <a href="#feature">ค้นหาช่าง</a>
                                </li>
                                <li>
                                <?php                       
                      if(isset($id)){
                          if($chk==1){
                            echo "<a class='btn btn-primary dropdown-toggle'  data-toggle='dropdown'>"
                            .$data['Fname']."&nbsp&nbsp".$data['Lname'].
                            "<span class='caret'></span></a>";
                            echo "<ul  class='dropdown-menu'>";
                            echo "<li><a href = 'worker-form/html' class='linkuser' >";                
                            echo "หน้าผู้ใช้</a></li>";
                            echo "<li><a href = 'del_session.php' class='linkuser' >";                
                            echo "ออกจากระบบ</a></li>";
                            echo "</ul>";
                        }
                          else{
                            echo "<a class='btn btn-primary dropdown-toggle'  data-toggle='dropdown'>"
                            .$data['Fname']."&nbsp&nbsp".$data['Lname'].
                            "<span class='caret'></span></a>";
                            echo "<ul  class='dropdown-menu'>";
                            echo "<li><a href = 'user-form/html' class='linkuser' >";                
                            echo "หน้าผู้ใช้</a></li>";
                            echo "<li><a href = 'del_session.php' class='linkuser' >";                
                            echo "ออกจากระบบ</a></li>";
                            echo "</ul>";
                        }
                        
                       
                      }
                      else
                      {
                        echo " 
                        <a href='#contact'>Login/SignUp</a> ";
                      }
                    ?> 
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!--/ nav-->
            <div class="container text-center">
                <div class="wrapper wow fadeInUp delay-05s">
                    <h2 class="top-title">เว็บไซต์สำหรับหาช่างทั่วประเทศไทย</h2>
                    <h3 class="title">FIXED</h3>
                    <h4 class="sub-title">เว็บหาช่างที่ดีที่สุดสำหรับคุณ</h4>
                    <!--/<button type="submit" class="btn btn-submit">Download Now</button> -->
                </div>
            </div>
        </div>
    </header>
    <!--/ header-->
    <!---->
    <section id="cta-1">
        <div class="container">
            <div class="row">
                <div class="cta-info text-center">
                    <div class="col-md-6 col-xs-4">
                        <h2 class="head-title black">เลือกบริเวณที่จะให้ไปทำงาน</h2>
                        <select class="form-control">
                            <option value="1">เมือง</option>
                            <option value="2">สันทราย</option>
                            <option value="3">แม่โจ้</option>
                            <option value="4">หางดง</option>
                            <option value="5">มช</option>
                            <option value="6">แม่แตง</option>
                        </select>
                        <hr class="botm-line-search">
                    </div>

                    <div class="col-md-6 col-xs-4">
                        <h2>
                            <p class="sec-para black">งานที่คุณค้นหา</p>
                        </h2>
                        <select class="form-control" id="select_type">
                            <?php
                        $sql_type = 'SELECT * FROM `type`';
                        $res_type = mysqli_query($link,$sql_type);
                        while ($data_type = mysqli_fetch_assoc($res_type)) {
                            echo '<option value="'.$data_type['Type_ID'].'">'.$data_type['TypeName'].'</option>';
                        }
                            ?>
                        </select>
                    </div>
                    <hr class="botm-line-search">
                </div>
                <div class="col-md-12 col-xs-6">
                    <form action="search_name.php" method="post">
                        <h2 class="head-title black">ค้นหาช่างจากรายชื่อ</h2>
                        <input class="form-control col-lg-8" name="data_search" placeholder="ชื่อช่างที่ต้องการค้นหา" />
                        <br><br>
                        <button type="submit" class="btn btn-success">ค้นหา</button>
                        <hr class="botm-line-search" style="width: 100%">
                    </form>
                </div>
            </div>


        </div>
    </section>
    <!---->
    <!---->
    <section id="feature" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 wow fadeInLeft delay-05s">
                    <div class="section-title">
                        <h2 class="head-title">ช่างชื่อ <?php echo $_SESSION['name_search']; ?></h2>
                        <hr class="botm-line">
                        <p class="sec-para">คุณสามารถเลือกช่างให้ตรงกับงานของคุณในราคาที่คุณต้องการ</p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                         <?php
                            while ($_data = mysqli_fetch_assoc($data_set)) {
                                echo '<div class="col-md-6 wow fadeInRight delay-02s">
                            <div class="">
                                <center>
                                    <img src="img/electric.png" height="100" width="100" alt="" class="img-responsive">
                                </center>
                            </div>
                            <div class="icon-text">
                                <h3 class="txt-tl">
                                    <a href="technician.php?id='.$_data['Worker_ID'].'&type='.$_data['TypeID'].'">งาน : '.$obj->type_select($_data['TypeID']).'</a>
                                </h3>
                                <p class="txt-para">ชื่อ : '.$_data['Fname'].' '.$_data['Lname'].'</p>
                                <p class="txt-para">คะแนน : '.number_format($obj->avg_star($_data['Worker_ID']), 1, '.', '').'/5</p>
                                <p class="txt-para">รายละเอียด : '.$_data['Extention'].'</p>
                            </div>
                        </div>';
                            }
                        ?>
                    </div>
                    <div class="row">
                         <center>
                         <?php
                            page_link_border("solid","1px","#ABB2B9");
                            page_border_radius("5px");
                            page_link_bg_color("#17202A","#ABB2B9");
                            page_link_font("12px","true","false","false");
                            page_link_color("#FFFFFF");
                            page_echo_pagenums(5,"true","true");
                         ?>
                         </center>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 footer-copyright">
                    © FIXED - All rights reserved
                    <div class="credits">
                        <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bethany
            -->
                        Designed by
                        <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!---->
    <!--contact ends-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        
        var url = new URL(window.location.href);
        var c = url.searchParams.get("type");
        $('#select_type').val(c);

        $('#select_type').change(function(){
            var type = $('#select_type').val();
            window.location.href ='search.php?type='+type+'&page=1';
        })



    </script>
</body>


</html>