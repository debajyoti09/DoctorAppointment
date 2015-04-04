<?php
class Mdl_doctor_publication extends CI_Model{
    
    public function get_doctor_publication_details($doctor_publication_id, $doctor_id)
    {
        $query= $this->db->query('call proc_get_doctor_publication_details('.$doctor_publication_id.','.$doctor_id.')');
        mysqli_next_result($this->db->conn_id); 
        return $query->result();
    }
}
//changes made to check github
?>
