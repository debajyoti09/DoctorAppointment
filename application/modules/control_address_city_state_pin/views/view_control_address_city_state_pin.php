<div class="row">
    <div class="col-lg-offset-1 col-lg-3">
        Address:
    </div>
    <div class="col-lg-6">
        <input type="text" class="form-control" maxlength="255" name="txt_address" id="txt_address" oninput="clear_error_span(this)" />
    </div>
</div>
<p/>
<div class="row">
    <div class="col-lg-offset-1 col-lg-3">
        State:
    </div>
    <div class="col-lg-6">
        <select class="form-control" name="ddl_state" id="ddl_state" onchange="bind_city_dropdown(this)"  data-cityDropdown="ddl_City" >
            <option value="0">--select--</option>
            <?php
            foreach($states_for_dropdown as $row)
                echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>'; 
                  ?>
        </select>
    </div>
</div>
<p/>
<div class="row">
<div class="col-lg-offset-1 col-lg-3">
        City:
    </div>
    <div class="col-lg-6">
        <select class="form-control" name="ddl_city" id="ddl_City" onchange="bind_pinCode_dropdown(this)"  data-PinCodeDataList="dl_pincodes">
          <option value="0">--select--</option>
        </select>
    </div>
</div>
<p/>
<div class="row">
    <div class="col-lg-offset-1 col-lg-3">
        Pin Code: 
    </div>
    <div class="col-lg-6">
        <input name="txt_pincode"  id="txt_pincode"  list="dl_pincodes"  class="form-control" oninput="clear_error_span(this)"/> 
        <datalist id="dl_pincodes"  onselect="clear_error_span(this)">
              </datalist>
    </div>
</div>
        