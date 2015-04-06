$(document).ready(function() {
    $.fn.editable.defaults.mode = 'popup';     
});

function visible_edit_option(object)
{
       var hideVisibleClass='.'+$(object).attr("data-hideVisibleClass");
    
        $("#"+$(object).attr("id")).find(hideVisibleClass).show(400);
}

function hide_edit_option(object)
{
    var hideVisibleClass='.'+$(object).attr("data-hideVisibleClass");
    
    $("#"+$(object).attr("id")).find(hideVisibleClass).hide(400);
}

//-------------------------------------------------------------Doctor Degree Script------------------------------------------

function show_hide_Form(object)
   {
    if($('#'+$(object).attr('data-value')).css('display')==='none')
           $('#'+$(object).attr('data-value')).css("display","block");
       else
           {
               clear_form_by_id($(object).attr('data-form'));
               $('#'+$(object).attr('data-value')).css("display","none");
           }
   }
   
function cancel_AddDegreeForm(cancel_button_object)
   {
       var form_id=$(cancel_button_object).closest("form").attr("id");
       clear_form_by_id(form_id);
       if($('#AddDegreeMenu').css('display')==='block')
       $('#AddDegreeMenu').css("display","none");
   }

$(function(){  
    $("#btn_add_degree_submit").click(function(e) {
        var object=this;
        e.preventDefault();
        
        if($('#ddl_add_doctorDegree').val()==='0' && $('#ddl_add_doctorDegree').parent().children('.span_error').length ===0)
                $('#ddl_add_doctorDegree').parent().append("<span class='span_error' style='color:red;'>Please Select degree</span>");
            
            if($('#txt_add_doctorCollege').val()==='' && $('#txt_add_doctorCollege').parent().children('.span_error').length ===0)
                $('#txt_add_doctorCollege').parent().append("<span class='span_error' style='color:red;'>Please Select Year</span>");
            
            if($('#ddl_add_degree_batch_year').val()==='0' && $('#ddl_add_degree_batch_year').parent().children('.span_error').length ===0)
                        $('#ddl_add_degree_batch_year').parent().append("<span class='span_error' style='color:red;'>Please Select Year</span>");
                    
                        if($('#ddl_add_doctorDegree').val()!=='0' && $('#txt_add_doctorCollege').val()!=='' && $('#ddl_add_degree_batch_year').val()!=='0')
                        {
                                    jQuery.ajax({
                                                type: "POST",
                                                url: "set_get_doctor_data/set_doctor_degree",
                                                data:$('#add_doctor_degree').serialize(),
                                                success: function(data){
                                                    clear_form_by_id($(object).closest('form').attr('id'));
                                                  view_degree(data);
                                               }
                                             });
                                }
}); 
});

function view_degree(doctor_degree_data)
{
    $('#AddDegreeMenu').css('display','none');
     $.each(JSON.parse(doctor_degree_data), function(key,val) {
                                $('#div_doctor_degree').append('\
                                    <div id="doctor_degree'+val.doctor_degree_id+'" style="margin-top:30px; padding:5px;">\n\
                                        <div class="row">\n\
                                            <div class="col-lg-5">\n\
                                                <div class="row">\n\
                                                    <div class="col-lg-12">\n\
                                                    <span id="doctor_degree_name'+val.doctor_degree_id+'" data-value="'+val.degree_id+'" style="font-size: x-large;">' + val.degree_name+'</span>\n\
                                                    <i style="padding-left: 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor_degree_name"  data-info="'+val.doctor_degree_id+'" onclick="edit_doctor_degree_name(event,this)" ></i>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <div class="row" style="padding-top:10px;">\n\
                                                    <div class="col-lg-12">\n\
                                                    <span id="doctor_degree_college'+val.doctor_degree_id+'" style="font-size: larger;">'+val.college_name+'</span>\n\
                                                    <i style="padding-left: 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor_degree_college"  data-info="'+val.doctor_degree_id+'" onclick="edit_doctor_degree_college(event,this)"></i>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <div class="row"  style="padding-top:10px;">\n\
                                                    <div class="col-lg-12">\n\
                                                          <span id="doctor_degree_batch_year'+val.doctor_degree_id+'" data-value="'+val.batch_year+'" > ' +val.batch_year+ '</span>\n\
                                                          <i style="margin:0px 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor_degree_year"  data-info="'+val.doctor_degree_id+'" onclick="edit_doctor_degree_year(event,this)"></i>\n\
                                                          Batch\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="col-lg-3">\n\
                                                <i class="glyphicon glyphicon-edit btn_edit_doctor_degree" data-info="'+val.doctor_degree_id+'" style="font-size:larger;cursor: pointer;"></i>&nbsp;&nbsp;\n\
                                                <i class="glyphicon glyphicon-trash btn_delete_doctor_degree" data-info="'+val.doctor_degree_id+'" data-target="#doctor_degree'+val.doctor_degree_id+'" style="font-size:larger;cursor: pointer;" onclick="delete_doctor_degree(this)"></i>\n\
                                            </div>\n\
                                        </div>\n\
                               </div>' );                      
                 });
}

