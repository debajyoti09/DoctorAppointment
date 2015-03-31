<?php

class Mdl_doctor_chamber  extends CI_Model{
     function SaveUpdate_doctor_chamber($prm_doctor_chamber_id,$prm_doctor_id,$prm_state_id,$prm_city_id,$prm_pin_code,$prm_chamber_address,$prm_chamber_phone){
        $query=$this->db->query('call proc_SaveUpdate_doctor_chamber('.$prm_doctor_chamber_id.',
                                                                                                                                        '.$prm_doctor_id.',
                                                                                                                                            '.$prm_state_id.',
                                                                                                                                                '.$prm_city_id.',
                                                                                                                                                    "'.$prm_pin_code.'",
                                                                                                                                                            "'.$prm_chamber_address.'",
                                                                                                                                                                "'.$prm_chamber_phone.'")');
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }
    
     public function get_doctor_chamber_general_settings($doctor_id,$doctor_chamber_id)
    {
        $query= $this->db->query('call proc_get_doctor_chamber_general_settings('.$doctor_id.','.$doctor_chamber_id.')');
        mysqli_next_result($this->db->conn_id); 
        return $query->result();
    }
    public function delete_doctor_chamber($doctor_chamber_id)
    {
        $query= $this->db->query('call proc_delete_doctor_chamber('.$doctor_chamber_id.')');
        mysqli_next_result($this->db->conn_id); 
    }
}
?>
