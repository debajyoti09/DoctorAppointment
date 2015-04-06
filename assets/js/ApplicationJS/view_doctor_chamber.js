$(function(){  
    $("#btn_add_chamber").click(function(e) {
        var object=this;
        var error=0;
        e.preventDefault();
        
        if($('#ddl_chamber_state').val()==='0' && $('#ddl_chamber_state').parent().children('.span_error').length ===0){
                $('#ddl_chamber_state').parent().append("<span class='span_error' style='color:red;'>Please Select state</span>");
                error=error+1;
        }
         if($('#ddl_chamber_City').val()==='0' && $('#ddl_chamber_City').parent().children('.span_error').length ===0){
                $('#ddl_chamber_City').parent().append("<span class='span_error' style='color:red;'>Please Select city</span>");
                error=error+1;
         }
            if($('#txt_doctor_chamber_address').val()==='' && $('#txt_doctor_chamber_address').parent().children('.span_error').length ===0){
                $('#txt_doctor_chamber_address').parent().append("<span class='span_error' style='color:red;'>Please Enter chamber Address</span>");
                error=error+1;
            }
            if($('#txt_chamber_pincode').val()==='' && $('#txt_chamber_pincode').parent().children('.span_error').length ===0){
                $('#txt_chamber_pincode').parent().append("<span class='span_error' style='color:red;'>Please Enter chamber Pincode.</span>");
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
                                                 // view_degree(data);
                                               }
                                             });
                                }
                                else
                                    {
                                        return false;
                                    }
}); 
});



