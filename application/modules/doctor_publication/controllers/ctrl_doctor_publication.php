<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_doctor_publication extends MX_Controller {
    public function index()
    {
        $this->load->view('view_doctor_publication');
    }
}
?>
