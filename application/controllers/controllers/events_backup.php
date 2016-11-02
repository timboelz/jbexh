<?if( ! defined('BASEPATH')) exit('No direct script access allowed');
class events extends ci_controller {
		
		var $gallerypath;
		var $gallery_path_url;

	public function __construct() {
		
		parent::__construct();
		$this->load->model('mevents','event',TRUE);
		$this->load->helper(array('html','url')); 
		$autoload['helper'] = array('url');
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

                            	$data['count']			= $this->event->countevents(); 
								$config['base_url']		= base_url('events/index');
								$config['total_rows'] 	= $data['count'];
								$config['per_page'] 	= $this->limit;
								$config['cur_tag_open']     = '<span>';
								$config['cur_tag_close']    = '</span>'; 
								$this->pagination->initialize($config);
								//$data['query']			= $this->event->listevents($limit,$offset);

						$gallerypath 		= base_url().'asset/images/source';
						$gallery_path_url	= base_url().'asset/images/';

						$data['gallerypath'] = $gallerypath;
						$data['gallery_path_url'] = $gallery_path_url;

						$data['listevents']	= $this->event->listevents($limit,$offset);						
						
						$this->load->view('admin/element/v_header');
                        $this->load->view('admin/element/menu_top');
                        $this->load->view('admin/element/menu_left');
						$this->load->view('admin/pages/v_list_events',$data);

			} 
			else 
				{
				redirect('admin');
				  
			}
		}
	
	function eventdetail($limit='',$offset='') {  
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

                            	$data['count']			= $this->event->countevents(); 
								$config['base_url']		= base_url('events/index');
								$config['total_rows'] 	= $data['count'];
								$config['per_page'] 	= $this->limit;
								$config['cur_tag_open']     = '<span>';
								$config['cur_tag_close']    = '</span>'; 
								$this->pagination->initialize($config);
								//$data['query']			= $this->event->listevents($limit,$offset);

						$gallerypath 		= base_url().'asset/images/source';
						$gallery_path_url	= base_url().'asset/images/';

						$data['gallerypath'] = $gallerypath;
						$data['gallery_path_url'] = $gallery_path_url;

						$data['listevents']	= $this->event->listevents($limit,$offset);						
						
						$this->load->view('admin/element/v_header');
                        $this->load->view('admin/element/menu_top');
                        $this->load->view('admin/element/menu_left');
						$this->load->view('admin/pages/v_list_events_detail',$data);

			} 
			else 
				{
				redirect('admin');
				  
			}
		}
	

   function addform($events_id='')  {
	  		if ($this->session->userdata('login') == TRUE ) {
				
						$data['generate_events_id']=$this->event->generate_events_id(); 
						$this->load->view('admin/element/v_header');
                        $this->load->view('admin/element/menu_top');
                        $this->load->view('admin/element/menu_left');
						$this->load->view('admin/pages/add_events',$data);
          		}
          		else
          		redirect("events");
			}
			
	public function upload() {
		
		// echo "<pre>"; 
		// print_r($_FILES['event_pic']);
		// print_r($_FILES['event_pic_plan']); //die;
		
				if(isset($_FILES['event_pic'])) 
					{
					    $config['upload_path'] = './asset/brosur_image';
						$config['allowed_types'] = 'gif|jpg|png|bmp';
						$this->load->library('upload', $config);
						if($this->upload->do_upload('event_pic') and $this->upload->do_upload('event_pic_plan'))
						{
								$image_data 			= $this->upload->data();
								$event_id	 			= $this->input->post('generate_events_id');
								$event_name 			= $this->input->post('event_name');
								$event_address 			= $this->input->post('event_address');
								$event_location			= $this->input->post('event_location');
								$event_date 			= $this->input->post('event_date');
								$event_desc_lat_bel 	= $this->input->post('event_desc_lat_bel');
								$event_desc_tujuan 		= $this->input->post('event_desc_tujuan');
								$event_desc_target 		= $this->input->post('event_desc_target');
								$event_desc_kegiatan	= $this->input->post('event_desc_kegiatan');
								$event_desc_promosi 	= $this->input->post('event_desc_promosi');
								$event_desc_fasilitas 	= $this->input->post('event_desc_fasilitas');
								$event_pic   			= $_FILES['event_pic']['name'];
								$event_pic_plan			= $_FILES['event_pic_plan']['name'];
								
							$data_header = array(
				                'event_id' 				=> $event_id 			,
								'event_name' 			=> $event_name 			,	
								'event_address' 		=> $event_address 		,	
								'event_location'		=> $event_location		,
								'event_date' 			=> $event_date 			,	
								'event_pic'   			=> $event_pic   		,
								'event_pic_plan'		=> $event_pic_plan   			

				                );    
							$data_detail = array(
				                //'event_id' 				=> $event_id 			,
								'event_id' 				=> $event_id,
								'event_desc_lat_bel' 	=> $event_desc_lat_bel 	,
								'event_desc_tujuan' 	=> $event_desc_tujuan 	,	
								'event_desc_target' 	=> $event_desc_target 	,	
								'event_desc_kegiatan'	=> $event_desc_kegiatan	,
								'event_desc_promosi' 	=> $event_desc_promosi 	,
								'event_desc_fasilitas' 	=> $event_desc_fasilitas

				                );    
								
								// $str = $this->db->insert_string('tbl_event', $data_header); 
								// $str2 = $this->db->insert_string('tbl_event_detail', $data_detail); 
								
								// echo "<pre>";
								// echo $str; echo "\r\n";
								// echo $str2; echo "\r\n";  die;
								
								$this->db->trans_start();
								$this->db->insert('tbl_event',$data_header);
								//insert into table 2
								$this->db->insert('tbl_event_detail',$data_detail);
								$this->db->trans_complete(); 
								
								//$this->db->_insert();    die;

								

									echo img(array(
											'src'=>site_url("asset/brosur_image/$image_data[file_name]"),
											'width'=>200,
											'style'=>'margin-top:10px; padding:10px; background:#bbb'
										)); 
							}
							
							redirect("events");
						}
					
					else 
						echo "gagal";
				} 
				

		
     function editform($event_id='') {
             if ($this->session->userdata('login') == TRUE ) {
				 
				 if($event_id!='') 
                    {
						
					 $info=$this->event->getevents($event_id);    
					 
					 // echo "<pre>";
					 // print_r($info); //die;
					 $data['infouser']['event_id']	 			= $info->event_id	 			;
					 $data['infouser']['event_name'] 			= $info->event_name 		    ;
					 $data['infouser']['event_date'] 			= $info->event_date 		    ;
					 $data['infouser']['event_pic'] 			= $info->event_pic 			    ;
					 $data['infouser']['event_pic_plan']		= $info->event_pic_plan 	    ;
					 $data['infouser']['event_address'] 		= $info->event_address 		    ;
					 $data['infouser']['event_location'] 		= $info->event_location 	    ;
					                                                                            
					 $data['infouser']['event_desc_lat_bel'] 	= $info->event_desc_lat_bel     ;
					 $data['infouser']['event_desc_tujuan'] 	= $info->event_desc_tujuan 	    ;
					 $data['infouser']['event_desc_target'] 	= $info->event_desc_target 	    ;
					 $data['infouser']['event_desc_kegiatan']	= $info->event_desc_kegiatan    ;
					 $data['infouser']['event_desc_promosi'] 	= $info->event_desc_promosi     ;
					 $data['infouser']['event_desc_fasilitas'] 	= $info->event_desc_fasilitas   ;
					
				   
                    }
				 
						$this->load->view('admin/element/v_header');
                        $this->load->view('admin/element/menu_top');
                        $this->load->view('admin/element/menu_left');
						$this->load->view('admin/pages/edit_events',$data);
          		}
          		else
          		redirect("events");
			}
			
     function editevents() {
		 
		 // echo "<pre>";
		 // print_r($_POST);
		// print_r($_FILES['event_pic']);
		// print_r($_FILES['event_pic_plan']); //die;
		 
			$event_id 				= $this->input->post('event_id');
			$event_pic 				= $_FILES['event_pic']['name'];
			$event_pic_plan 		= $_FILES['event_pic_plan']['name'];
           
     	    if (empty($event_pic) and empty($event_pic_plan) ) 
                {
					$this->event->update_event_list($event_id,'FALSE');
					$this->event->update_event_list2($event_id);
					redirect('events/');
				} 
			else if ( empty($event_pic_plan) )
                     
                    {
                        $config['upload_path'] = './asset/brosur_image';
						$config['allowed_types'] = 'gif|jpg|png|bmp';
						$this->load->library('upload', $config);
						$this->upload->do_upload('event_pic');
						$image_data = $this->upload->data();
			
							$this->event->update_event_list($event_id,'TRUE');
							$this->event->update_event_list2($event_id);
                            redirect("events");
				
                }
			else if ( empty($event_pic) )
                     
                    {
                        $config['upload_path'] = './asset/brosur_image';
						$config['allowed_types'] = 'gif|jpg|png|bmp';
						$this->load->library('upload', $config);
						$this->upload->do_upload('event_pic_plan');
						$image_data = $this->upload->data();
			
							$this->event->update_event_list($event_id,'TRUE_TRUE');
							$this->event->update_event_list2($event_id);
                            redirect("events");
				
                }

        }


	public function deleteevents($event_id) 
        {
        $this->event->delete_events($event_id);
        redirect ("events");
        }
		
}

?>