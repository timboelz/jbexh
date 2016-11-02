

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Event Schedule</h1>
			</div>
		</div><!--/.row-->
			
		<?php 
		//$listevents = json_decode($listevents);
		//echo "<pre>";
		//$data = $this->curl->simple_get('events/show_events');
		//echo site_url('events/show_events'); 
		
		//echo $data;
		// foreach ($listevents->result_array() as $list) {
		// echo $list['event_name'] ;
		// } 
		 ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
				
					<div class="panel-body">

						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1"  data-sort-name="name" data-sort-order="desc">
						<thead>
						    <a class="btn btn-small" href="<?php echo site_url('events/addform') ?>"> Add Event </a>
							<tr>
								<th >Event ID </th>
						        <th >Nama Event</th>
								<th >Alamat Event</th>
								<th >Lokasi Event</th>
								<th >Tanggal Event</th>
								<th >Latar Belakang Event</th>
						        <th >Tujuan Event</th>
								<th >Target Acara</th>
								<th >Bentuk Kegiatan</th>
								<th >Promosi Dan Publikasi</th>
								<th >Fasilitas</th>
								<th >Brosur Job Fair</th>
								<th >Denah Job Fair</th>
								<th >Act</th>
						    </tr>
						    </thead>
							<tbody>
                  <?php
                  $no=1;
                     if(!empty($listevents) )
						 
						 // echo "<pre>";
						 // print_r($listevents->result_array()); die;
						 
                        { foreach($listevents->result_array() as $row) 
                          { ?> 
                              <tr>
								  <td><?php echo $row['event_id']?>				</td>
								  <td><?php echo $row['event_name']?>			</td>
								  <td><?php echo $row['event_address']?>		</td>
								  <td><?php echo $row['event_location']?>		</td>
								  <td><?php echo $row['event_date']?>			</td>
								  <td><?php echo $row['event_desc_lat_bel']?>	</td>
								  <td><?php echo $row['event_desc_tujuan']?>	</td>
								  <td><?php echo $row['event_desc_target']?>	</td>
								  <td><?php echo $row['event_desc_kegiatan']?>	</td>
								  <td><?php echo $row['event_desc_promosi']?>	</td>
								  <td><?php echo $row['event_desc_fasilitas']?>	</td>
								  <td>
									<img src="<?php echo base_url('asset/brosur_image/'.$row['event_pic'])?>" width="70" />
								  </td>
								  <td>
									<img src="<?php echo base_url('asset/brosur_image/'.$row['event_pic_plan'])?>" width="70" />
								  </td>
                              <td align="center">
								<div  align="center" >
									<a class="btn btn-primary btn-xs" href="<?php echo site_url('events/editform/'.$row['event_id'])?>"><i class="icon-pencil"></i> Edit</a> &nbsp;
									<a class="btn btn-danger btn-xs" href="<?php echo site_url('events/deleteevents/'.$row['event_id']);?>"
									   onclick="return confirm('Anda yakin?')"> <i class="icon-remove"></i>Delete</a>
									<? } ?> 
                                 </div> 
                              </td>
                          </tr>
                            
                      <?php }
                  
                  ?>
                  <tr><th COLSPAN="11"> Jumlah Data : <?php echo $count ?></th></tr>  
                  </tbody>
						</table>
					
				<div class="fixed-table-pagination">
				  <div class="pull-left pagination-detail">	
					<div class="pull-right pagination">
					 <ul class="pagination"> 
					   <li><?php echo $this->pagination->create_links(); ?></li>
					  </ul>
				  </div>
				</div>
				<div class="clearfix"></div>
				</div>
				</div>
				</div>
			</div>
		</div><!--/.row-->			
	</div><!--/.main-->
