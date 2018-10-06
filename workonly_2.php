        <label>
          <b>รายละเอียดงานที่รับ</b>
        </label>
        <div class="col-md-12">
        <select name="type_work" class ="form-control" required>
          <option value="1">ไฟฟ้า</option>
          <option value="2">ประปา</option>
          <option value="3">ก่อสร้าง</option>
          <option value="4">ยานพาหนะ</option>
          <option value="5">สื่อสาร</option>
          <option value="6">อิเล็คทรอนิกส์</option>
        </select>
        </div>
   
        <label >
            <b>อธิบายงานที่รับทำ</b>
          </label>
        <div class="col-md-12">
          <textarea class="form-control" name="extention" rows="5" required></textarea>
        </div>
        <br>
        <label>
      TechnicLocation
        </label>
        <div id="map-canvas" style="width: 100%; height: 100%"></div>
        <input required type="text" class="form-control" name="technicLocation" id="form_date" placeholder="TechnicLocation "
            /> 