<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Set_get_doctor_data  extends CI_Controller {
  
    function set_doctor_degree()
    {
       if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
          
           $doctor_id=$this->session->userdata('doctor_id');
           $degree_id=$_POST['ddl_doctorDegree'];
           $college_name=$_POST['txt_doctorCollege'];
           $batch_year=$_POST['ddl_degree_batch_year'];
           
           
          $query= $this->db->query('call proc_set_doctor_degree(0,'.$doctor_id.','.$degree_id.',"'.$college_name.'","'.$batch_year.'")');
          echo json_encode($query->result_array());
        }else{
            show_404();
        } 
    }
    
    function update_doctor_degree_name()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
            $this->load->model('model_get_set_doctor_data');  
            $prm_degree_id=$_POST['value'];
            $prm_doctor_degree_id=$_POST['pk'];
            $this->model_get_set_doctor_data->update_doctor_degree_name($prm_doctor_degree_id,$prm_degree_id);
        }
        else {
                   show_404();
        }
    }
    function update_doctor_degree_college()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
            $this->load->model('model_get_set_doctor_data');  
            $prm_degree_college=$_POST['value'];
            $prm_doctor_degree_id=$_POST['pk'];
            $this->model_get_set_doctor_data->update_doctor_degree_college($prm_doctor_degree_id,$prm_degree_college);
        }
        else {
                   show_404();
        }
    }
    
    function update_doctor_degree_batch_year()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
            $this->load->model('model_get_set_doctor_data');  
            $prm_degree_year=$_POST['value'];
            $prm_doctor_degree_id=$_POST['pk'];
            $this->model_get_set_doctor_data->update_doctor_degree_batch_year($prm_doctor_degree_id,$prm_degree_year);
        }
        else {
                   show_404();
        }
    }
    
    function delete_doctor_degree()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
            $this->load->model('model_get_set_doctor_data');  
            $prm_doctor_degree_id=$_POST['doctor_degree_id'];
            $this->model_get_set_doctor_data->delete_doctor_degree($prm_doctor_degree_id);
        }
        else {
            show_404();
       }
    }
    
    function set_doctor_career()
    
    {
         if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
          
           $doctor_id=$this->session->userdata('doctor_id');
           $career_position=$_POST['txt_doctor_career_position'];
           $career_hospital_name=$_POST['txt_doctor_career_Hospital'];
           $career_start_year=$_POST['ddl_career_start_year'];
           $career_end_year=$_POST['ddl_career_end_year'];
           
           
          $query= $this->db->query('call proc_set_doctor_career(0,'.$doctor_id.',"'.$career_position.'","'.$career_hospital_name.'","'.$career_start_year.'","'.$career_end_year.'")');
          echo json_encode($query->result_array());
        }else{
            show_404();
        }
    }
    
    function update_doctor_career_position()
    {
      if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
           $this->load->model('model_get_set_doctor_data');  
            $prm_career_position=$_POST['value'];
            $prm_doctor_career_id=$_POST['pk'];
            $this->model_get_set_doctor_data->update_doctor_career_position($prm_doctor_career_id,$prm_career_position);
      }else{
          show_404();
      }
    }
    
    function update_doctor_career_hospital()
    {
          if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
           $this->load->model('model_get_set_doctor_data');  
            $prm_career_hospital=$_POST['value'];
            $prm_doctor_career_id=$_POST['pk'];
            $this->model_get_set_doctor_data->update_doctor_career_hospital($prm_doctor_career_id,$prm_career_hospital);
      }else{
          show_404();
      }
    }
    
     function delete_doctor_career()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
            $this->load->model('model_get_set_doctor_data');  
            $prm_doctor_career_id=$_POST['doctor_career_id'];
            $this->model_get_set_doctor_data->delete_doctor_career($prm_doctor_career_id);
        }
        else {
            show_404();
       }
    }
    
    
        function update_doctor_career_start_year()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
            $this->load->model('model_get_set_doctor_data');  
            $prm_career_start_year=$_POST['value'];
            $prm_doctor_career_id=$_POST['pk'];
            $prm_year="start";
            $this->model_get_set_doctor_data->update_doctor_career_year($prm_doctor_career_id,$prm_career_start_year,$prm_year);
        }
        else {
                   show_404();
        }
    }
    
    
            function update_doctor_career_end_year()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
            $this->load->model('model_get_set_doctor_data');  
            $prm_career_end_year=$_POST['value'];
            $prm_doctor_career_id=$_POST['pk'];
            $prm_year="end";
            $this->model_get_set_doctor_data->update_doctor_career_year($prm_doctor_career_id,$prm_career_end_year,$prm_year);
        }
        else {
                   show_404();
        }
    }
    
    
}
?>