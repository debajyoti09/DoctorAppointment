<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Member Page</title>
<script src="<?php echo base_url().'assets/js/ApplicationJS/jquery-1.11.1.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/BootStrapJS/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/BootStrapJS/bootstrap-editable.min.js' ;?>"></script>
<script src="<?php echo base_url().'assets/js/BootStrapJS/bootstrap-multiselect.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/BootStrapJS/bootstrap-timepicker.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/ApplicationJS/main.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/ApplicationJS/view_doctor_degree_career.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/ApplicationJS/view_doctor_chamber.js' ?>"></script>

<link rel="stylesheet" type="text/css"  href="<?php echo base_url().'assets/css/BootstrapCSS/bootstrap.css' ;?>">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url().'assets/css/BootstrapCSS/bootstrap-editable.css' ;?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/BootstrapCSS/bootstrap-multiselect.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/BootstrapCSS/bootstrap-timepicker.min.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/BootstrapCSS/font-awesome.min.css'; ?>">

<script>
    $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    })
</script>

<body>

<div id="container">
    <div style="text-align: center;">
    <h1>Members</h1>
    <p><?php echo 'welcome Dr. '. $doctor_details['doctor_firstname'].' '.$doctor_details['doctor_lastname'];?></p>
    
    <p>
        <a href= '<?php  echo base_url()."logout"?>' style="text-decoration: underline;">logout</a>
        
        
    </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-10">
                <div role="tabpanel">
                   <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_degree" aria-controls="tab_degree" role="tab" data-toggle="tab">Degree</a></li>
                      <li role="presentation"><a href="#tab_carrier" aria-controls="tab_carrier" role="tab" data-toggle="tab">Career</a></li>
                      <li role="presentation"><a href="#tab_chamber" aria-controls="tab_chamber" role="tab" data-toggle="tab">Chamber</a></li>
                      <li role="presentation"><a href="#tab_publication" aria-controls="tab_publication" role="tab" data-toggle="tab">Publication & Achievements</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="tab_degree">
                          <h3><input type="button" class="btn btn-info" data-value="AddDegreeMenu" data-form="add_doctor_degree" onclick="show_hide_Form(this)"  value="Add Degree"/></h3>
                          <div id="AddDegreeMenu" style="display: none; margin-top: 30px;">
                              <form name="add_doctor_degree" id="add_doctor_degree">      
                              <?php
                                      echo validation_errors();
                                      ?>
                                <div class="row">
                                <div class="col-lg-1">Degree:</div>
                                <div class="col-lg-5">
                                    <select class="form-control" name="ddl_doctorDegree" id="ddl_add_doctorDegree" onchange="clear_error_span(this)">
                                        <option value="0">Select</option>
                                          <?php
                                            foreach($degrees_for_dropdown as $row)
                                              echo '<option value="'.$row['degree_id'].'">'.$row['degree_name'].'</option>'; 
                                          ?>
                                      </select>
                                </div>
                                </div>
                                <div class="row">
                                <p/>
                                    <div class="col-lg-1">College:</div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" maxlength="255" name="txt_doctorCollege" id="txt_add_doctorCollege" onkeypress="clear_error_span(this)" />
                                </div>
                                </div>
                                <div class="row">
                                <p/>
                                    <div class="col-lg-1">Batch :</div>
                                <div class="col-lg-5">
                                    <select class="form-control" name="ddl_degree_batch_year" id="ddl_add_degree_batch_year" onchange="clear_error_span(this)">
                                        <option value="0">Select</option>
                                        <?php
                                            foreach($years_for_dropdown as $row)
                                              echo '<option value="'.$row['year'].'">'.$row['year'].'</option>'; 
                                          ?>
                                      </select>
                                </div>
                                </div>
                                <div class="row">
                                <p/>
                                <div class="col-lg-6" style="text-align:right;">
                                    <input type="button" class="btn btn-default" id="btn_add_degree_submit" value="Submit"/>
                                    <input type="button" class="btn btn-default" id="btn_add_degree_cancel" onclick="cancel_AddDegreeForm(this)" value="cancel"/>
                                </div>
                                </div>
                              </form>
                          </div>
                          <div id="div_doctor_degree">
                              <?php
                              if(isset($doctor_degree_details))
                               foreach($doctor_degree_details as $row)
                                echo   '<div id="doctor_degree'.$row['doctor_degree_id'].'" style="margin-top:30px; padding:5px;">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="row">
                                               <div class="col-lg-12">
                                                         <span id="doctor_degree_name'.$row['doctor_degree_id'].'" data-value="'.$row['degree_id'].'" style="font-size: x-large;">' . $row['degree_name'] . '</span>
                                                             <i style="padding-left: 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor_degree_name"  data-info="'.$row['doctor_degree_id'].'" onclick="edit_doctor_degree_name(event,this)"></i>
                                               </div>
                                            </div>
                                            <div class="row" style="padding-top:10px;">
                                                  <div class="col-lg-12">
                                                          <span id="doctor_degree_college'.$row['doctor_degree_id'].'" style="font-size: larger;">' .$row['college_name'] .'</span>
                                                              <i style="padding-left: 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor_degree_college"  data-info="'.$row['doctor_degree_id'].'" onclick="edit_doctor_degree_college(event,this)"></i>
                                                  </div>
                                            </div>
                                            <div class="row"  style="padding-top:10px;">
                                                  <div class="col-lg-12">
                                                          <span id="doctor_degree_batch_year'.$row['doctor_degree_id'].'" data-value="'.$row['batch_year'].'" > ' .$row['batch_year'] . '</span>
                                                          <i style="margin:0px 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor_degree_year"  data-info="'.$row['doctor_degree_id'].'" onclick="edit_doctor_degree_year(event,this)"></i>
                                                              Batch
                                                  </div>
                                            </div>
                                       </div>
                                       <div class="col-lg-3">
                                            <i class="glyphicon glyphicon-edit btn_edit_doctor_degree" data-info="'.$row['doctor_degree_id'].'" style="font-size:larger;cursor: pointer;"></i>&nbsp;&nbsp;
                                            <i class="glyphicon glyphicon-trash btn_delete_doctor_degree" data-info="'.$row['doctor_degree_id'].'" data-target="#doctor_degree'.$row['doctor_degree_id'].'" style="font-size:larger;cursor: pointer;" onclick="delete_doctor_degree(this)"></i>
                                       </div>
                                     </div>     
                                    </div>' ;
                              ?>
                          </div>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="tab_carrier">
                          <h3><input type="button" class="btn btn-info" data-value="AddCareerMenu" data-form="add_doctor_career" data-toggle="modal" data-target="#AddCareerForm" value="Add Career"/></h3>
                          <div id="AddCareerForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" style="text-align: center;">Add Career</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form name="add_doctor_career" id="add_doctor_career">      
                                            <div class="row">
                                                <div class="col-lg-offset-1 col-lg-2">Position:</div>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" maxlength="255" name="txt_doctor_career_position" id="txt_add_doctor_career_Position" oninput="clear_error_span(this)" />
                                                </div>
                                                </div>
                                            <div class="row">
                                                <p/>
                                                    <div class="col-lg-offset-1 col-lg-2">Hospital:</div>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" maxlength="255" name="txt_doctor_career_Hospital" id="txt_add_doctor_career_Hospital" oninput="clear_error_span(this)" />
                                                </div>
                                                </div>
                                            <div class="row">
                                                <p/>
                                                    <div class="col-lg-offset-1 col-lg-2">Year :</div>
                                                <div class="col-lg-3">
                                                    <select class="form-control" name="ddl_career_start_year" id="ddl_add_career_start_year" onchange="clear_error_span(this)">
                                                        <option value="0">Select</option>
                                                        <?php 
                                                            foreach($years_for_dropdown as $row)
                                                              echo '<option value="'.$row['year'].'">'.$row['year'].'</option>'; 
                                                          ?>
                                                      </select>
                                                </div>
                                                    <div class="col-lg-1">To</div>
                                                <div class="col-lg-3">
                                                    <select class="form-control" name="ddl_career_end_year" id="ddl_add_career_end_year" onchange="clear_error_span(this)">
                                                        <option value="0">Select</option>
                                                        <?php 
                                                            foreach($years_for_dropdown as $row)
                                                              echo '<option value="'.$row['year'].'">'.$row['year'].'</option>'; 
                                                          ?>
                                                      </select>
                                                </div>
                                                </div>
                                            <div class="row">
                                                <p/>    
                                                <div class="col-lg-10" style="text-align:right;">
                                                    <input type="button" class="btn btn-primary" data-dismiss="modal" id="btn_add_career_submit" value="Save"/>
                                                    <input type="button" class="btn btn-default" id="btn_add_career_cancel" data-dismiss="modal" onclick="cancel_Form(this)" value="Close"/>
                                                </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div id="div_doctor_career">
                              <?php
                              if(isset($doctor_career_details))
                               foreach($doctor_career_details as $row)
                                echo   '<div id="doctor_career'.$row['doctor_career_id'].'" style="margin-top:30px; padding:5px;" data-hideVisibleClass="edit_doctor">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="row">
                                               <div class="col-lg-12">
                                                         <span id="doctor_career_position'.$row['doctor_career_id'].'"  style="font-size: x-large;">' . $row['career_position'] . '</span>
                                                             <i style="padding-left: 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'.$row['doctor_career_id'].'" onclick="edit_doctor_career_position(event,this)"></i>
                                               </div>
                                            </div>
                                            <div class="row" style="padding-top:10px;">
                                                  <div class="col-lg-12">
                                                          <span id="doctor_career_hospital'.$row['doctor_career_id'].'" style="font-size: larger;">' .$row['career_hospital'] .'</span>
                                                                <i style="padding-left: 20px;cursor:pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'.$row['doctor_career_id'].'" onclick="edit_doctor_career_hospital(event,this)"></i>
                                                  </div>
                                            </div>
                                            <div class="row"  style="padding-top:10px;">
                                                  <div class="col-lg-12">
                                                          <span id="doctor_career_start_year'.$row['doctor_career_id'].'" data-value="'.$row['career_start_year'].'" > ' .$row['career_start_year'] . '</span>
                                                          <i style="margin:0px 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'.$row['doctor_career_id'].'" onclick="edit_doctor_career_start_year(event,this)"></i>
                                                              To
                                                          <span id="doctor_career_end_year'.$row['doctor_career_id'].'" data-value="'.$row['career_end_year'].'" > ' .$row['career_end_year'] . '</span>
                                                          <i style="margin:0px 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'.$row['doctor_career_id'].'" onclick="edit_doctor_career_end_year(event,this)"></i>    
                                                  </div>
                                            </div>
                                       </div>
                                       <div class="col-lg-3">
                                            <i class="glyphicon glyphicon-edit" data-info="'.$row['doctor_career_id'].'" style="font-size:larger;cursor: pointer;"></i>&nbsp;&nbsp;
                                            <i class="glyphicon glyphicon-trash" data-info="'.$row['doctor_career_id'].'" data-target="#doctor_career'.$row['doctor_career_id'].'" style="font-size:larger;cursor: pointer;" onclick="delete_doctor_career(this)"></i>
                                       </div>
                                     </div>     
                                    </div>' ;
                              ?>
                          </div>
                    </div>
                      <div role="tabpanel" class="tab-pane" id="tab_chamber">
                          <?php echo Modules::run('doctor_chamber/ctrl_doctor_chamber/index'); ?>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="tab_publication">
                          <?php echo Modules::run('doctor_publication/ctrl_doctor_publication/index'); ?>
                      </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


