function edit_doctor_degree_name(event,object)
{
    event.stopPropagation();
    data = $(object).attr('data-info');
    var p ='#doctor_degree_name'+data;
    $(p).editable( {
        toggle:'manual',
        pk:data,
        url:'set_get_doctor_data/update_doctor_degree_name',
        type:'select',
        source:'ctrl_get_fixed_data/get_degree_for_edit_dropdown',
        title:'Enter Degree',
        validate: function(value) {
          if($.trim(value) == '') {
            return 'The content can not be blank!';
          }
        },
                success:function(response){
                }
      });
      $(p).editable('toggle');  
}

function edit_doctor_degree_college(event,object)
{
    event.stopPropagation();
    data = $(object).attr('data-info');
    var p ='#doctor_degree_college'+data;
   $(p).editable( {
        toggle:'manual',
        pk:data,
        url:'set_get_doctor_data/update_doctor_degree_college',
        type:'text',
        title:'Enter College',
        validate: function(value) {
          if($.trim(value) == '') {
            return 'The content can not be blank!';
          }
        },
                success:function(response){
                }
      });    
    $(p).editable('toggle');
}


function edit_doctor_degree_year(event,object)
{
    event.stopPropagation();
    data = $(object).attr('data-info');
   var title='Enter Batch Year' ;
   var p ='#doctor_degree_batch_year'+data;
    
   $(p).editable( {
        toggle:'manual',
        pk:data,
        url:'set_get_doctor_data/update_doctor_degree_batch_year',
        type:'select',
        title:title,
        source:'ctrl_get_fixed_data/get_year_for_edit_dropdown',
        validate: function(value) {
          if($.trim(value) === '') {
            return "The content can not be blank!";
          }
        },
                success:function(response){
                }
      });    
    $(p).editable('toggle');
}


function delete_doctor_degree(object)
{
    jQuery.ajax({
           type: "POST",
           url: "set_get_doctor_data/delete_doctor_degree",
           data:{'doctor_degree_id':$(object).attr('data-info')},
           success: function(){
             $($(object).attr('data-target')).remove();
       }

        });
}

//------------------------------------------------------------Doctor Career Script-----------------------------------------------



//function cancel_AddCareerForm(Cancel_button_object)
//{
//    var form_id=$(Cancel_button_object).closest("form").attr("id");
//    clear_form_by_id(form_id);
//}

$(function(){  
    $("#btn_add_career_submit").click(function(e) {
        var object=this;
        e.preventDefault();
        if($('#txt_add_doctor_career_Position').val()==='' && $('#txt_add_doctor_career_Position').parent().children('.span_error').length ===0)
                $('#txt_add_doctor_career_Position').parent().append("<span class='span_error' style='color:red;'>Please Enter Position.</span>");
            
            if($('#txt_add_doctor_career_Hospital').val()==='' && $('#txt_add_doctor_career_Hospital').parent().children('.span_error').length ===0)
                $('#txt_add_doctor_career_Hospital').parent().append("<span class='span_error' style='color:red;'>Please Enter Hospital.</span>");
            
            if($('#ddl_add_career_start_year').val()==='0' && $('#ddl_add_career_start_year').parent().children('.span_error').length ===0)
                        $('#ddl_add_career_start_year').parent().append("<span class='span_error' style='color:red;'>Please Select Start Year.</span>");
                    
               if($('#ddl_add_career_end_year').val()==='0' && $('#ddl_add_career_end_year').parent().children('.span_error').length ===0)
                        $('#ddl_add_career_end_year').parent().append("<span class='span_error' style='color:red;'>Please Select End Year.</span>");
                    
                    
                        if($('#txt_add_doctor_career_Position').val()!=='' && $('#txt_add_doctor_career_Hospital').val()!=='' && $('#ddl_add_career_start_year').val()!=='0' && $('#ddl_add_career_end_year').val()!=='0')
                        {
                                    jQuery.ajax({
                                                type: "POST",
                                                url: "set_get_doctor_data/set_doctor_career",
                                                data:$('#add_doctor_career').serialize(),
                                                success: function(data){
                                                    cancel_AddCareerForm(object);
                                                  view_career(data);
                                               }
                                             });
                                }
}); 
});


