<?php
Class mevents extends CI_Model {

		var $gallerypath;
		var $gallery_path_url;
	function __constuct() {
		parent::__constuct();  // Call the Model constructor 
		//loader::database();    // Connect to current database setting.
		

		$this->gallerypath = realpath(APPPATH . 'gambar');
		$this->gallery_path_url = base_url().'gambar/';
	}

	function countevents($id=''){
            $jumlah='';
            $query=$this->db->query("select count(1) as jumlah from tbl_event ");
                 if ($query->num_rows() > 0) {
                    foreach ($query->result() as $data) {
                    $jumlah=$data->jumlah;
                    }
                    return $jumlah;
                }
        }
	
	
	function listevents($limit=0,$offset=0) {
		$sql = $this->db->query("SELECT 
								  te.event_id,
								  te.event_name,
								  te.event_address,
								  te.event_location,
								  te.event_date,
								  te.event_pic,
								  te.event_pic_plan,
								  ted.event_desc_lat_bel,
								  ted.event_desc_tujuan,
								  ted.event_desc_target,
								  ted.event_desc_kegiatan,
								  ted.event_desc_promosi,
								  ted.event_desc_fasilitas
							 FROM tbl_event te 
								  INNER JOIN tbl_event_detail ted ON te.event_id=ted.event_id
								  ORDER BY te.event_date
								  ASC LIMIT $limit ,$offset ");
		return $sql;
		
		 // $xx = $sql->result_array();
		 // return json_encode($xx);
	}
	
	function listeventsdetail($event_id) {
		$sql = $this->db->query("SELECT 
								  te.event_id,
								  te.event_name,
								  te.event_address,
								  te.event_location,
								  te.event_date,
								  te.event_pic,
								  te.event_pic_plan,
								  ted.event_desc_lat_bel,
								  ted.event_desc_tujuan,
								  ted.event_desc_target,
								  ted.event_desc_kegiatan,
								  ted.event_desc_promosi,
								  ted.event_desc_fasilitas
							 FROM tbl_event te 
								  INNER JOIN tbl_event_detail ted ON te.event_id=ted.event_id
								  where te.event_id = '$event_id' ORDER BY te.event_date ASC  ");
		return $sql;
	}
   
	
	 function generate_events_id(){
        $q = $this->db->query("select max(right(event_id,2)) as event_id_max from tbl_event");
        $kd = "";
        if($q->num_rows()>0)	{
            foreach($q->result() as $k){
				//var_dump($k->event_id_max);
                $tmp = ((int)$k->event_id_max)+1;
				//var_dump($tmp);
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
		$today = date("Ymd");
		//echo $today."_".$kd;
		//die;
        return $today."_".$kd;
    	}


    function insertevents($data){
        $query = $this->db->insert('tbl_event',$data);
		
		//$this->db->_compile_select();  /* SELECT */
		//$this->db->_insert();          /* INSERT */
		//$this->db->_update();          /* UPDATE */
		//die;
        return $query;
    }

    
    function updateevents($kode_events,$data) {
        $this->db->where('kode_events',$kode_events);
        $update = $this->db->update('tbl_event',$data);
        return $update;
    }
    
    function updatemember($kode_user,$data){
        $this->db->where('kode_user',$kode_user);
        $update = $this->db->update('tbl_user',$data);
        return $update;
    }    
    
    
    function delete_events($event_id)
        {
		// $ff = "delete from tbl_event where event_id='$event_id'";
		// echo $ff; die;
        $delete = $this->db->query("delete from tbl_event where event_id='$event_id'");
        return $delete;
        }
    
   
        
    function getevents($event_id) {
        $query = $this->db->query("
								  SELECT 
								  te.event_id,
								  te.event_name,
								  te.event_address,
								  te.event_location,
								  te.event_date,
								  te.event_pic,
								  te.event_pic_plan,
								  ted.event_desc_lat_bel,
								  ted.event_desc_tujuan,
								  ted.event_desc_target,
								  ted.event_desc_kegiatan,
								  ted.event_desc_promosi,
								  ted.event_desc_fasilitas
							 FROM tbl_event te 
								  INNER JOIN tbl_event_detail ted ON te.event_id=ted.event_id
								  where te.event_id='$event_id' ORDER BY te.event_date
								  ASC ");
        return $query->row();
    }
    
     function getmember($kode_user) {
        $query = $this->db->query("select * from tbl_user where kode_user ='$kode_user'");
        return $query->row();
    }
        
    function update_event_list( $kode_events, $pic )  {
		
		//echo $this->input->post('event_address')         ; echo "<br>";
		
			$event_id				=	$this->input->post('event_id')			;
			$event_name				=	$this->input->post('event_name')        ;
			$event_address			=	$this->input->post('event_address')     ;
			$event_location			=	$this->input->post('event_location')    ;
			$event_date				=	$this->input->post('event_date')        ;
			$event_pic				=	$this->input->post('event_pic')         ;
			$event_pic_plan			=	$this->input->post('event_pic_plan')    ;
			  
			 
			 if ( $pic == 'FALSE' ) {
				  $data		=	array(	'event_name'		=>$event_name,
										'event_address'		=>$event_address,
										'event_location'	=>$event_location,
										'event_date'		=>$event_date	);
			 } 
			 if ( $pic == 'TRUE' ) {
				  $data		=	array(	'event_name'		=>$event_name,
										'event_address'		=>$event_address,
										'event_location'	=>$event_location,
										'event_date'		=>$event_date,
										'event_pic'			=>$_FILES['event_pic']['name']
										
										);
			 }
			 if ( $pic == 'TRUE_TRUE' ) {
				  $data		=	array(	'event_name'		=>$event_name,
										'event_address'		=>$event_address,
										'event_location'	=>$event_location,
										'event_date'		=>$event_date,
										'event_pic_plan'	=>$_FILES['event_pic_plan']['name']
										
										);
			 }
			// echo "<pre>";
			// print_r($pic);
			 // print_r($data); die;
			 
			$this->db->where('event_id',$event_id);
	
	
	// $where = 'event_id = '.$event_id;
	// $str = $this->db->update_string('tbl_event', $data,$where);
	// echo $str ; echo "\r\n"; //die;
	
	$update = $this->db->update('tbl_event',$data);
	return $update;
	 
	 // $sql = "update tbl_event set 
						// event_name		=	'$event_name',
						// event_address	=	'$event_address', 
						// event_location	=	'$event_location',
						// event_date		=	'$event_date'
						// where 
						// event_id		=	'$event_id'
					// ";
				
	 // $sql2 = "update tbl_event_detail set 
						// event_desc_lat_bel			=	'$event_desc_lat_bel',
						// event_desc_tujuan			=	'$event_desc_tujuan',
						// event_desc_target			=	'$event_desc_target', 
						// event_desc_kegiatan			=	'$event_desc_kegiatan',
						// event_desc_promosi			=	'$event_desc_promosi'
						// event_desc_fasilitas		= 	'$event_desc_fasilitas'
						// where 
						// event_id		=	'$event_id'
					// ";
	//echo "<pre>";
	//echo $sql2; die;
	 
	// $update_tbl_event =  $this->db->query(" UPDATE tbl_event 
											// set 
											// event_name		=	'$event_name',
											// event_address	=	'$event_address', 
											// event_location	=	'$event_location',
											// event_date		=	'$event_date'
											// where 
											// event_id		=	'$event_id'
										  // ");
										  
	// $update_tbl_event =  $this->db->query(" UPDATE tbl_event_detail 
											// set 
											// event_desc_lat_bel			=	'$event_desc_lat_bel',
											// event_desc_tujuan			=	'$event_desc_tujuan',
											// event_desc_target			=	'$event_desc_target', 
											// event_desc_kegiatan			=	'$event_desc_kegiatan',
											// event_desc_promosi			=	'$event_desc_promosi'
											// event_desc_fasilitas		= 	'$event_desc_fasilitas'
											// where 
											// event_id					=	'$event_id'
										 // ");

	}
        
    function update_event_list2() {
		
		$event_id				=	$this->input->post('event_id')    ;
		$event_desc_lat_bel		=	$this->input->post('event_desc_lat_bel')    ;
		$event_desc_tujuan		=	$this->input->post('event_desc_tujuan')     ;
		$event_desc_target		=	$this->input->post('event_desc_target')     ;
		$event_desc_kegiatan	=	$this->input->post('event_desc_kegiatan')   ;
		$event_desc_promosi		=	$this->input->post('event_desc_promosi')    ;
		$event_desc_fasilitas	=	$this->input->post('event_desc_fasilitas')  ;
		
		$data	=array(	'event_desc_lat_bel'		=>	$event_desc_lat_bel,
						'event_desc_tujuan'			=>	$event_desc_tujuan,
						'event_desc_target'			=>	$event_desc_target, 
						'event_desc_kegiatan'		=>	$event_desc_kegiatan,
						'event_desc_promosi'		=>	$event_desc_promosi,
						'event_desc_fasilitas'		=> 	$event_desc_fasilitas
					  );
					  
		$this->db->where('event_id',$event_id);
		
		// $where = 'event_id = '.$event_id;
		//echo $str ; echo "\r\n"; die;
			
		$update = $this->db->update('tbl_event_detail',$data);
		return $update;									
		
	}
	
    function getprint($kode_transaksi) {   
        $query=$this->db->query(" SELECT 
                                    kode_transaksi,
                                    tgl_jual,
                                    total,
                                    kode_events,
                                    jumlah,
                                    nama_events,
									harga,
                                    ttlharga
                        FROM (
				            SELECT 
                                    th.kode_transaksi,
                                    th.tgl_jual,
                                    th.total,
                                    td.kode_events,
                                    td.jumlah,
                                    tp.nama_events,
									tp.harga,
				                    (tp.harga * td.jumlah) AS ttlharga
                                    FROM tbl_transaksi_header AS th
                                    INNER JOIN tbl_transaksi_detail AS td ON th.kode_transaksi=td.kode_transaksi
                                    INNER JOIN tbl_event AS tp ON td.kode_events = tp.kode_events
									where th.kode_transaksi='".$kode_transaksi."'
                                    )a");

           if ($query->num_rows() > 0) {
                foreach ($query->result() as $data) {
                    $datac[]=$data;
                    }
                return $datac;
                }
        }       


    function do_upload() {
		$konfigurasi = array(
			'allowed_types' =>'jpg|jpeg|gif|png|bmp',
			'upload_path' => $this->gallerypath
		);
		$this->load->library('upload', $konfigurasi);
		$this->upload->do_upload();
		$datafile = $this->upload->data();
	
		$konfigurasi = array(
			'source_image' => $datafile['full_path'],
			'new_image' => $this->gallerypath . '/thumbnails',
			'maintain_ration' => true,
			'width' => 160,
			'height' =>120
		);

		$this->load->library('image_lib', $konfigurasi);
		$this->image_lib->resize();
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$tanggal = date('Y-m-d');
		$userfile = $_FILES['picture']['name'];
		$data = array(
	                        //'kd_events'=> $this->mmasterbarang->getkodebarang(),
	                        'nama_events'=>$this->input->post('nm_events'),
	                        'kode_events'=>$this->input->post('kodeevents'),
	                        'id_kategori'=>$this->input->post('id_kategori'),
	                        'harga'=>$this->input->post('harga'),
	                        'stok'=>$this->input->post('stok'),
	                        'deskripsi'=>$this->input->post('deskripsi'),
	                        'gbr_besar'      =>$userfile
	                    );      
		$this->events->insertevents($data);
	                    redirect("events");
		//$this->db->insert('events', $data);
	}
	
	function verifyemailaddress($verificationcode)
		{  
			  $sql = "update tbl_user set level='member' WHERE kode_verifikasi=?";
			  $this->db->query($sql, array($verificationcode));
			  return $this->db->affected_rows(); 
		}
	
	function emailcheck($email)
		{			
		    $wherecondition 					= $array = array('email' => $email);
		    $this->db->where($wherecondition); 
		    $query 								= $this->db->get('tbl_user');			
		 return $query->result();		
		}
}
 
?>
