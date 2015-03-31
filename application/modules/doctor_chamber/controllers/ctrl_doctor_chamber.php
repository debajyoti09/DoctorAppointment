<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_doctor_chamber extends MX_Controller {
    public function index()
    {
            $week_days=$this->model_get_fixed_data->get_Weekdays();
            foreach($week_days as $row)
                $days_options[]=array(
                    'day_id'=>$row->day_id,
                    'day'=>$row->day,
                );
            $data["weekDays_for_dropdown"]=$days_options;
            
            $this->load->model('doctor_chamber/mdl_doctor_chamber');
            $doctor_chamber_general_settings=  $this->mdl_doctor_chamber->get_doctor_chamber_general_settings($this->session->userdata('doctor_id'),0); 
            foreach($doctor_chamber_general_settings as $row)
                $chamber_general_setting[]=array(
                    'doctor_chamber_id'=>$row->doctor_chamber_id,
                    'doctor_chamber_no'=>$row->chamber_no,
                    'doctor_chamber_address'=>$row->chamber_address,
                    'doctor_chamber_state_id'=>$row->state_id,
                    'doctor_chamber_state_name'=>$row->state_name,
                    'doctor_chamber_city_id'=>$row->city_id,
                    'doctor_chamber_city_name'=>$row->city_name,
                    'doctor_chamber_pin_code'=>$row->pin_code,
                    'doctor_chamber_phone'=>$row->chamber_phone
                    );
            if(isset($chamber_general_setting))
            $doctor_data["doctor_chamber_general_setting"]=$chamber_general_setting; 
        else {
            $doctor_data[]="";
        }
            
        $this->load->view('view_doctor_chamber',array_merge($data,$doctor_data));
    }
    
     function save_doctor_chamber()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
             $prm_doctor_chamber_id=0;
             $prm_doctor_id=$this->session->userdata('doctor_id');
             $prm_chamber_address=$_POST['txt_doctor_chamber_address'];
             $prm_state_id=$_POST['ddl_state'];
             $prm_city_id=$_POST['ddl_city'];
             $prm_pin_code=$_POST['txt_pincode'];             
             $prm_chamber_phone=$_POST['txt_chamber_phoneNumber'];
             $this->load->model('doctor_chamber/mdl_doctor_chamber');
             $chamber_address=$this->mdl_doctor_chamber->SaveUpdate_doctor_chamber($prm_doctor_chamber_id,$prm_doctor_id,$prm_state_id,$prm_city_id,$prm_pin_code,$prm_chamber_address,$prm_chamber_phone);
             foreach($chamber_address as $row)
                $chamber_address_options[]=array(
                    'doctor_chamber_id'=>$row->doctor_chamber_id,
                    'doctor_chamber_no'=>$row->chamber_no,
                    'doctor_chamber_address'=>$row->chamber_address,
                    'doctor_chamber_phone'=>$row->chamber_phone,
                    'doctor_chamber_state_id'=>$row->state_id,
                    'doctor_chamber_state_name'=>$row->state_name,
                    'doctor_chamber_city_id'=>$row->city_id,
                    'doctor_chamber_city_name'=>$row->city_name,
                    'doctor_chamber_pin_code'=>$row->pin_code,
        );
         if(isset($chamber_address_options))
            echo json_encode($chamber_address_options);
        }
        else
        {
            show_404();
        }
    }
}
?>
