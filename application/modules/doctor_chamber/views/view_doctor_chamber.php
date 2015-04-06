<h3>
    <input type="button" class="btn btn-info" data-value="AddChamberSettingsForm" data-form="add_doctor_chamber_settings"  value="Add Chamber" data-toggle="modal" data-target="#AddChamberSettingsForm"/> 
    <input type="button" class="btn btn-info" data-value="AddChamberTimingForm" data-form="add_chamber_timing_settings" value="Add Chamber Timing" data-toggle="modal" data-target="#AddChamberTimingForm" /> 
    <input type="button" class="btn btn-info" data-value="" data-form="" onclick="show_hide_Form(this)" value="Add Particular Date Timing"/> 
</h3>

<div class="modal fade" id="AddChamberSettingsForm"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <h4 class="modal-title">Chamber Address</h4>
            </div>
            <div class="modal-body">
                <form name="add_doctor_chamber_settings" id="add_doctor_chamber_settings">
                    <p/>
                    <div class="row">
                            <div class="col-lg-offset-1 col-lg-2">
                                State:
                            </div>
                            <div class="col-lg-6">
                                <?php
                                    echo Modules::run('control_address_city_state_pin/ctrl_control_address_city_state_pin/get_state_master',0); 
                                 ?>
                            </div>
                    </div>
                    <p/>
                    <div class="row">
                            <div class="col-lg-offset-1 col-lg-2">
                                City:
                            </div>
                            <div class="col-lg-6">
                                <?php
                                    
                                    echo Modules::run('control_address_city_state_pin/ctrl_control_address_city_state_pin/get_cities_by_state_Id',0,0); 
                                 ?>
                            </div>
                    </div>
                    <p/>
                    <div class="row">
                            <div class="col-lg-offset-1 col-lg-2">
                                Pin code:
                            </div>
                            <div class="col-lg-6">
                                <?php
                                    
                                    echo Modules::run('control_address_city_state_pin/ctrl_control_address_city_state_pin/get_pinCodes_by_city_Id',0,0); 
                                 ?>
                            </div>
                    </div>
                    <p/>
                    <div class="row">
                        <div class="col-lg-3">
                            Phone Number
                        </div>
                        <div class="col-lg-1">
                            +91-
                        </div>
                        <div class="col-lg-5">
                            <input name="txt_chamber_phoneNumber" maxlength="10"  id="txt_chamber_phoneNumber"  class="form-control" oninput="clear_error_span(this)" /> 
                        </div>
                    </div>
                    <p/>
                    <div class="row">
                        <div class="col-lg-10" style="text-align:right;">
                            <input type="button" class="btn btn-primary" id="btn_add_chamber" value="Save"/>
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Close" onclick="cancel_Form(this)"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="AddChamberTimingForm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Chamber Timing</h4>
                </div>
                <div class="modal-body">
                    <form name="add_doctor_chamber_settings" id="add_chamber_timing_settings">
                        <div class="row">
                            <div class="col-lg-3">
                                Chamber:
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" name="ddl_chamber_address" id="ddl_chamber_address" onchange="clear_error_span(this)"  data-cityDropdown="ddl_chamber_City" >
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
                            <div class="col-lg-3">
                                Week Days:
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" maxlength="255" name="txt_doctor_chamber_address" id="txt_doctor_chamber_address" oninput="clear_error_span(this)" />
                            </div>
                        </div>
                        <p/>
                        <div class="row">
                            <div class="col-lg-3">
                                Opening Time:
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" name="ddl_chamber_state" id="ddl_chamber_state" onchange="bind_city_dropdown(this)"  data-cityDropdown="ddl_chamber_City" >
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
                        <div class="col-lg-3">
                               Closing Time: 
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" name="ddl_chamber_city" id="ddl_chamber_City" onchange="bind_pinCode_dropdown(this)"  data-PinCodeDataList="dl_chamber_pincodes">
                                  <option value="0">--select--</option>
                                </select>
                            </div>
                        </div>
                        <p/>
                        <div class="row">
                            <div class="col-lg-3">
                                No. Of Patients: 
                            </div>
                            <div class="col-lg-6">
                                <input name="txt_chamber_pincode"  id="txt_chamber_pincode"  list="dl_chamber_pincodes"  class="form-control" oninput="clear_error_span(this)"/> 
                                <datalist id="dl_chamber_pincodes"  onselect="clear_error_span(this)">
                                      </datalist>
                            </div>
                        </div>
                        <p/>
                        <div class="row">
                            <div class="col-lg-7">
                                <input type="button" class="btn btn-primary" id="btn_add_chamber" value="Save" />
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Close" onclick="cancel_Form(this)"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>

