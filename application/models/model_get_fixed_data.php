<?php
class Model_get_fixed_data  extends CI_Model{
    function get_degree_dropdown(){
        $query= $this->db->query("call proc_get_Degree_master()");
        mysqli_next_result($this->db->conn_id);
        return $query->result();
        
    }
    
    function get_year_dropdown(){
        $query= $this->db->query("call proc_get_Year_master()");
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }
    
    
    function get_Weekdays()
    {
        $query=$this->db->query('call proc_get_weekDays()');
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }
}
?>
