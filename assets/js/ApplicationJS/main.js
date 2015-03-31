
function cancel_Form(Cancel_button_object){
    var form_id=$(Cancel_button_object).closest("form").attr("id");
    clear_form_by_id(form_id);
}

//-------------------------error clear----------------------------------------------------------

function clear_form_by_id(form_id)
{
    $('form#'+form_id+' select').val('0');
    $('form#'+form_id+' .span_error').remove();
    $('form#'+form_id+' input:text').val('');
}


function clear_error_span(object)
{
    if($(object).is("select"))
        if($(object).val()!=='0')
            $(object).parent().children('.span_error').remove();
    
    if($(object).is("input"))
        if($(object).val()!=='')
            $(object).parent().children('.span_error').remove();
}


//------------------------------------ city state pincode Data--------------------------------------------------------

function bind_city_dropdown(object_stateDropdown)
{
   clear_error_span(object_stateDropdown); 
   jQuery.ajax({
           type: "POST",
           url: "control_address_city_state_pin/ctrl_control_address_city_state_pin/get_city_master",
           data:{'state_id':object_stateDropdown.value},
           success: function(data){
               $('#'+$(object_stateDropdown).attr('data-cityDropdown')).empty().append('<option selected="selected" value="0">--select--</option>');//clear city dropdown
               $('#'+$('#'+$(object_stateDropdown).attr('data-cityDropdown')).attr('data-PinCodeDataList')).empty();//clear zipcode datalist
               $('#'+$('#'+$(object_stateDropdown).attr('data-cityDropdown')).attr('data-PinCodeInput')).val('');//clear pincode input
               if(data!="")
               $.each(JSON.parse(data), function(key,val) {
               $('#'+$(object_stateDropdown).attr('data-cityDropdown')).append('<option value="'+val.city_id+'">'+val.city_name+'</option>');//bind City Dropdown
               });
           }
        });
}

function bind_pinCode_dropdown(object_cityDropdown)
{
   clear_error_span(object_cityDropdown);
   jQuery.ajax({
           type: "POST",
           url: "control_address_city_state_pin/ctrl_control_address_city_state_pin/get_pincode_master",
           data:{'city_id':object_cityDropdown.value},
           success: function(data){
               $('#'+$(object_cityDropdown).attr('data-PinCodeInput')).val('');//clear pincode input
               $('#'+$(object_cityDropdown).attr('data-PinCodeDataList')).empty();//clear zipcode datalist
               if(data!="")
               $.each(JSON.parse(data), function(key,val) {
               $('#'+$(object_cityDropdown).attr('data-PinCodeDataList')).append('<option>'+val.pin_code+'</option>');//bind zipcode datalist
               });
           }
        });
}
