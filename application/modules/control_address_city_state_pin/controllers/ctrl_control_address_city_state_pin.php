<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_control_address_city_state_pin extends MX_Controller {
    public function get_state_master($saved_state_id)
    {
        $this->load->model('control_address_city_state_pin/mdl_control_address_city_state_pin');
        $states=$this->mdl_control_address_city_state_pin->get_state_master();
            foreach($states as $row)
                $states_options[]=array(
                    'state_id'=>$row->state_id,
                    'state_name'=>$row->state_name,
                );
            $data["states_for_dropdown"]=$states_options;
            $data["state_id"]=$saved_state_id;
            $this->load->helper('control_address_city_state_pin/address_city_state_pin'); //call helper
            echo state_dropdown($data); //call helper function
    }
   
    function get_cities_by_state_Id($saved_city_id,$saved_state_id)
   {
        $this->load->model('control_address_city_state_pin/mdl_control_address_city_state_pin');
        if($saved_state_id!=0)
        {
            $cities=$this->mdl_control_address_city_state_pin->get_city_master($saved_state_id);
            foreach($cities as $row)
                    $cities_options[]=array(
                        'city_id'=>$row->city_id,
                        'city_name'=>$row->city_name    
                    );
        }
         if(isset($cities_options))
        $data["cities_for_dropdown"]=$cities_options;
        $data["city_id"]=$saved_city_id;
        $this->load->helper('control_address_city_state_pin/address_city_state_pin'); //call helper
        echo city_dropdown($data); //call helper function
   }

       function get_pinCodes_by_city_Id($saved_pincode,$saved_city_id)
   {
        $this->load->model('control_address_city_state_pin/mdl_control_address_city_state_pin');
        if($saved_city_id!=0)
        {
            $pin_codes=$this->mdl_control_address_city_state_pin->get_pincode_master($saved_city_id);
             foreach($pin_codes as $row)
                    $pinCode_options[]=array(
                        'pin_code'=>$row->pin_code,
                    );
        }
         if(isset($pinCode_options))
        $data["pinCodes_for_dropdown"]=$pinCode_options;
        $data["pin_code"]=$saved_pincode;
        $this->load->helper('control_address_city_state_pin/address_city_state_pin'); //call helper
        echo pinCode_dropdown($data); //call helper function
   }

   
    
    function get_city_master()
   {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
        $this->load->model('control_address_city_state_pin/mdl_control_address_city_state_pin');
        $state_id=$_POST['state_id'];
         $cities=$this->mdl_control_address_city_state_pin->get_city_master($state_id);
         foreach($cities as $row)
                $cities_options[]=array(
                    'city_id'=>$row->city_id,
                    'city_name'=>$row->city_name    
                );
         if(isset($cities_options))
            echo json_encode($cities_options);
        }
   }
   
    function get_pincode_master()
   {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
        $this->load->model('control_address_city_state_pin/mdl_control_address_city_state_pin');
        $city_id=$_POST['city_id'];
         $pin_codes=$this->mdl_control_address_city_state_pin->get_pincode_master($city_id);
         foreach($pin_codes as $row)
                $pinCode_options[]=array(
                    'pin_code'=>$row->pin_code,
                );
         if(isset($pinCode_options))
            echo json_encode($pinCode_options);
        }
   }
   
   
   
    
   
    
}
?>
