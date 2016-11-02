<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends ci_controller {
	

	function __construct() {
		parent::__construct();
		 $this->load->model('madmin');
        
		if ($this->session->userdata('login') != TRUE ) 
        {
            redirect('admin');
        } 
	}

	public function index() {

							$this->load->view('admin/element/v_header');
                            $this->load->view('admin/element/menu_top');
                            $this->load->view('admin/element/menu_left');
                            $this->load->view('admin/element/menu_main');
                           // $this->load->view('admin/pages/v_content');
                           //$this->load->view('admin/v_footer');

		}




}

?>