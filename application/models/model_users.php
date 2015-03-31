<?php

class Model_users  extends CI_Model{
    
    public function can_log_in()
    {
        $this->db->where('email',  $this->input->post('email'));
        $this->db->where('password', $this->input->post('password'));
        $query= $this->db->get('doctor');
        if($query->num_rows()===1)
        {
            return 1;
        }  else {
            return 0;   
        }
    }
    
    public function check_temp_users()
    {
      $this->db->where('temp_user_email',  $this->input->post('email'));
        $query= $this->db->get('temp_users');
        if($query->num_rows()===1)
        {
            return FALSE;
        }  
        else {
            return TRUE;
        }
    }

    public function add_temp_users($key)
    {
        $data=array(
            'first_name'=>$this->input->post('firstname'),
            'last_name'=>$this->input->post('lastname'),
           'temp_user_email'=> $this->input->post('email'),
            'temp_user_password'=> md5($this->input->post('password')),
            'temp_user_key'=> $key
        );
        
        $query=$this->db->insert('temp_users',$data);
            if($query)
                return TRUE;
            else {
                return FALSE;
            }
    }
    
    public function  is_key_valid($key)
    {
        $this->db->where('temp_user_key',$key);
        $query=$this->db->get('temp_users');
        
        if($query->num_rows()===1)
        {
            return TRUE;
        }else {
            return FALSE;
        }
    }
    
    public function add_user($key)
    {
        $this->db->where('temp_user_key',$key);
        $temp_user=$this->db->get('temp_users');
        
        if($temp_user)
        {
            $row=$temp_user->row();
            
            $data=array(
                'first_name'=>$row->first_name, 
                'last_name'=>$row->last_name,
                'email'=>$row->temp_user_email,
                'password'=>$row->temp_user_password
            );
            
            $add_user=$this->db->insert('doctor',$data);
        }
        if($add_user)
        {
            $this->db->where('temp_user_key',$key);
            $this->db->delete('temp_users');
            $doctor_name=array(
                'first_name'=>$data['first_name'],
                'last_name'=>$data['last_name']
            );
            return $doctor_name;
            
        }  else {
            return FALSE;
        }
        
    }
    
    public function get_doctor_id()
    {
        $this->db->where('email',  $this->input->post('email'));
        $this->db->where('password',$this->input->post('password'));
        
        $query= $this->db->get('doctor');
        return $query->row()->doctor_id;
    }
    
}

?>