function view_career(doctor_career_data)
{
    $('#AddCareerMenu').css('display','none');
     $.each(JSON.parse(doctor_career_data), function(key,val) {
                    $('#div_doctor_career').append('\
                          <div id="doctor_career'+val.doctor_career_id+'" style="margin-top:30px; padding:5px;" data-hideVisibleClass="edit_doctor">\n\
                                <div class="row">\n\
                                        <div class="col-lg-5">\n\
                                            <div class="row">\n\
                                               <div class="col-lg-12">\n\
                                                         <span id="doctor_career_position'+val.doctor_career_id+'"  style="font-size: x-large;">'+val.career_position+'</span>\n\
                                                             <i style="padding-left: 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'+val.doctor_career_id+'" onclick="edit_doctor_career_position(event,this)"></i>\n\
                                               </div>\n\
                                            </div>\n\
                                            <div class="row" style="padding-top:10px;">\n\
                                                  <div class="col-lg-12">\n\
                                                          <span id="doctor_career_hospital'+val.doctor_career_id+'" style="font-size: larger;">' +val.career_hospital+'</span>\n\
                                                                <i style="padding-left: 20px;cursor:pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'+val.doctor_career_id+'" onclick="edit_doctor_career_hospital(event,this)"></i>\n\
                                                  </div>\n\
                                            </div>\n\
                                            <div class="row"  style="padding-top:10px;">\n\
                                                  <div class="col-lg-12">\n\
                                                          <span id="doctor_career_start_year'+val.doctor_career_id+'" data-value="'+val.career_start_year+'" >'+val.career_start_year+'</span>\n\
                                                          <i style="margin:0px 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'+val.doctor_career_id+'" onclick="edit_doctor_career_start_year(event,this)"></i>\n\
                                                              To\n\
                                                          <span id="doctor_career_end_year'+val.doctor_career_id+'" data-value="'+val.career_end_year+'" > ' +val.career_end_year+ '</span>\n\
                                                          <i style="margin:0px 20px;cursor: pointer;" class="glyphicon glyphicon-pencil edit_doctor"  data-info="'+val.doctor_career_id+'" onclick="edit_doctor_career_end_year(event,this)"></i>\n\
                                                  </div>\n\
                                            </div>\n\
                                       </div>\n\
                                       <div class="col-lg-3">\n\
                                            <i class="glyphicon glyphicon-edit" data-info="'+val.doctor_career_id+'" style="font-size:larger;cursor: pointer;"></i>&nbsp;&nbsp;\n\
                                            <i class="glyphicon glyphicon-trash" data-info="'+val.doctor_career_id+'" data-target="#doctor_career'+val.doctor_career_id+'" style="font-size:larger;cursor: pointer;" onclick="delete_doctor_career(this)"></i>\n\
                                       </div>\n\
                                     </div>\n\
                                    </div>') ;
     });
}



function delete_doctor_career(object)
{
     jQuery.ajax({
           type: "POST",
           url: "set_get_doctor_data/delete_doctor_career",
           data:{'doctor_career_id':$(object).attr('data-info')},
           success: function(){
             $($(object).attr('data-target')).remove();
       }

        });
}


function edit_doctor_career_position(event,object)
{
     event.stopPropagation();
    data = $(object).attr('data-info');
    var p ='#doctor_career_position'+data;
   $(p).editable( {
        toggle:'manual',
        pk:data,
        url:'set_get_doctor_data/update_doctor_career_position',
        type:'text',
        title:'Enter Position',
        validate: function(value) {
          if($.trim(value) == '') {
            return 'The content can not be blank!';
          }
        },
                success:function(response){
                }
      });    
    $(p).editable('toggle');
}




function edit_doctor_career_hospital(event,object)
{
    event.stopPropagation();
    data = $(object).attr('data-info');
    var p ='#doctor_career_hospital'+data;
   $(p).editable( {
        toggle:'manual',
        pk:data,
        url:'set_get_doctor_data/update_doctor_career_hospital',
        type:'text',
        title:'Enter Hospital Name',
        validate: function(value) {
          if($.trim(value) == '') {
            return 'The content can not be blank!';
          }
        },
                success:function(response){
            
                }
      });    
    $(p).editable('toggle');
}



function edit_doctor_career_start_year(event,object)
{
    event.stopPropagation();
    data = $(object).attr('data-info');
   var title='Enter start Year' ;
   var p ='#doctor_career_start_year'+data;
    
   $(p).editable( {
        toggle:'manual',
        pk:data,
        url:'set_get_doctor_data/update_doctor_career_start_year',
        type:'select',
        title:title,
        source:'ctrl_get_fixed_data/get_year_for_edit_dropdown',
        validate: function(value) {
          if($.trim(value) === '') {
            return "The content can not be blank!";
          }
        },
                success:function(response){
                }
      });    
    $(p).editable('toggle');
}


function edit_doctor_career_end_year(event,object)
{
    event.stopPropagation();
    data = $(object).attr('data-info');
   var title='Enter End Year' ;
   var p ='#doctor_career_end_year'+data;    
   $(p).editable( {
        toggle:'manual',
        pk:data,
        url:'set_get_doctor_data/update_doctor_career_end_year',
        type:'select',
        title:title,
        source:'ctrl_get_fixed_data/get_year_for_edit_dropdown',
        validate: function(value) {
          if($.trim(value) === '') {
            return "The content can not be blank!";
          }
        },
                success:function(response){
                }
      });    
    $(p).editable('toggle');
}