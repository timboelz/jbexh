<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboardmember extends ci_controller {
	

	function __construct() {
		parent::__construct();
		 $this->load->model('madmin');
         $this->load->model('mmember');
        if ($this->session->userdata('login') != TRUE && $this->session->userdata('level') != 'member') 
        {
            redirect('member');
        } 
	}

	public function index() 
	   {                     
            $x = $this->session->userdata('email'); 
            $info		= $this->mmember->getprofil($x);
            $data['kode_userx']=$info->kode_user;
            $data['username_userx']=$info->username_user;
            $xx = $info->kode_user;
            $data['query']			= $this->mmember->listmember($xx);
			$data['username_user']  =   $info->username_user ? $info->username_user : '';
			$data['infouser']['kode_user']      =   $info->kode_user ? $info->kode_user : '';
            $data['infouser']['username_user']  =   $info->username_user ? $info->username_user : '';
            $data['infouser']['pass_user']      =   $info->pass_user ? $info->pass_user : '';
            $data['infouser']['nama']           =   $info->nama ? $info->nama : '';
			$data['infouser']['email']          =   $info->email ? $info->email : '';
			$data['infouser']['alamat']         =   $info->alamat ? $info->alamat : '';
			$data['infouser']['telpon']         =   $info->telpon ? $info->telpon : '';
			$data['infouser']['propinsi']       =   $info->propinsi ? $info->propinsi : '';
			$data['infouser']['kota']           =   $info->kota ? $info->kota : '';
			$data['infouser']['kode_pos']       =   $info->kode_pos ? $info->kode_pos : '';
			$nama           =   $info->nama ? $info->nama : '';
			
			
			//$data['pesan'] = '<h4><p class="brand">Selamat Datang  </p></h4>' .$nama;
			
			$data['pesan'] = '<div class="col-sm-9 col-md-9">
            <div class="panel panel-default">
               
                <div class="panel-body">                    
                    <div class="alert alert-success">
                        <h3>
						Menu ini berguna untuk mengelola Profil dan Produk yang telah dipesan.</h3>
                    </div>
                </div>
            </div>
        </div>';
            $this->load->view('user/element/v_header');
            $this->load->view('user/element/menu_top');
            $this->load->view('user/element/menu_nav_left_member',$data);
            $this->load->view('user/pages/v_dashboardmember',$data);
		}
}

?>