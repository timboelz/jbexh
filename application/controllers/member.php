<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class member extends ci_controller {
    public $data = array('pesan'=> '');

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('mmember', 'login', TRUE);
		$this->load->model('mproduk', 'produk', TRUE);
        
        
         session_start();
    }
    
   

	public function index() 
		{
		 if ( $this->session->userdata('login') == TRUE && $this->session->userdata('level') == 'member' ) 
			{
				redirect('user/main');
			}
			else 
			{
				if ($this->login->validasi()) 
					{
					if ($this->login->cekemail()) 
						{
							if ($this->login->cekuser())
							{
							 // redirect('user/main');
							redirect('dashboardmember');
							}
							else 
							{
						   	$this->data['pesan'] = '<div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"><span aria-                    
                                                    hidden="true">x</span><span class="sr-only">x</span></button>
                                                    <strong>Warning!</strong>Username atau Password salah..
                                                    </div>';
                            $this->load->view('user/element/v_header', $this->data);
                            $this->load->view('user/element/menu_top');
                            $this->load->view('user/element/menu_chart_top');
                            $this->load->view('user/element/v_memberlogin');
                           // $this->load->view('user/element/v_footer');                  
							}	
						}
						else
						{
						$this->data['pesan'] = '<div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"><span aria-                    
                                                    hidden="true">x</span><span class="sr-only">x</span></button>
                                                    <strong></strong> ! Email Belum Terdaftar
                                                    </div>';
                        $this->load->view('user/element/v_header', $this->data);
                        $this->load->view('user/element/menu_top');
                        $this->load->view('user/element/menu_chart_top');
                        $this->load->view('user/element/v_memberlogin');
						}
					}	
			  else
				 {
					$this->load->view('user/element/v_header', $this->data);
					$this->load->view('user/element/menu_top');
					$this->load->view('user/element/menu_chart_top');
					$this->load->view('user/element/v_memberlogin');
					//$this->load->view('user/element/v_footer');                  
				 }
			}
		}

    
    public function profil($kode_user)
    { 
         if ( $this->session->userdata('login') == TRUE && $this->session->userdata('level') == 'member' ) 
			{ 
            $x = $this->session->userdata('email'); 
            $info		= $this->login->getprofil($x);
            $data['kode_userx']=$info->kode_user;
            $data['username_userx']=$info->username_user;
            
            $xx = $info->kode_user;
            $data['query']			= $this->login->listmember($xx);
			    
			$data['infouser']['kode_user']  	=   $info->username_user ? $info->kode_user : '';
            $data['infouser']['username_user']  =   $info->username_user ? $info->username_user : '';
            $data['infouser']['pass_user']      =   $info->pass_user ? $info->pass_user : '';
            $data['infouser']['nama']           =   $info->nama ? $info->nama : '';
			$data['infouser']['email']          =   $info->email ? $info->email : '';
			$data['infouser']['alamat']         =   $info->alamat ? $info->alamat : '';
			$data['infouser']['telpon']         =   $info->telpon ? $info->telpon : '';
			$data['infouser']['propinsi']       =   $info->propinsi ? $info->propinsi : '';
			$data['infouser']['kota']           =   $info->kota ? $info->kota : '';
			$data['infouser']['kode_pos']       =   $info->kode_pos ? $info->kode_pos : '';
        
			$this->load->view('user/element/v_header');
            $this->load->view('user/element/menu_top');
            $this->load->view('user/element/menu_nav_left_member',$data);
            $this->load->view('user/pages/profil_member',$data);
            } 
			else  
			{ 
			redirect('user/main'); 
			}
    }
    
    
    
    
    public function lokasikirim($kode_user='')
             {  
                if ( $this->session->userdata('login') == TRUE && $this->session->userdata('level') == 'member' ) {

                            $x = $this->session->userdata('email'); 
                            $info		= $this->login->getprofil($x);
                            $data['kode_userx']=$info->kode_user;
                            $data['username_userx']=$info->username_user;
                            
                            $data['infouser']['username_user']  =   $info->username_user ? $info->username_user : '';
                            $data['infouser']['alamat']         =   $info->alamat ? $info->alamat : '';
                            $data['infouser']['propinsi']       =   $info->propinsi ? $info->propinsi : '';
                            $data['infouser']['kota']           =   $info->propinsi ? $info->kota : '';
                            $data['infouser']['telpon']         =   $info->telpon ? $info->telpon : '';
                            $data['infouser']['kodepos']        =   $info->propinsi ? $info->kode_pos : '';
                            $data['alamat']=$info->alamat;
                            $xx = $info->kode_user;
                            $data['query']			= $this->login->listmember($xx);
        
							$this->load->view('user/element/v_header');
                            $this->load->view('user/element/menu_top');
                            $this->load->view('user/element/menu_nav_left_member',$data);
                            $this->load->view('user/pages/lokasi_member',$data);
                } else  { redirect('user/main'); }
    }
    
    
    
    
    public function produkpesan()
        {  
                if ( $this->session->userdata('login') == TRUE && $this->session->userdata('level') == 'member' ) {

                           $x = $this->session->userdata('email'); 
                            $info		= $this->login->getprofil($x);
                            $data['kode_userx']=$info->kode_user;
                            $data['username_userx']=$info->username_user;
        
                            $data['infouser']['username_user']  =   $info->username_user ? $info->username_user : '';
                            $data['infouser']['pass_user']      =   $info->pass_user ? $info->pass_user : '';
                            $data['infouser']['nama']           =   $info->nama ? $info->nama : '';
        
                            $data['infouser']['alamat']         =   $info->alamat ? $info->alamat : '';
                            $data['infouser']['propinsi']       =   $info->propinsi ? $info->propinsi : '';
                            $data['infouser']['kota']           =   $info->propinsi ? $info->kota : '';
                            $data['infouser']['telpon']         =   $info->telpon ? $info->telpon : '';
                            $data['infouser']['kodepos']        =   $info->propinsi ? $info->kode_pos : '';
        
                            $xx = $info->kode_user;
                            $data['query']			            =   $this->login->listmember($xx);
                            $data['generateno']                 =   $this->generateno();
        
     if ($this->cart->total_items() > 0 && $this->session->userdata('level') == 'member')
                    {
                            $data['generatenoshow']                 =   $this->generateno(); 
                    } else  {  
        	                $data['generatenoshow']  = '<div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"><span aria-                    
                                                    hidden="true">x</span><span class="sr-only">x</span></button>
                                                    Anda belum memilih item..
                                                    </div>';
                    }

        
							$this->load->view('user/element/v_header');
                            $this->load->view('user/element/menu_top');
                            $this->load->view('user/element/menu_nav_left_member',$data);
                            $this->load->view('user/pages/pesanan_member',$data);    
            } else  { 
                    redirect('user/main'); 
                    }
    }
                    
                var $limit=5;
                var $offset=5; 
    public function pesanan($kode_user='') {  
			if ($this->session->userdata('login') == TRUE ) {
                
                            $x = $this->session->userdata('email'); 
                            $info		= $this->login->getprofil($x);
                            $data['kode_userx']=$info->kode_user;
                            $data['username_userx']=$info->username_user;
        
                            	$data['count']			= $this->produk->countpesanan(); 
								$data['query']			= $this->produk->listpesanan($kode_user);

                            $this->load->view('user/element/v_header');
                            $this->load->view('user/element/menu_top');
                            $this->load->view('user/element/menu_nav_left_member',$data);
                            $this->load->view('user/pages/v_pesanan',$data);    
            } else  { 
                    redirect('user/main'); 
                    }
		}
    
    
    public function logout()
            {
                            $this->login->logout();
                            redirect('user/main');
            }


    public function register()
            {
                            $this->load->view('user/element/v_header', $this->data);
                            $this->load->view('user/element/menu_top');
                            $this->load->view('user/element/menu_chart_top');
                            $this->load->view('user/pages/v_register');
            }
	
    
    function generateno()
            {
                  $query = $this->db->query("select kode_transaksi from tbl_transaksi_header");
                  $no = $query->num_rows();
                  $kode = $no+1;
                  $tgl = date("dmy");
                  $kodetrans = str_pad($kode,3,"0",STR_PAD_LEFT);
                  $data['generateno'] = $kodetrans.$tgl;
                  return $data['generateno'];
            }    
    
    
    
    
    
}

?>