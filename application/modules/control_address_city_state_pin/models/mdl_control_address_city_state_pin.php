<?php

class Mdl_control_address_city_state_pin  extends CI_Model{
    function get_state_master(){
        $query= $this->db->query("call proc_get_State_master()");
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }
    
    function get_city_master($state_id){
        $query= $this->db->query('call proc_get_City_master('.$state_id.')');
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }
    
//    function get_city_master_byCityId($city_id){
//        $query= $this->db->query('call proc_get_City_master_byCityId('.$city_id.')');
//        mysqli_next_result($this->db->conn_id);
//        return $query->result();
//    }
//    
    function get_pincode_master($city_id){
        $query= $this->db->query('call proc_get_PinCode_master('.$city_id.')');
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }
}
?>
