$(function(){  
    $("#btn_add_chamber").click(function(e) {
        var object=this;
        var error=0;
        e.preventDefault();
        
        if($('#ddl_state').val()==='0' && $('#ddl_state').parent().children('.span_error').length ===0){
                $('#ddl_state').parent().append("<span class='span_error' style='color:red;'>Please Select state</span>");
                error=error+1;
        }
         if($('#ddl_City').val()==='0' && $('#ddl_City').parent().children('.span_error').length ===0){
                $('#ddl_City').parent().append("<span class='span_error' style='color:red;'>Please Select city</span>");
                error=error+1;
         }
            if($('#txt_doctor_chamber_address').val()==='' && $('#txt_doctor_chamber_address').parent().children('.span_error').length ===0){
                $('#txt_doctor_chamber_address').parent().append("<span class='span_error' style='color:red;'>Please Enter chamber Address</span>");
                error=error+1;
            }
            if($('#txt_pincode').val()==='' && $('#txt_pincode').parent().children('.span_error').length ===0){
                $('#txt_pincode').parent().append("<span class='span_error' style='color:red;'>Please Enter chamber Pincode.</span>");
                error=error+1;
            }
            if($('#txt_chamber_phoneNumber').val()==='' && $('#txt_chamber_phoneNumber').parent().children('.span_error').length ===0){
                $('#txt_chamber_phoneNumber').parent().append("<span class='span_error' style='color:red;'>Please Enter PhoneNumber.</span>");
                error=error+1;
            }
                    
                        if(error===0)
                        {
                                    jQuery.ajax({
                                                type: "POST",
                                                url: "doctor_chamber/ctrl_doctor_chamber/save_doctor_chamber",
                                                data:$('#add_doctor_chamber_settings').serialize(),
                                                success: function(data){
                                                    clear_form_by_id($(object).closest('form').attr('id'));
                                                    alert("Chamber address Saved.Thank You.");
                                                    view_chamber(data);
                                                    console.log(data);
                                               }
                                             });
                                }
                                else
                                    {
                                        return false;
                                    }
}); 
});



function view_chamber(chamber_address){
    $('#AddCareerMenu').css('display','none');
     $.each(JSON.parse(chamber_address), function(key,val) {
                    $('#div_doctor_chamber').append('\
                          <div id="doctor_chamber'+val.doctor_chamber_id+'" style="margin-top:10px; padding:5px;" data-hideVisibleClass="edit_doctor">\n\\n\
                                <h3>Chamber '+(key+1)+'</h3>\n\
                                <div class="row">\n\
                                        <div class="col-lg-5">\n\
                                            <div class="row">\n\
                                               <div class="col-lg-12">\n\
                                                         <span id="doctor_chamber_address'+val.doctor_chamber_id+'">'+val.doctor_chamber_address+'</span>\n\
                                                             <i style="padding-left: 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'+val.doctor_chamber_id+'" onclick="edit_doctor_chamber_address(event,this)"></i>\n\
                                               </div>\n\
                                            </div>\n\
                                            <div class="row" style="padding-top:10px;">\n\
                                                  <div class="col-lg-12">\n\
                                                          <span id="doctor_chamber_phone'+val.doctor_chamber_id+'" style="font-size: larger;">' +val.doctor_chamber_phone+'</span>\n\
                                                                <i style="padding-left: 20px;cursor:pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'+val.doctor_chamber_id+'" onclick="edit_doctor_chamber_phone(event,this)"></i>\n\
                                                  </div>\n\
                                            </div>\n\
                                            <div class="row"  style="padding-top:10px;">\n\
                                            </div>\n\
                                       </div>\n\
                                       <div class="col-lg-3">\n\
                                            <i class="glyphicon glyphicon-edit" data-info="'+val.doctor_chamber_id+'" style="font-size:larger;cursor: pointer;"></i>&nbsp;&nbsp;\n\
                                            <i class="glyphicon glyphicon-trash" data-info="'+val.doctor_chamber_id+'" data-target="#doctor_chamber'+val.doctor_chamber_id+'" style="font-size:larger;cursor: pointer;" onclick="delete_doctor_chamber(this)"></i>\n\
                                       </div>\n\
                                     </div>\n\
                                    </div>') ;
     });
}
