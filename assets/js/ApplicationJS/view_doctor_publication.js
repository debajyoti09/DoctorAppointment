/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*----------------------------doctor publication script-------------------------*/
$(function() {
    $("#btn_add_publication_submit").click(function(e) {
        var object = this;
        e.preventDefault();
        if ($('#txt_add_doctor_publication_name').val() === '' && $('#txt_add_doctor_publication_name').parent().children('.span_error').length === 0)
            $('#txt_add_doctor_publication_name').parent().append("<span class='span_error' style='color:red;'>Please Enter Title.</span>");

        if ($('#txt_add_doctor_publication_details').val() === '' && $('#txt_add_doctor_publication_details').parent().children('.span_error').length === 0)
            $('#txt_add_doctor_publication_details').parent().append("<span class='span_error' style='color:red;'>Please Enter Publication Details.</span>");

        if ($('#txt_add_doctor_publication_certified_from').val() === '' && $('#txt_add_doctor_publication_certified_from').parent().children('.span_error').length === 0)
            $('#txt_add_doctor_publication_date').parent().append("<span class='span_error' style='color:red;'>Please Enter Institute Name.</span>");

        if ($('#txt_add_doctor_publication_date').val() === '' && $('#txt_add_doctor_publication_date').parent().children('.span_error').length === 0)
            $('#txt_add_doctor_publication_date').parent().append("<span class='span_error' style='color:red;'>Please Enter Publication Year.</span>");


        if ($('#txt_add_doctor_publication_name').val() !== '' && $('#txt_add_doctor_publication_details').val() !== '' && $('#txt_add_doctor_publication_date').val() !== '' && $('#txt_add_doctor_publication_date').val() !== '')
        {
            jQuery.ajax({
                type: "POST",
                url: "doctor_publication/set_get_doctor_publication/set_doctor_publication",
                data: $('#add_doctor_publication').serialize(),
                success: function(data) {
                    cancel_Form(object);
                    view_publication(data);
                }
            });
        }
    });
});


function view_publication(doctor_publication_data)
{
    $('#AddPublicationMenu').css('display', 'none');
    $.each(JSON.parse(doctor_publication_data), function(key, val) {
        $('#div_doctor_publication').append('\
                          <div id="doctor_publication' + val.dt_publication_id + '" style="margin-top:30px; padding:5px;" data-hideVisibleClass="edit_doctor">\n\
                                <div class="row">\n\
                                        <div class="col-lg-5">\n\
                                            <div class="row">\n\
                                               <div class="col-lg-12">\n\
                                                         <span id="doctor_publication_name' + val.dt_publication_id + '"  style="font-size: x-large;">' + val.publication_name + '</span>\n\
                                                             <i style="padding-left: 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor" data-name="publication_name" data-info="' + val.dt_publication_id + '" onclick="edit_doctor_publication(event,this)"></i>\n\
                                               </div>\n\
                                            </div>\n\
                                            <div class="row" style="padding-top:10px;">\n\
                                                  <div class="col-lg-12">\n\
                                                          <span id="doctor_publication_details' + val.dt_publication_id + '" style="font-size: larger;">' + val.publication_details + '</span>\n\
                                                                <i style="padding-left: 20px;cursor:pointer;" class="glyphicon glyphicon-pencil edit_doctor" data-name="publication_details" data-info="' + val.dt_publication_id + '" onclick="edit_doctor_publication(event,this)"></i>\n\
                                                  </div>\n\
                                            </div>\n\\n\
                                            <div class="row" style="padding-top:10px;">\n\
                                                  <div class="col-lg-12">\n\
                                                          <span id="doctor_certification' + val.dt_publication_id + '" style="font-size: larger;">' + val.certification + '</span>\n\
                                                                <i style="padding-left: 20px;cursor:pointer;" class="glyphicon glyphicon-pencil edit_doctor" data-info="' + val.dt_publication_id + '" onclick="edit_doctor_publication(event,this)"></i>\n\
                                                  </div>\n\
                                            </div>\n\
                                            <div class="row" style="padding-top:10px;">\n\
                                                  <div class="col-lg-12">\n\
                                                          <span id="doctor_publication_date' + val.dt_publication_id + '" style="font-size: larger;">' + val.publication_date + '</span>\n\
                                                                <i style="padding-left: 20px;cursor:pointer;" class="glyphicon glyphicon-pencil edit_doctor" data-name="publication_date"  data-info="' + val.dt_publication_id + '" onclick="edit_doctor_publication(event,this)"></i>\n\
                                                  </div>\n\
                                            </div>\n\
                                       </div>\n\
                                       <div class="col-lg-3">\n\
                                            <i class="glyphicon glyphicon-edit" data-info="' + val.dt_publication_id + '" style="font-size:larger;cursor: pointer;"></i>&nbsp;&nbsp;\n\
                                            <i class="glyphicon glyphicon-trash" data-info="' + val.dt_publication_id + '" data-target="#doctor_publication' + val.dt_publication_id + '" style="font-size:larger;cursor: pointer;" onclick="delete_doctor_publication(this)"></i>\n\
                                       </div>\n\
                                     </div>\n\
                                    </div>');
    });
}



function delete_doctor_publication(object)
{
    jQuery.ajax({
        type: "POST",
        url: "doctor_publication/set_get_doctor_publication/delete_doctor_publication",
        data: {'dt_publication_id': $(object).attr('data-info')},
        success: function() {
            $($(object).attr('data-target')).remove();
        }

    });
}


function edit_doctor_publication(event, object)
{
    event.stopPropagation();
    data = new Array;
//    console.log(JSON.stringify(data));
    var p = $(object).prev();
    $(p).editable({
        toggle: 'manual',
        pk:$(object).attr('data-info'),//have to pass this variable (primary key)
        params: {'column_name':$(object).attr('data-name')},
        url: 'doctor_publication/set_get_doctor_publication/update_doctor_publication',
        type: 'text',
        title: 'Enter Position',
        validate: function(value) {
            if ($.trim(value) == '') {
                return 'The content can not be blank!';
            }
        },
        success: function(data) {
            console.log(data);
        }
    });
    $(p).editable('toggle');
}


