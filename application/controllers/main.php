<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MX_Controller {
    
    public function index()
    {
        $this->login();
    }
    
    public function login()
    {
        if($this->session->userdata('first_name')=="")
        {
            $this->load->view('view_login');
        }
        else {
            $data=array(
            'welcome_message'=>'Welcome Dr. '.  $this->session->userdata('first_name') .' ' . $this->session->userdata('last_name'). '. Your account has been created. Please Login here. Thank you.'
            );
            $this->load->view('view_login',$data);
            $this->session->sess_destroy();
        }
    }
    
    
    public function signup()
    {
        $this->load->view('view_signup');
    }

    public function members()
    {
      if($this->session->userdata('is_logged_in') )
        {
            $this->load->model('model_get_fixed_data');
            $this->load->model('model_get_set_doctor_data');
            
            //Fixed Data
            $degrees=$this->model_get_fixed_data->get_degree_dropdown();
            foreach($degrees as $row)
                $degree_options[]=array(
                    'degree_id'=>$row->degree_id,
                    'degree_name'=>$row->degree_name    
                );
            $data["degrees_for_dropdown"]=$degree_options;
            
            $years=$this->model_get_fixed_data->get_year_dropdown();
            foreach($years as $row)
                $year_options[]=array(
                    'year'=>$row->year
                );
            $data["years_for_dropdown"]=$year_options;
            
            
            
            
            //Doctor personal Data 
            $doctor_details_data=$this->model_get_set_doctor_data->get_doctor_details_by_id($this->session->userdata('doctor_id'));
            $doctor_data["doctor_details"]=array(
                'doctor_firstname'=>$doctor_details_data[0]['first_name'],
                'doctor_lastname'=>$doctor_details_data[0]['last_name'],
                'doctor_email'=>$doctor_details_data[0]['email']
            );
            
            $doctor_degrees=  $this->model_get_set_doctor_data->get_doctor_degrees_by_id($this->session->userdata('doctor_id'));
            foreach($doctor_degrees as $row)
                $doctor_degrees_options[]=array(
                    'doctor_degree_id'=>$row->doctor_degree_id,
                    'degree_id'=>$row->degree_id,
                    'degree_name'=>$row->degree_name,
                    'college_name'=>$row->college_name,
                    'batch_year'=>$row->batch_year
                    );
            if(isset($doctor_degrees_options))
            $doctor_data["doctor_degree_details"]=$doctor_degrees_options;

            
            $doctor_careers=  $this->model_get_set_doctor_data->get_doctor_careers_by_id($this->session->userdata('doctor_id')); 
            foreach($doctor_careers as $row)
                $doctor_careers_options[]=array(
                    'doctor_career_id'=>$row->doctor_career_id,
                    'career_position'=>$row->career_position,
                    'career_hospital'=>$row->career_hospital,
                    'career_start_year'=>$row->career_start_year,
                    'career_end_year'=>$row->career_end_year
                    );
            if(isset($doctor_careers_options))
            $doctor_data["doctor_career_details"]=$doctor_careers_options;
            
            
            
           
            
//            echo "<pre>";
//            print_r(array_merge($doctor_data));
//            echo "</pre>";

            $this->load->view('view_members',  array_merge($data,$doctor_data));
        }
    else {
        $this->restricted();
    }
    }
    
    
    
    public function restricted()
    {
        $this->load->view('view_restricted');
    }


    public function login_validation()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $this->load->library('email');
            $this->form_validation->set_rules('email','Email','required|trim|valid_email|xss_clean');//|callback_validate_credentials        
            $this->form_validation->set_rules('password','Password','required|xss_clean|md5|trim');
             $this->load->model('model_users');
            
            if($this->form_validation->run() && $this->model_users->can_log_in()==1)
            {
                $this->load->model('model_users');
                $doctor_id= $this->model_users->get_doctor_id();
                $data=array(
                    'doctor_id' =>$this->model_users->get_doctor_id(),
                    'is_logged_in'=>1
                );
                $this->session->set_userdata($data);
                redirect('members');
            }else
            {
                $this->load->view('view_login');
                echo "<script> $('#error_modal').modal('show') </script>";
//                echo "Incorrect username/password";
            }
        }
        else{
            echo "You have not  the permission to access this page. Please contact your webmaster.";
        }
    }
    
    
    public function signup_validation()
    {
          if ($_SERVER['REQUEST_METHOD'] === 'POST')
          {
            $this->load->library('email',array('mailtype'=>'html'));
            $this->load->model('model_users');
            
            $this->form_validation->set_rules('email','Email','required|trim|valid_email|xss_clean|is_unique[doctor.email]');
            $this->form_validation->set_rules('password','Password','required|xss_clean|trim');
            $this->form_validation->set_rules('cpassword','Confirm Password','required|trim|xss_clean|matches[password]');
            $this->form_validation->set_rules('firstname','First Name','required|xss_clean|trim');
            $this->form_validation->set_rules('lastname','Last Name','required|xss_clean|trim');
            $this->form_validation->set_message('is_unique',"That email already exists.");


            if($this->form_validation->run())
                if($this->model_users->check_temp_users())
                {
                //generate random key 
                $key=  md5(uniqid());

                $this->email->from('debajyoti.saha2009@gmail.com','Debajyori Saha');
                $this->email->to($this->input->post('email'));
                $this->email->subject("Confirm your Account");
                $message="<p>Thank you for signing up</p>";
                $message.="<p><a href='".base_url()."register_user/$key'> Click here</a>to confirm your account.</p>";
                $this->email->message($message);

                //send a emial to user
                if($this->model_users->add_temp_users($key))
                {
                    if($this->email->send())
                    {
                        echo "Email has been sent.Please click on activation link to activate your account.Thank You";
                    }else
                    {
                        echo "Failed.";
                    }
                }
                else
                {
                    echo "Problem adding to database.";
                }
            }
                else{
                    echo "You have already registered but not activated your account.Please actiavte your account by clicking on activation link, sent to your email address.Thank you.";
                }
            else {
                $this->load->view('view_signup');
            }
          }
          else{
              echo "You have not  the permission to access this page. Please contact your webmaster.";
          }
    }
    
    public function register_user($key)
    {
        $this->load->model('model_users');
        if($this->model_users->is_key_valid($key))
        {
            if($new_doctor_name=$this->model_users->add_user($key))
            {
                $this->session->set_userdata($new_doctor_name);
                redirect('login');
            }else{
                echo "Failed to add user.Please try again.";
            }
        }  else {
         echo "Not valid";   
        }
    }

    
//    public function validate_credentials()
//    {
//        $this->load->model('model_users');
//        if($this->model_users->can_log_in()==1)
//        {
//            return 1;
//        }  else {
//            $this->form_validation->set_message('validate_credentials','Incorrect username/password');
//            return 0;
//        }
//        
//    }
    
    
    public function  logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>