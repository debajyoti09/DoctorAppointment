<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Set_get_doctor_publication  extends MX_Controller {
  
    function set_doctor_publication()
    {
       if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
           $doctor_id=$this->session->userdata('doctor_id');
           $publication_title=$_POST['txt_doctor_publication_name'];
           $publication_details=$_POST['txt_doctor_publication_details'];
           $publication_certification=$_POST['txt_doctor_publication_certified_from'];
           $publication_url = $_POST['txt_doctor_publication_url'];
           $publication_date = $_POST['txt_doctor_publication_date'];
           
          $query= $this->db->query('call proc_set_doctor_publication(0,"'.$doctor_id.'","'.$publication_title.'","'.$publication_details.'","'.$publication_certification.'","'.$publication_url.'","'.$publication_date.'")');
          echo json_encode($query->result_array());
           
        }else{
            show_404();
        } 
    }
    function delete_doctor_publication(){
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
            $this->load->model('doctor_publication/mdl_doctor_publication');  
            $prm_doctor_publication_id=$_POST['dt_publication_id'];
            $this->mdl_doctor_publication->delete_doctor_publication($prm_doctor_publication_id);
        }
        else{
            show_404();
        }
    }
    function update_doctor_publication() {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
            $this->load->model('doctor_publication/mdl_doctor_publication');
            $prm_doctor_publication_id = $_POST['pk'];
            $column_name= $_POST['column_name'];
            $value= $_POST['value'];
            $this->mdl_doctor_publication->update_doctor_publication($prm_doctor_publication_id, $column_name, $value);
        }
        else {
            show_404();
        }
    }
}