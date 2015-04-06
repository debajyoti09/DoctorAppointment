<?php
class Mdl_doctor_publication extends CI_Model{
    
    public function get_doctor_publication_details($doctor_publication_id, $doctor_id)
    {
        $query= $this->db->query('call proc_get_doctor_publication_details('.$doctor_publication_id.','.$doctor_id.')');
        mysqli_next_result($this->db->conn_id); 
        return $query->result();
    }
    public function delete_doctor_publication($doctor_publication_id) {
        $query = $this->db->query('call proc_delete_doctor_publicaion('.$doctor_publication_id.')');
        mysqli_next_result($this->db->conn_id);
        return $query -> result();
    }
    public function update_doctor_publication($doctor_publication_id, $column_name, $value) {
        $query = $this->db->query('call proc_update_doctor_publication_details('.$doctor_publication_id.',"'.$column_name.'", "'.$value.'")');
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }
}
?>
