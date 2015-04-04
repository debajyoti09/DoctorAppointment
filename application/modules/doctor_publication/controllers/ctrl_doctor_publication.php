<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_doctor_publication extends MX_Controller {
    public function index()
    {
//        $this->load->view('view_doctor_publication');
        $this->load->model('doctor_publication/mdl_doctor_publication');
        $doctor_publication_details = $this-> mdl_doctor_publication-> get_doctor_publication_details(0,$this->session->userdata('doctor_id'));
        foreach($doctor_publication_details as $row)
                $publication[]=array(
                    'publication_name'=>$row->publication_name,
                    'publication_details'=>$row->publication_details,
                    'certification'=>$row->certification,
                    'publication_url'=>$row->publication_url,
                    'publication_date'=>$row->publication_date
                    );
            if(isset($publication))
            $doctor_data['doctor_publication']=$publication; 
        else {
            $doctor_data="";
        }
            
        $this->load->view('doctor_publication/view_doctor_publication', $doctor_data);
    }
}
?>
