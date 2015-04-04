<h3><input type="button" class="btn btn-info" data-value="AddPublicationMenu" data-form="add_doctor_publication" data-toggle="modal" data-target="#AddPublicationForm" value="Add Publication"/></h3>
<div id="AddPublicationForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;">Add Publication</h4>
            </div>
            <div class="modal-body">
                <form name="add_doctor_publication" id="add_doctor_publication">      
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-2">Publication Title:</div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" maxlength="255" name="txt_doctor_publication_name" id="txt_add_doctor_publication_name" onkeypress="clear_error_span(this)" />
                        </div>
                    </div>
                    <div class="row">
                        <p/>
                        <div class="col-lg-offset-1 col-lg-2">Publication Details:</div>
                        <div class="col-lg-7">
                            <textarea class="form-control" maxlength="255" name="txt_doctor_publication_details" id="txt_add_doctor_publication_details" onkeypress="clear_error_span(this)"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <p/>
                        <div class="col-lg-offset-1 col-lg-2">Certified From:</div>
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
                        <div class="col-lg-offset-1 col-lg-2">Publication Date:</div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" maxlength="255" name="txt_doctor_publication_date" id="txt_add_doctor_publication_date" onkeypress="clear_error_span(this)" />
                        </div>
                    </div>
                    <div class="row">
                        <p/>    
                        <div class="col-lg-10" style="text-align:right;">
                            <input type="button" class="btn btn-primary" id="btn_add_publication_submit" data-dimiss="modal" value="Save"/>
                            <input type="button" class="btn btn-default" id="btn_add_publication_cancel" data-dismiss="modal" onclick="cancel_Form(this)" value="Close"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="div_doctor_publication"></div>
<?php 
if(isset($doctor_publication)) 
{
    echo '<pre>';
    print_r($doctor_publication);
    echo '</pre>';
}
?>