<?php
	require'class.php';
	$obj = new Dataphp();
	$tpye1 = $obj->review(1);
	$tpye2 = $obj->review(2);
	$tpye3 = $obj->review(3);
	$tpye4 = $obj->review(4);
	$tpye5 = $obj->review(5);
	$tpye6 = $obj->review(6);
	
?>
		<div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port01.jpg" alt="" class="img-responsive"> ประเภทช่าง : ไฟฟ้า
              <br> คะแนนเรทติ้ง : <?php echo number_format( $obj->avg_star($tpye1['Worker_ID']), 1, '.', ''); ?>/5
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port02.jpg" alt="" class="img-responsive"> ประเภทช่าง : ประปา
              <br> คะแนนเรทติ้ง : <?php echo number_format( $obj->avg_star($tpye2['Worker_ID']), 1, '.', ''); ?>/5
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port03.jpg" alt="" class="img-responsive"> ประเภทช่าง : ก่อสร้าง
              <br> คะแนนเรทติ้ง : <?php echo number_format( $obj->avg_star($tpye3['Worker_ID']), 1, '.', ''); ?>/5
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port04.jpg" alt="" class="img-responsive"> ประเภทช่าง : ยานพาหนะ
              <br> คะแนนเรทติ้ง : <?php echo number_format( $obj->avg_star($tpye4['Worker_ID']), 1, '.', ''); ?>/5
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port05.jpg" alt="" class="img-responsive"> ประเภทช่าง : สื่อสาร
              <br> คะแนนเรทติ้ง : <?php echo number_format( $obj->avg_star($tpye5['Worker_ID']), 1, '.', ''); ?>/5
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port06.jpg" alt="" class="img-responsive"> ประเภทช่าง : อิเล็คทรอนิกส์
              <br> คะแนนเรทติ้ง : <?php echo number_format( $obj->avg_star($tpye6['Worker_ID']), 1, '.', ''); ?>/5
            </div>
          </div>