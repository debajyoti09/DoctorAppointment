<?php

class Model_get_set_doctor_data  extends CI_Model{
   
     public function get_doctor_details_by_id($doctor_id)
    {
        $query= $this->db->query('call get_DoctorDetaisById('.$doctor_id.')');
        mysqli_next_result($this->db->conn_id); 
        return $query->result_array();
    }
    
    public function get_doctor_degrees_by_id($doctor_id)
    {
         $query= $this->db->query('call proc_get_doctor_degrees(0,'.$doctor_id.')');
        mysqli_next_result($this->db->conn_id); 
        return $query->result();
    }
    
    public function update_doctor_degree_name($prm_doctor_degree_id,$prm_degree_id)
    {
        $query= $this->db->query('call proc_update_doctor_degree_name('.$prm_doctor_degree_id.','.$prm_degree_id.')');
        mysqli_next_result($this->db->conn_id);
    }
    
    public function update_doctor_degree_college($prm_doctor_degree_id,$prm_degree_college)
    {
        $query= $this->db->query('call proc_update_doctor_degree_college('.$prm_doctor_degree_id.',"'.$prm_degree_college.'")');
        mysqli_next_result($this->db->conn_id);
    }
    
    public function update_doctor_degree_batch_year($prm_doctor_degree_id,$prm_batch_year){
        $query= $this->db->query('call proc_update_doctor_batch_year('.$prm_doctor_degree_id.',"'.$prm_batch_year.'")');
        mysqli_next_result($this->db->conn_id);
    }
    
    public function delete_doctor_degree($prm_doctor_degree_id){
        $query= $this->db->query('call proc_delete_doctor_degree('.$prm_doctor_degree_id.')');
        mysqli_next_result($this->db->conn_id);
    }
    
    public function get_doctor_careers_by_id($doctor_id)
    {
        $query= $this->db->query('call proc_get_doctor_career(0,'.$doctor_id.')');
        mysqli_next_result($this->db->conn_id); 
        return $query->result();
    }
    
    
    
    public function update_doctor_career_position($prm_doctor_career_id,$prm_career_position)
    {
          $query= $this->db->query('call proc_update_doctor_career_position('.$prm_doctor_career_id.',"'.$prm_career_position.'")');
          mysqli_next_result($this->db->conn_id);
    }
    
     public function update_doctor_career_hospital($prm_doctor_career_id,$prm_career_hospital)
    {
          $query= $this->db->query('call proc_update_doctor_career_hospital('.$prm_doctor_career_id.',"'.$prm_career_hospital.'")');
          mysqli_next_result($this->db->conn_id);
    }
    
     public function delete_doctor_career($prm_doctor_career_id){
        $query= $this->db->query('call proc_delete_doctor_career('.$prm_doctor_career_id.')');
        mysqli_next_result($this->db->conn_id);
    }
    
    
    function update_doctor_career_year($prm_doctor_career_id,$prm_career_year,$prm_year){
        $query= $this->db->query('call proc_update_doctor_career_year('.$prm_doctor_career_id.',"'.$prm_career_year.'","'.$prm_year.'")');
        mysqli_next_result($this->db->conn_id);
    }
    
    
   
    
}
    

?>
