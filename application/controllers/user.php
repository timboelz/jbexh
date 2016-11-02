<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
            session_start();
            date_default_timezone_set('asia/jakarta');
            $this->load->model('mevents','event',TRUE);
            $this->load->model('mmember', 'login', TRUE);
                    $this->load->library('fpdf');
                    $this->load->database();
                    define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
//        if ($this->session->userdata('login') != TRUE ) 
//            {
//                redirect('user');
//            } 
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
    
    
                var $limit  = 6;
                var $offset = 6; 
    function main($limit='',$offset='') 
    {  
	   $kat = $this->input->post('kategori');
            if ($limit=='') {
                                 $limit  = 0 ; 
                                 $offset = 6 ;
                            }
                            if($limit!='')
                            { 
                                $limit  = $limit ;
                                $offset = $this->offset ;
                            }
                            $data['count']              = $this->event->countevents();
                            $config['base_url']         = base_url().'user/main';
                            $config['total_rows']       = $data['count'];
                            $config['per_page']         = $this->limit;    
                            $config['cur_tag_open']     = '<span>';
                            $config['cur_tag_close']    = '</span>';        
                            $this->pagination->initialize($config);
		
                            $data['listevents']         = $this->event->listevents($limit,$offset); 
							$data['list_vacancy']       = $this->event->list_vacancy($limit,$offset); 

                 
							$data['pesan'] = '<div class="alert alert-warning alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"><span aria-                    
                                                    hidden="true">x</span><span class="sr-only">x</span></button>
                                                    <strong>!</strong> Anda berhasil melakukan Registrasi...
                                                    </div>';						
                            $this->load->view('user/element/v_header');
                            $this->load->view('user/element/menu_top');
                            $this->load->view('user/element/menu_event',$data);
                            $this->load->view('user/element/v_footer');
    }

    function detail($event_id='') 
    {  
	    if($event_id!='') 
                    {
            // if ($limit=='') {
                                 // $limit  = 0 ; 
                                 // $offset = 6 ;
                            // }
                            // if($limit!='')
                            // { 
                                // $limit  = $limit ;
                                // $offset = $this->offset ;
                            // }
                            $data['count']              = $this->event->countevents();
                            $config['base_url']         = base_url().'user/main';
                            $config['total_rows']       = $data['count'];
                            $config['per_page']         = $this->limit;    
                            $config['cur_tag_open']     = '<span>';
                            $config['cur_tag_close']    = '</span>';        
                            $this->pagination->initialize($config);
		
                            $data['query']              = $this->event->listeventsdetail($event_id); 

                 
							$data['pesan'] = '<div class="alert alert-warning alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"><span aria-                    
                                                    hidden="true">x</span><span class="sr-only">x</span></button>
                                                    <strong>!</strong> Anda berhasil melakukan Registrasi...
                                                    </div>';						
                            $this->load->view('user/element/v_header');
                            $this->load->view('user/element/menu_top');
                            $this->load->view('user/element/menu_event_detail',$data);
                            $this->load->view('user/element/v_footer');
				}
				else {
					
				}
	}
   
   function addCompReg($events_id='')  {
					$dataz  = $this->event->listeventsdetail($events_id); 
					foreach($dataz->result_array() as $row) { 
						$data['events_id'] 		= $row['event_id'] ; 
						$data['events_name'] 	= $row['event_name'] ; 
						
					}
					$this->load->view('admin/element/v_header');
					$this->load->view('admin/element/menu_top');
					$this->load->view('admin/pages/add_compreg',$data);
          		
	}
	
	function addUserApply($id)  {
					$dataz  = $this->event->list_vacancy($id); 
					foreach($dataz->result_array() as $row ) { 
					
						$data['id'] 				= $row['id'] ; 
						$data['posisi'] 			= $row['posisi'] ; 
						$data['spesialisasi'] 		= $row['spesialisasi'] ; 
						$data['sub_spesialisasi'] 	= $row['sub_spesialisasi'] ; 
						$data['requirements'] 		= $row['requirements'] ; 
						$data['job_desc'] 			= $row['job_desc'] ; 

					} 
					
					
					$this->load->view('admin/element/v_header');
					$this->load->view('admin/element/menu_top');
					$this->load->view('admin/pages/apply',$data);
          		
	}
	
	
	private function savecompreg(){
		
		if(isset($_FILES['image']))
		{
			
			$data=$_FILES['image'];
			$total = count($data['name']);
			$data2=array();
			for($i=0; $i<$total; $i++)
			{
				$data2[]=array(
					'name'=>$data['name'][$i],
					'type'=>$data['type'][$i],
					'tmp_name'=>$data['tmp_name'][$i],
					'error'=>$data['error'][$i],
					'size'=>$data['size'][$i],
				);
			}
			
			$no=0;
			foreach($data2 as $row)
			{
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'gif|jpg|png|bmp';
				$nmfile = "file_".time(); 
				$config['max_size'] = '3072'; 
				$config['max_width']  = '3000'; 
				$config['max_height']  = '4000';
				$config['file_name'] = $nmfile;
				$this->load->library('multi_upload', $config);
				
				if($this->multi_upload->do_upload($data2[$no]))
				{
					
					$config2['image_library'] = 'gd2'; 
					$config2['source_image'] = $this->multi_upload->upload_path.$this->multi_upload->file_name;
					$config2['new_image'] = './assets/uploads/resize/'; 
					$config2['maintain_ratio'] = FALSE;
					$config2['width'] = 100; 
					$config2['height'] = 80; 
					$config2['create_thumb'] = TRUE; 
					$config2['quality'] = '20%'; 
					$this->load->library('image_lib');
					$this->image_lib->initialize($config2);
					$this->image_lib->resize();
					 $this->image_lib->clear();	
				}				
				$no++;
			}
		
				$image_data 	= $this->upload->data();
				$event_id	 	= $this->input->post('generate_events_id');
				$event_pic   	= $_FILES['event_pic']['name'];
				$event_pic_plan	= $_FILES['event_pic_plan']['name'];
									
				$data_db = array (
					'event_id'		=>$this->input->post('event_id')	,
					'comp_name'		=>$this->input->post('comp_name')	,
					'comp_address'	=>$this->input->post('comp_address'),
					'hrd_name'		=>$this->input->post('hrd_name')	,
					'hrd_jab'		=>$this->input->post('hrd_jab')		,
					'ext_phone'		=>$this->input->post('ext_phone')	,
					'phone'			=>$this->input->post('phone')		,
					'pinbb'			=>$this->input->post('pinbb')		,
					'hp'			=>$this->input->post('hp')			,
					'email'			=>$this->input->post('email')		,
				);
				
				$this->db->trans_start();
				$this->db->insert('tbl_comp',$data_db);
				$this->db->trans_complete(); 
								
		}
	}
    
    public function clearsession() {
        $this->session->sess_destroy();
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        echo "<meta http-equiv='refresh' content='0; url=".base_url()."acara/main'>";
    }
    
    
}
