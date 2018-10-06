<?php
	require'../../class.php';
    session_start();

    $id = $_SESSION['id_show'];

	$obj = new Dataphp();
	$obj->workerinformation($id);

	$data = mysqli_fetch_assoc($obj->workerinformation);

?>

<div class="col-md-4 col-xs-12">
    <div class="white-box">
        <div class="user-bg">
            <img width="100%" alt="user" src="../plugins/images/large/img1.jpg">
            <div class="overlay-box">
                <div class="user-content">
                    <a href="javascript:void(0)">
                        <img src="../plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img">
                    </a>
                    <h4 class="text-white"><?php echo $data['Fname']." ".$data['Lname']; ?></h4>
                    <h5 class="text-white"><?php echo $data['Email']; ?></h5>
                </div>
            </div>
        </div>

    </div>
    <a class="btn btn-success" href="edit_profile.html">แก้ไขข้อมูล</a>
    <button class="btn btn-danger"  onclick="delete_worker()">ปิดบัญชี</button>
</div>
<div class="col-md-8 col-xs-12">
    <div class="white-box">
        <form class="form-horizontal form-material">
            <div class="form-group">
                <label class="col-md-12">สถานะการทำงาน</label>
                <div class="col-md-12">
                    <input type="text" placeholder="พร้อมทำงาน" disabled class="form-control form-control-line"> </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">ชื่อเต็ม</label>
                <div class="col-md-12">
                    <input type="text" placeholder="<?php echo $data['Fname']." ".$data['Lname']; ?>" disabled class="form-control form-control-line"> </div>
            </div>
            <div class="form-group">
                <label for="example-email" class="col-md-12">อีเมลล์</label>
                <div class="col-md-12">
                    <input type="email" placeholder="<?php echo $data['Email']; ?>" disabled class="form-control form-control-line" name="example-email"
                                            id="example-email"> </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">เบอร์โทร</label>
                <div class="col-md-12">
                    <input type="text" placeholder="<?php echo $data['Phone']; ?>" disabled class="form-control form-control-line"> </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">ที่อยู่</label>
                <div class="col-md-12">
                    <input type="text" placeholder="<?php echo $data['Address']; ?>" disabled class="form-control form-control-line"> </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">รวมรายได้ทั้งหมด</label>
                <div class="col-md-12">
                    <input type="text" placeholder="5,000" disabled class="form-control form-control-line"> </div>
            </div>
        </form>
    </div>
</div>