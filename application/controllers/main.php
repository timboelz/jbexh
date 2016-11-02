<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {

	function __construct() {
        parent::__construct();
            session_start();
            date_default_timezone_set('asia/jakarta');
            $this->load->model('mproduk','produk',TRUE);

        // if($this->session->userdata('username') != TRUE && $this->session->userdata('pass') != TRUE && $this->session->userdata('level') != TRUE){
        //     redirect('login');
        // } 
    }

                var $limit=5;
                var $offset=5; 
    function index($limit='',$offset='') {  
            
            if ($limit=='') {
                                 $limit  = 0 ; 
                                 $offset = 5 ;
                            }
                            if($limit!='')
                            { 
                                $limit  = $limit ;
                                $offset = $this->offset ;
                            }
                            $data['count']              = $this->produk->countproduk();
                            $config['base_url']         = base_url().'main/index';
                            $config['total_rows']       = $data['count'];
                            $config['per_page']         = $this->limit;    
                            $config['cur_tag_open']     = '<span>';
                            $config['cur_tag_close']    = '</span>';        
                            $this->pagination->initialize($config);
                            $data['query']              = $this->produk->listproduk($limit,$offset);
							$data['queryslide']              = $this->produk->listprodukterlaris(5);

                            $this->load->view('user/element/v_header');
                            $this->load->view('user/element/menu_top');
                            $this->load->view('user/element/menu_chart_top');
                            $this->load->view('user/element/menu_nav_left',$data);
                           // $this->load->view('element/menu_banner');
                            $this->load->view('user/pages/v_banner',$data);
                            $this->load->view('user/element/v_footer');
    }



}
