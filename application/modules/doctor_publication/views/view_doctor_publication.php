<h3><input type="button" class="btn btn-info" data-value="AddPublicationMenu" data-form="add_doctor_publication" data-toggle="modal" data-target="#AddPublicationForm" value="Add Publication"/></h3>
<div id="AddPublicationForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;">Add Publication</h4>
            </div>
            <?php if(isset($years_for_dropdown)){
                                
                            ?>
            <div class="modal-body">
                <form name="add_doctor_publication" id="add_doctor_publication">      
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-2">Title:</div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" maxlength="255" name="txt_doctor_publication_name" id="txt_add_doctor_publication_name" onkeypress="clear_error_span(this)" />
                        </div>
                    </div>
                    <div class="row">
                        <p/>
                        <div class="col-lg-offset-1 col-lg-2">Details:</div>
                        <div class="col-lg-7">
                            <textarea class="form-control" maxlength="255" name="txt_doctor_publication_details" id="txt_add_doctor_publication_details" onkeypress="clear_error_span(this)"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <p/>
                        <div class="col-lg-offset-1 col-lg-2">Certification:</div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" maxlength="255" name="txt_doctor_publication_certified_from" id="txt_add_doctor_publication_certified_from" onkeypress="clear_error_span(this)" />
                        </div>
                    </div>
                    <div class="row">
                        <p/>
                        <div class="col-lg-offset-1 col-lg-2">Reference URL:</div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" maxlength="255" name="txt_doctor_publication_url" id="txt_add_doctor_publication_url" onkeypress="clear_error_span(this)" />
                        </div>
                    </div>
                    <div class="row">
                        <p/>
                        <div class="col-lg-offset-1 col-lg-2">Publication Year:</div>
                        <div class="col-lg-7">
                            <input type="text" list="yearList" class="form-control" maxlength="255" name="txt_doctor_publication_date" id="txt_add_doctor_publication_date" onkeypress="clear_error_span(this)" />
                            <datalist id="yearList">
                            <?php 
                                                        foreach ($years_for_dropdown as $key) {
                                                            echo '<option value="'.$key['year'].'">'.$row['year'].'</option>';
                                                        }
                            ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="row">
                        <p/>    
                        <div class="col-lg-10" style="text-align:right;">
                            <input type="button" class="btn btn-primary" id="btn_add_publication_submit" data-dismiss="modal" value="Save"/>
                            <input type="button" class="btn btn-default" id="btn_add_publication_cancel" data-dismiss="modal" onclick="cancel_Form(this)" value="Close"/>
                        </div>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div id="div_doctor_publication">
<?php
                              if(isset($doctor_publication))
                               foreach($doctor_publication as $row)
                                echo  '<div id="doctor_publication'.$row['dt_publication_id'].'" style="margin-top:30px; padding:5px;">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="row">
                                               <div class="col-lg-12">
                                                         <span id="doctor_publication_name'.$row['dt_publication_id'].'" style="font-size: x-large;">' . $row['publication_name'] . '</span>
                                                             <i style="padding-left: 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor_publication_name" data-name="publication_name"  data-info="'.$row['dt_publication_id'].'" onclick="edit_doctor_publication(event,this)"></i>
                                               </div>
                                            </div>
                                            <div class="row" style="padding-top:10px;">
                                                  <div class="col-lg-12">
                                                          <span id="doctor_publication_details'.$row['dt_publication_id'].'" style="font-size: larger;">' .$row['publication_details'] .'</span>
                                                              <i style="padding-left: 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor_publication_details" data-name="publication_details"  data-info="'.$row['dt_publication_id'].'" onclick="edit_doctor_publication(event,this)"></i>
                                                  </div>
                                            </div>
                                            <div class="row"  style="padding-top:10px;">
                                                  <div class="col-lg-12">
                                                          <span id="doctor_certification'.$row['dt_publication_id'].'" > ' .$row['certification'] . '</span>
                                                          <i style="margin:0px 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor_certification" data-name="certification"  data-info="'.$row['dt_publication_id'].'" onclick="edit_doctor_publication(event,this)"></i>
                                                  </div>
                                            </div>
                                            <div class="row"  style="padding-top:10px;">
                                                  <div class="col-lg-12">
                                                          <span id="doctor_publish_date'.$row['dt_publication_id'].'" > ' .$row['publication_date'] . '</span>
                                                          <i style="margin:0px 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor_publication_date" data-name="publication_date"  data-info="'.$row['dt_publication_id'].'" onclick="edit_doctor_publication(event,this)"></i>
                                                  </div>
                                            </div>
                                       </div>
                                       <div class="col-lg-3">
                                            <i class="glyphicon glyphicon-edit btn_edit_doctor_publication" data-info="'.$row['dt_publication_id'].'" style="font-size:larger;cursor: pointer;"></i>&nbsp;&nbsp;
                                            <i class="glyphicon glyphicon-trash btn_delete_doctor_publication" data-info="'.$row['dt_publication_id'].'" data-target="#doctor_publication'.$row['dt_publication_id'].'" style="font-size:larger;cursor: pointer;" onclick="delete_doctor_publication(this)"></i>
                                       </div>
                                     </div>     
                                    </div>' ;
                              ?>
                          </div>