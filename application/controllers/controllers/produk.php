<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class produk extends ci_controller {
		
		var $gallerypath;
		var $gallery_path_url;

	public function __construct() {
		parent::__construct();
		$this->load->model('mproduk','produk',TRUE);
		$this->load->helper(array('html','url')); 
					$this->load->library('fpdf');
                    $this->load->database();
                    define('FPDF_FONTPATH',$this->config->item('fonts_path'));
	}


                var $limit=5;
                var $offset=5; 
    function index($limit='',$offset='') {  
			if ($this->session->userdata('login') == TRUE ) {
				    if ($limit=='') {
                                 $limit  = 0 ; 
                                 $offset = 5 ;
                            }
                            if($limit!='')
                            { 
                                $limit  = $limit ;
                                $offset = $this->offset ;
                            }

                            	$data['count']			= $this->produk->countproduk(); 
								$config['base_url']		= base_url('produk/index');
								$config['total_rows'] 	= $data['count'];
								$config['per_page'] 	= $this->limit;
								$config['cur_tag_open']     = '<span>';
								$config['cur_tag_close']    = '</span>'; 
								$this->pagination->initialize($config);
								$data['query']			= $this->produk->listproduk($limit,$offset);

						$gallerypath 		= base_url().'asset/images/source';
						$gallery_path_url	= base_url().'asset/images/';

						$data['gallerypath'] = $gallerypath;
						$data['gallery_path_url'] = $gallery_path_url;

						$this->load->view('admin/element/v_header');
				       	$this->load->view('admin/element/menu_top');
				       	$this->load->view('admin/element/menu_chart_top');
				       	$this->load->view('admin/element/menu_nav_left');
				        $this->load->view('admin/pages/v_produk',$data);
			} 
			else 
				{
				redirect('admin');
				  
			}
		}

   function addform($kd_produk='')  {
	  		if ($this->session->userdata('login') == TRUE ) {
                    $data['generatekodeproduk']=$this->produk->generatekodeproduk();  
                    $q = $this->db->query('select * from tbl_kategori');
                    $q = $q->result_array();
                    $data['id_kategori'] = $q;
                    
                     	$this->load->view('admin/element/v_header');
				       	$this->load->view('admin/element/menu_top');
				       	$this->load->view('admin/element/menu_chart_top');
				       	$this->load->view('admin/element/menu_nav_left');
				        $this->load->view('admin/pages/add_produk',$data);
				      //  $this->load->view('admin/pages/view_upload');
          		}
          		else
          		redirect("user");
			}
	
	  function cetakpenjualan($limit='',$offset='') {  
			if ($this->session->userdata('login') == TRUE ) {
				    // if ($limit=='') {
                                 // $limit  = 0 ; 
                                 // $offset = 5 ;
                            // }
                            // if($limit!='')
                            // { 
                                // $limit  = $limit ;
                                // $offset = $this->offset ;
                            // }

                            	// $data['count']			= $this->produk->countpesanan(); 
								// $config['base_url']		= base_url('produk/cetakpenjualan');
								// $config['total_rows'] 	= $data['count'];
								// $config['per_page'] 	= $this->limit;
								// $config['cur_tag_open']     = '<span>';
								// $config['cur_tag_close']    = '</span>'; 
								// $this->pagination->initialize($config);
								// $data['query']			= $this->produk->listcetakan($limit,$offset);

					

						$this->load->view('admin/element/v_header');
				       	$this->load->view('admin/element/menu_top');
				       	$this->load->view('admin/element/menu_chart_top');
				       	$this->load->view('admin/element/menu_nav_left');
				        //$this->load->view('admin/pages/v_cetakpenjualan',$data);
						$this->load->view('admin/pages/v_cetakpenjualan');
			} 
			else 
				{
				redirect('admin');
				  
			}
		}
		
		
     function addformedit($kode_produk='') {
                
                if($kode_produk!='') 
                    {
                    $info=$this->produk->getproduk($kode_produk);    
                    $data['infouser']['kode_produk']=$info->kode_produk;
                    $data['infouser']['nama_produk']=$info->nama_produk;
                    $data['infouser']['harga']=$info->harga;
                    $data['infouser']['stok']=$info->stok;
                    $data['infouser']['deskripsi']=$info->deskripsi;
                    $data['infouser']['gbr_besar']=$info->gbr_besar;
                    $data['id_kategori2']=$info->id_kategori;
                    $data['kode_produk_hide']=$info->kode_produk;
                    
                    $q = $this->db->query('select * from tbl_kategori');
                    $q = $q->result_array();
                    $data['id_kategori'] = $q;
                    }
                        $this->load->view('admin/element/v_header');
				       	$this->load->view('admin/element/menu_top');
				       	$this->load->view('admin/element/menu_chart_top');
				       	$this->load->view('admin/element/menu_nav_left');
				        $this->load->view('admin/pages/edit_produk',$data);
            }

     function addformeditmember($kode_user = '') {
                
                if($kode_user!='') 
                  {
                    $info=$this->produk->getmember($kode_user);    
                    $data['infouser']['kode_user']=$info->kode_user;
                    $data['infouser']['username_user']=$info->username_user;
                    $data['infouser']['pass_user']=$info->pass_user;
                    $data['infouser']['nama']=$info->nama;
                    $data['infouser']['email']=$info->email;
                    $data['infouser']['alamat']=$info->alamat;
                    $data['infouser']['telpon']=$info->telpon;
                    $data['infouser']['propinsi']=$info->propinsi;
                    $data['infouser']['kota']=$info->kota;
                    $data['infouser']['kode_pos']=$info->kode_pos;
                    $data['kode_user_hide']=$info->kode_user;
                  }
                        $this->load->view('admin/element/v_header');
				       	$this->load->view('admin/element/menu_top');
				       	$this->load->view('admin/element/menu_chart_top');
				       	$this->load->view('admin/element/menu_nav_left');
				        $this->load->view('admin/pages/edit_member',$data);
            }


    function editproduk() {
        $kode_produk_hide = $this->input->post('kode_produk_hide');
        $file = $_FILES['image']['name'];
            if (empty($file)) 
                {
					$this->produk->editnongambar($kode_produk_hide);
					redirect('produk/');
				} else 
                     
                    {
                        $config['upload_path'] = './asset/produk';
						$config['allowed_types'] = 'gif|jpg|png|bmp';
						$this->load->library('upload', $config);
                $this->upload->do_upload('image');
							$image_data = $this->upload->data();
							
								$id_kategori = $this->input->post('kategori');
								$nama_produk = $this->input->post('nama_produk');
								$harga 		 = $this->input->post('harga');
								$stok 		 = $this->input->post('stok');
								$deskripsi 	 = $this->input->post('deskripsi');
								$userfile    = $_FILES['image']['name'];

							$data=array(
				                        'nama_produk'=> $nama_produk,
				                        'id_kategori'=> $id_kategori,
				                        'harga'		 => $harga,
				                        'stok'		 => $stok,
				                        'deskripsi'  => $deskripsi,
				                        'gbr_besar'  => $userfile,
				                    );    
                                        $this->produk->updateproduk($kode_produk_hide,$data);
                            redirect("produk");
				
                }

        }
    
    function editmember($limit='',$offset='') 
            {
                $kode_user_hide     = $this->input->post('kode_user_hide');
                $username_user      = $this->input->post('username_user');
				$pass_user          = $this->input->post('pass_user');
				$nama               = $this->input->post('nama');
				$email		        = $this->input->post('email');
				$alamat             = $this->input->post('alamat');
				$telpon             = $this->input->post('telpon');
                $propinsi           = $this->input->post('propinsi');
				$kota               = $this->input->post('kota');
                $kode_pos           = $this->input->post('kode_pos');
                

							$data=array(
				                        'username_user' => $username_user,
				                        'pass_user'     => $pass_user,
				                        'nama'          => $nama,
				                        'email'		    => $email,
				                        'alamat'		=> $alamat,
				                        'telpon'        => $telpon,
                                        'propinsi'	    => $propinsi,
				                        'kota'		    => $kota,
				                        'kode_pos'      => $kode_pos,
				                    ); 
							$this->produk->updatemember($kode_user_hide,$data);	
        if  ( $this->db->affected_rows() > 0 )
                {
                            $data['pesan'] = '<div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"><span aria-                    
                                                    hidden="true">x</span><span class="sr-only">x</span></button>
                                                    <strong>!</strong>Data telah di Update...
                                                    </div>';
                }
                if ($limit=='') { $limit  = 0 ; $offset = 6 ;}
                if ($limit!='') { $limit  = $limit ;$offset = $this->offset ;}
                    
        	                    $data['count']			= $this->produk->countmember(); 
								$config['base_url']		= base_url('produk/listmember');
								$config['total_rows'] 	= $data['count'];
								$config['per_page'] 	= $this->limit;
								$config['cur_tag_open']     = '<span>';
								$config['cur_tag_close']    = '</span>'; 
								$this->pagination->initialize($config);
								$data['query']			= $this->produk->listmember($limit,$offset);
                        
                        $this->load->view('admin/element/v_header');
				       	$this->load->view('admin/element/menu_top');
				       	$this->load->view('admin/element/menu_chart_top');
				       	$this->load->view('admin/element/menu_nav_left');
				        $this->load->view('admin/pages/v_member',$data);
            }
    
    function updatestatus($kode_transaksi,$limit='',$offset = '')
    {
        
    if($kode_transaksi!='') 
        {   
			$data = array('status' => '1'); 
			$this->produk->updatestatus($kode_transaksi,$data);	
        if  ( $this->db->affected_rows() > 0 )
                {
                            $data['pesan'] = '<div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"><span aria-                    
                                                    hidden="true">x</span><span class="sr-only">x</span></button>
                                                    <strong>!</strong>Data telah di Update...
                                                    </div>';
                }
         if ($limit=='') { $limit  = 0 ; $offset = 6 ;}
                if ($limit!='') { $limit  = $limit ;$offset = $this->offset ;}
                    
        	                    $data['count']			= $this->produk->countlistkonfirmasi(); 
								$config['base_url']		= base_url('produk/listkonfirmasi');
								$config['total_rows'] 	= $data['count'];
								$config['per_page'] 	= $this->limit;
								$config['cur_tag_open']     = '<span>';
								$config['cur_tag_close']    = '</span>'; 
								$this->pagination->initialize($config);
								$data['query']			= $this->produk->listkonfirmasi($limit,$offset);

						$this->load->view('admin/element/v_header');
				       	$this->load->view('admin/element/menu_top');
				       	$this->load->view('admin/element/menu_chart_top');
				       	$this->load->view('admin/element/menu_nav_left');
				        $this->load->view('admin/pages/v_konfirmasi',$data);
        }
    }
    
    public function deleteproduk($kode_produk) 
        {
        $this->produk->deleteproduk($kode_produk);
        redirect ("produk");
        }
    
     public function deletemember($kode_user) 
        {
        $this->produk->deletemember($kode_user);
        redirect ("produk/listmember");
        }

    public function upload()	
			  {
				if(isset($_FILES['image'])) 
					{
					    $config['upload_path'] = './asset/produk';
						$config['allowed_types'] = 'gif|jpg|png|bmp';
						$this->load->library('upload', $config);
						if($this->upload->do_upload('image'))
						{
							$image_data = $this->upload->data();
							
								$kode_produk = $this->input->post('kodeproduk');
								$id_kategori = $this->input->post('id_kategori');
								$nama_produk = $this->input->post('nama_produk');
								$harga 		 = $this->input->post('harga');
								$stok 		 = $this->input->post('stok');
								$deskripsi 	 = $this->input->post('deskripsi');
								$userfile    = $_FILES['image']['name'];

							$data=array(
				                        'nama_produk'=> $nama_produk,
				                        'kode_produk'=> $kode_produk,
				                        'id_kategori'=> $id_kategori,
				                        'harga'		 => $harga,
				                        'stok'		 => $stok,
				                        'deskripsi'  => $deskripsi,
				                        'gbr_besar'  => $userfile,
				                    );    
										$this->load->model('mproduk','produk',TRUE);
										$this->produk->insertproduk($data);

										echo img(array(
											'src'=>site_url("asset/produk/$image_data[file_name]"),
											'width'=>200,
											'style'=>'margin-top:10px; padding:10px; background:#bbb'
										)); 
							}
							
							redirect("produk");
						}
					
					else 
						echo "gagal";
				} 

	public function verify($verificationcode=NULL)
		{  
		  $norecords = $this->produk->verifyemailaddress($verificationcode);  
		  if ($norecords > 0){
		   $error = array( 'success' => "Email Verified Successfully!"); 
		  }else{
		   $error = array( 'error' => "Sorry Unable to Verify Your Email!"); 
		  }
		  $data['errormsg'] = $error; 
		  redirect("user/main");
		 }
	
	public function emailgo($email,$nama,$verificationcode)
			{
			//$verificationcode="abcdefg3452";
			$namaupper 	= strtoupper($nama);
			$urlHost	= base_url("verify/".$verificationcode);
					 $this->load->library('email'); 
					 $this->email->set_newline("\r\n");
					 $this->email->from('admin@nyanya.web.id','Administrator'); 
					 $this->email->to($email); 
					 $this->email->subject('Konfirmasi Registrasi'); 
					 //$this->email->message("$namaupper kamu sudah terdaftar segagai member!"); 
					 // $this->email->message("Dear $namaupper,\nPlease click on below URL or paste into your browser to verify your Email Address\n\n http://localhost:90/badri2/verify/".$verificationcode."\n"."\n\nThanks\nAdmin Team");
					 $this->email->message("Dear $namaupper,\nPlease click on below URL or paste into your browser to verify your Email Address\n\n $urlHost \n"."\n\nThanks\nAdmin Team");
			}
	
	public function check_email()
	{			
				$email = $this->input->post('email');
				$query = $this->produk->emailcheck($email);		
					$status ="true";		
					if($query){
				$status = "false";
			}                
				echo $status;	
	}	
		
    public function addmember()	
        {  
		$add = $this->input->post('add');
			if ( $add != "" )
					{
						$verificationcode   = random_string('alnum', 16);
						$username_user      = $this->input->post('username_user');
						$pass_user          = $this->input->post('pass_user');
						$nama               = $this->input->post('nama');
						$email		        = $this->input->post('email');
						$alamat             = $this->input->post('alamat');
						$telpon             = $this->input->post('telpon');
						$propinsi           = $this->input->post('propinsi');
						$kota               = $this->input->post('kota');
						$kode_pos           = $this->input->post('kodepos');
						$kode_verifikasi    = $verificationcode;
                        $level              = "notmember";

					$data=array(
				                   'username_user' 		=> $username_user,
				                   'pass_user'     		=> $pass_user,
				                   'nama'          		=> $nama,
				                   'email'		    	=> $email,
				                   'alamat'				=> $alamat,
				                   'telpon'        		=> $telpon,
								   'propinsi'      		=> $propinsi,
								   'kota'     			=> $kota,
								   'kode_pos'      		=> $kode_pos,
								   'kode_verifikasi' 	=> $kode_verifikasi,
                                   'level'         		=> $level,
				               ); 
					
						    $this->emailgo($email,$nama,$verificationcode);
							$push = $this->email->send();
							if ($push)
							{
							$this->produk->insertmember($data);		
                            $data['pesan'] = '<div class="alert alert-warning alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"><span aria-                    
                                                    hidden="true">x</span><span class="sr-only">x</span></button>
                                                    <strong>!</strong> Anda berhasil melakukan Registrasi...
                                                    </div>';

                            $this->load->view('user/element/v_header');
                            $this->load->view('user/element/menu_top');
                            $this->load->view('user/element/menu_chart_top');
                            $this->load->view('user/element/v_memberlogin',$data);
							 echo "<meta http-equiv='refresh' content='0; url=".base_url()."member/register'>";
							}
							else 
							{
							echo "gagal";
							show_error($this->email->print_debugger());
							}
						
					}	
					else
					{
					redirect("user/main");
					}
						
    	}
	
		
    public function listmember($limit='',$offset='') {  
			if ($this->session->userdata('login') == TRUE ) {
				    if ($limit=='') {
                                 $limit  = 0 ; 
                                 $offset = 6 ;
                            }
                            if($limit!='')
                            { 
                                $limit  = $limit ;
                                $offset = $this->offset ;
                            }

                            	$data['count']			= $this->produk->countmember(); 
								$config['base_url']		= base_url('produk/listmember');
								$config['total_rows'] 	= $data['count'];
								$config['per_page'] 	= $this->limit;
								$config['cur_tag_open']     = '<span>';
								$config['cur_tag_close']    = '</span>'; 
								$this->pagination->initialize($config);
								$data['query']			= $this->produk->listmember($limit,$offset);


						$this->load->view('admin/element/v_header');
				       	$this->load->view('admin/element/menu_top');
				       	$this->load->view('admin/element/menu_chart_top');
				       	$this->load->view('admin/element/menu_nav_left');
				        $this->load->view('admin/pages/v_member',$data);
			} 
			else 
				{
				redirect('admin');
				  
			}
		}
				
		
        public function listkonfirmasi($limit='',$offset='') {  
			if ($this->session->userdata('login') == TRUE ) {
				    if ($limit=='') {
                                 $limit  = 0 ; 
                                 $offset = 6 ;
                            }
                            if($limit!='')
                            { 
                                $limit  = $limit ;
                                $offset = $this->offset ;
                            }

                            	$data['count']			= $this->produk->countlistkonfirmasi(); 
								$config['base_url']		= base_url('produk/listkonfirmasi');
								$config['total_rows'] 	= $data['count'];
								$config['per_page'] 	= $this->limit;
								$config['cur_tag_open']     = '<span>';
								$config['cur_tag_close']    = '</span>'; 
								$this->pagination->initialize($config);
								$data['query']			= $this->produk->listkonfirmasi($limit,$offset);


						$this->load->view('admin/element/v_header');
				       	$this->load->view('admin/element/menu_top');
				       	$this->load->view('admin/element/menu_chart_top');
				       	$this->load->view('admin/element/menu_nav_left');
				        $this->load->view('admin/pages/v_konfirmasi',$data);
			} 
			else 
				{
				redirect('admin');
				  
			}
		}
		
	public function searchreport()
		{
				$start	= $this->input->post('startdate');
				$end	= $this->input->post('enddate');
				$data['query'] = $this->produk->listcetakan($start,$end);
				$this->load->view('admin/pages/v_cetakpenjualan_print',$data);
		}
		
}