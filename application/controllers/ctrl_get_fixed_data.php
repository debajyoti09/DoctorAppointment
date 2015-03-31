<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_get_fixed_data  extends CI_Controller {
    function get_degree_for_edit_dropdown()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
        $this->load->model('model_get_fixed_data');
        $degrees=$this->model_get_fixed_data->get_degree_dropdown();
            foreach($degrees as $row)
                $degree_options[]=array(
                    'value'=>$row->degree_id,
                    'text'=>$row->degree_name    
                );
            echo json_encode($degree_options);
            
    }
    else{
    show_404();
    }
    }
   function get_year_for_edit_dropdown()
   {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
        $this->load->model('model_get_fixed_data');
         $years=$this->model_get_fixed_data->get_year_dropdown();
            foreach($years as $row)
                $years_options[]=array(
                    'value'=>$row->year,
                    'text'=>$row->year    
                );
            echo json_encode($years_options);
        }
   }
}


?>