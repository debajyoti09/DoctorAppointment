<br/>
<div role="tabpanel">
        <ul class="nav nav-tabs" role="tablist">
           <li role="presentation" class="active"><a href="#tab_chamber_address" aria-controls="tab_chamber_address" role="tab" data-toggle="tab">Add Chamber</a></li>
           <li role="presentation"><a href="#tab_chamber_timing" aria-controls="tab_chamber_timing" role="tab" data-toggle="tab">Add Chamber Timing</a></li>
           <li role="presentation"><a href="#tab_particular_date_settings" aria-controls="tab_particular_date_settings" role="tab" data-toggle="tab">Particular Date Timing</a></li>
         </ul>
         <!-- Tab panes -->
         <div class="tab-content">
           <div role="tabpanel" class="tab-pane active" id="tab_chamber_address">
               <h3>
                   <input type="button" class="btn btn-info" data-value="AddChamberSettingsForm" data-form="add_doctor_chamber_settings"  value="Add Chamber" data-toggle="modal" data-target="#AddChamberSettingsForm"/> 
               </h3>    
               <div id="div_doctor_chamber">
                    <?php
                    if(isset($doctor_chamber_general_setting))
                     foreach($doctor_chamber_general_setting as $row)
                      echo   '<div id="doctor_chamber'.$row['doctor_chamber_id'].'" style="margin-top:30px; padding:5px;" data-hideVisibleClass="edit_doctor">
                          <div class="row">
                              <div class="col-lg-5">
                                  <div class="row">
                                     <div class="col-lg-12">
                                               <span id="doctor_chamber_address'.$row['doctor_chamber_id'].'">' . $row['doctor_chamber_address'] . '</span>
                                                   <i style="padding-left: 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'.$row['doctor_chamber_id'].'" onclick="edit_doctor_chamber_address(event,this)"></i>
                                     </div>
                                  </div>
                                  <div class="row" style="padding-top:10px;">
                                        <div class="col-lg-12">
                                                <span id="doctor_chamber_phone'.$row['doctor_chamber_id'].'" style="font-size: larger;">' .$row['doctor_chamber_phone'] .'</span>
                                                      <i style="padding-left: 20px;cursor:pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'.$row['doctor_chamber_id'].'" onclick="edit_doctor_chamber_phone(event,this)"></i>
                                        </div>
                                  </div>
                                  <div class="row"  style="padding-top:10px;">
                                        <div class="col-lg-12">
                                        </div>
                                  </div>
                             </div>
                             <div class="col-lg-3">
                                  <i class="glyphicon glyphicon-edit" data-info="'.$row['doctor_chamber_id'].'" style="font-size:larger;cursor: pointer;"></i>&nbsp;&nbsp;
                                  <i class="glyphicon glyphicon-trash" data-info="'.$row['doctor_chamber_id'].'" data-target="#doctor_chamber'.$row['doctor_chamber_id'].'" style="font-size:larger;cursor: pointer;" onclick="delete_doctor_chamber(this)"></i>
                             </div>
                           </div>     
                          </div>' ;
                    ?>
                </div>
               <div class="modal fade" id="AddChamberSettingsForm"  tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: center">
                            <h4 class="modal-title">Chamber Address</h4>
                        </div>
                        <div class="modal-body">
                            <form name="add_doctor_chamber_settings" id="add_doctor_chamber_settings">
                                <div class="row">
                                        <div class="col-lg-offset-1 col-lg-3">
                                            Address:
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea name="txt_doctor_chamber_address"  id="txt_doctor_chamber_address"  class="form-control" oninput="clear_error_span(this)" ></textarea> 
                                        </div>
                                </div>
                                <p/>
                                <div class="row">
                                        <div class="col-lg-offset-1 col-lg-3">
                                            State:
                                        </div>
                                        <div class="col-lg-6">
                                            <?php
                                                echo Modules::run('control_address_city_state_pin/ctrl_control_address_city_state_pin/get_state_master',0); //saved_state_id
                                             ?>
                                        </div>
                                </div>
                                <p/>
                                <div class="row">
                                        <div class="col-lg-offset-1 col-lg-3">
                                            City:
                                        </div>
                                        <div class="col-lg-6">
                                            <?php
                                                echo Modules::run('control_address_city_state_pin/ctrl_control_address_city_state_pin/get_cities_by_state_Id',0,0); //saved_city_id,saved_state_id
                                             ?>
                                        </div>
                                </div>
                                <p/>
                                <div class="row">
                                        <div class="col-lg-offset-1 col-lg-3">
                                            Pin code:
                                        </div>
                                        <div class="col-lg-6">
                                            <?php
                                                echo Modules::run('control_address_city_state_pin/ctrl_control_address_city_state_pin/get_pinCodes_by_city_Id',0,0); //saved_pinCode,saved_city_id
                                             ?>
                                        </div>
                                </div>
                                <p/>
                                <div class="row">
                                    <div class="col-lg-offset-1 col-lg-3">
                                        Ph Number
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
                                        <input type="button" class="btn btn-primary" data-dismiss="modal" id="btn_add_chamber" value="Save"/>
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Close" onclick="cancel_Form(this)"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           </div>
           <div role="tabpanel" class="tab-pane" id="tab_chamber_timing">
               <h3>
                   <input type="button" class="btn btn-info" data-value="AddChamberTimingForm" data-form="add_chamber_timing_settings" value="Add Chamber Timing" data-toggle="modal" data-target="#AddChamberTimingForm" /> 
               </h3>
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
           </div>
           <div role="tabpanel" class="tab-pane" id="tab_particular_date_settings">
               <h3>
                   <input type="button" class="btn btn-info" data-value="" data-form="" onclick="show_hide_Form(this)" value="Add Particular Date Timing"/> 
               </h3>
           </div>  
         </div>
</div>




