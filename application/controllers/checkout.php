<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class checkout extends ci_controller {

	function __constuct(){
		parent::__construct();
			session_start();
			date_default_timezone_set('asia/jakarta');
            $this->load->model('produk_model');
            $this->load->model('login_model');
		}
	

  

                var $limit=9;
                var $offset=9; 
  function index() {  
        $session=$this->session->userdata('islogin') ;
        if ($session == TRUE) {
        	// if ($this->login_model->cek_user()){
        		$data['data_member'] = $this->login_model->member($pecah[2]);

   	   			$data['data_member'] = $this->login_model->tampil_produk($limit,$offset);
   	            $this->load->view('element/v_header');
   	            $this->load->view('element/menu_top');
   	            $this->load->view('element/menu_chart_top');
   	            $this->load->view('element/menu_nav_left');
   	           // $this->load->view('element/menu_banner');
   	            $this->load->view('pages/v_checkout',$data);
            	$this->load->view('element/v_footer');
        }
        else {
        	 	$this->load->view('element/v_header');
   	            $this->load->view('element/menu_top');
   	           // $this->load->view('element/menu_chart_top');
   	           // $this->load->view('element/menu_nav_left');
   	           // $this->load->view('element/menu_banner');
   	            $this->load->view('pages/v_register');
            	$this->load->view('element/v_footer');
        //	}
    	}
    }

    function tambah_barang() {
            $data = array(
                'id'      => $this->input->post('kode_produk'),
                'qty'     => $this->input->post('banyak'),
                'price'   => $this->input->post('harga'),
                'name'    => $this->input->post('nama_produk'));
            $this->cart->insert($data);
            // redirect('user/index');
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."user/index'>";
    }


    function update_keranjang() {
            $total = $this->cart->total_items();
            $item = $this->input->post('rowid');
            $qty = $this->input->post('qty');
            for($i=0;$i < $total;$i++)
            {
                $data = array(
                'rowid' => $item[$i],
                'qty'   => $qty[$i]);
                $this->cart->update($data);
            }
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."main/'>";
    }

}
