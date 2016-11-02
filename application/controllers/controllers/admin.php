<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends ci_controller {
    public $data = array('pesan'=> '');

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('madmin', 'login', TRUE);
    }


	public function index() {
			$vlds 		= $this->login->admValidasi();
			$cekValid 	= $this->login->cekAdmUser();
			
			
			// echo "<pre>";
			// print_r( $cekValid );
			// die;
		
		
			if ($this->session->userdata('login')==TRUE and $this->session->userdata('level') == 'admin') {
				redirect('dashboard');
			}
			else {
				//print_r($vlds); //die;
				//if ($this->login->admValidasi()) {
			   if ( $vlds === 1 ) { 
					
					if ( $cekValid['level'] === 'admin') {
						redirect('dashboard');
					}
					else if( $cekValid['level'] === 'user') {
						redirect('user/main');
					}
					else {
						 
                    $this->data['pesan'] = 'Username atau Password salah.';
                    $this->load->view('admin/element/v_header', $this->data);
                    $this->load->view('admin/element/v_login');
                
					}	
			}
		 else
            {
                $this->load->view('admin/element/v_header', $this->data);
                $this->load->view('admin/element/v_login');
            }
        }
    }
	
	public function compLogin() {
		
			$vlds = $this->login->admValidasi();
		
			if ($this->session->userdata('login')==TRUE and $this->session->userdata('level') == 'admin') {
				redirect('dashboard');
			}
			else 
			{
				 if ( $vlds === 1 ) 
				  
					{
						if ($this->login->cekCompUser()) {
							redirect('dashboard');
						}
						else {
							$this->data['pesan'] = 'Username atau Password salah.';
							$this->load->view('admin/element/v_header', $this->data);
							$this->load->view('admin/element/v_login');
						}	
					}
				else
					{
						$this->load->view('admin/element/v_header', $this->data);
						$this->load->view('admin/element/v_login');
					}
				
			}
    }
	
	public function userLogin() {
			
			$vlds = $this->login->admValidasi();
		
			if ($this->session->userdata('login')==TRUE and $this->session->userdata('level') == 'user') {
				//redirect('dashboard');
			}
			else 
			{
				print_r($vlds);
				//die;
				if ( $vlds === 1 ) 
					{
						//echo "xxxxxxx";
						if ($this->login->cekPublicUser()) {
							redirect('dashboard');
						}
						else {
						$this->data['pesan'] = 'Username atau Password salah.';
						$this->load->view('admin/element/v_header', $this->data);
						$this->load->view('admin/element/v_login');
						
						$this->userLogin;
						}	
					}
				else
					{
						//echo "wwwww";
						
						$this->load->view('admin/element/v_header', $this->data);
						$this->load->view('admin/element/v_login');
					}
			}
    }
	
	
	
	// public function upload()	
			  // {
				// if(isset($_FILES['image'])) 
					// {
					    // $config['upload_path'] = './asset/produk';
						// $config['allowed_types'] = 'gif|jpg|png|bmp';
						// $this->load->library('upload', $config);
						// if($this->upload->do_upload('image'))
						// {
							// $image_data = $this->upload->data();
							
								// $event_name = $this->input->post('event_name');
								// $event_desc = $this->input->post('event_desc');
								// $event_date = $this->input->post('event_date');
								// $userfile   = $_FILES['image']['name'];

							// $data=array(										
										// 'event_name' => $event_name  ,
										// 'event_desc' => $event_desc  ,
										// 'event_date' => $event_date  ,
										// 'userfile'   => $userfile    ,
				                    // );    
										// $this->load->model('m_event','m_event',TRUE);
										// $this->m_event->insert_event($data);

										// echo img(array(
											// 'src'=>site_url("asset/produk/$image_data[file_name]"),
											// 'width'=>200,
											// 'style'=>'margin-top:10px; padding:10px; background:#bbb'
										// )); 
							// }
							
							// redirect("produk");
						// }
					
					// else 
						// echo "gagal";
				// } 

	 public function logout()
    {
        $this->login->logout();
        redirect('user/main');
    }


}


?>