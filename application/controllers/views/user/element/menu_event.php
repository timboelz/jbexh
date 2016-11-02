
      			
      		
      		
      		<!-- right content column-->
      		<div class="col-md-7" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:rgb(119,204,221);color:#fff;">Job Event</div>   
              	<div class="panel-body">
                  
				  <?php 
				  //echo $query;
				  print_r( $this->session->userdata('level') );
			
		foreach( $listevents->result_array() as $row ) {
					$createDate = new DateTime( $row['event_date'] );

					$strip = $createDate->format('d-m-Y');
					$strip = '( '.$strip.' )'
					 ?>
					  
					 <div class="panel-heading" style="background-color:#d9edf7;" > 
						<?php echo $row['event_name']; ?>  
						<div style="float:right;" > 
							<?php echo $row['month']; ?>
						</div>
					 </div>
				   <br>				  
                <div class="row">
                   <div class="col-md-8">
						<div class="panel-body">
						<p class="text-justify">
							<?php echo $row['event_desc_lat_bel']; ?> 
						</p> 
						<a href="<?php echo site_url('user/detail/'.$row['event_id']) ?>"><button class="btn btn-default">Selengkapnya...</button></a>
						</div>
                   </div> 
                   <div class="col col-sm-4">
						<a href="<?php echo base_url('asset/brosur_image/'.$row['event_pic']) ?>" title=" <?php echo $row['event_name'] .' / '. $strip;?> class="preview">						
						<img id="imgzoom" class="img-responsive" src="<?php echo base_url('asset/brosur_image/'.$row['event_pic'])?>" />
						</a>  
						<div class="text-muted">
							<small>
							<p>
								<?php echo $row['event_name'] ; ?> 
							</p>
							<p>
								<?php echo $strip; ?> 
							</p>
							</small>
						</div>
						<hr>
				    </div>   
                </div>
                  <hr>
					<h2>Tujuan</h2>
					<ol>
					<?php 
						$tujuan = explode( ';', $row['event_desc_tujuan'] );						
						foreach ( $tujuan as $xx) {
							echo "<li>"; 
							echo $xx; 
							echo "</li>";
						}  ?>	
					</ol><hr noshade>			  
		<? } ?>
				 
				<div class="panel panel-default">
				 <!--<div class="panel-heading" style="background-color:#77CCDD;color:#fff;">Latest Jobs</div>  -->
				  <!--<div class="panel-heading" style="background-color:#d9edf7;">Latest Jobs</div>  -->
				   <br>				  
					  <div class="table-responsive">
											  <table class="table table-hover ">
											  <thead>
											  <tr class="info">
												  <th>Ref </th>
												  <th>Position </th>
												  <th>Specialization </th>
												  <th>Sub Specialization </th>
												  <th>Job </th> 
												  
											  </tr>
											  </thead>
											  <tbody>
								<?php 
								foreach( $list_vacancy->result_array() as $va=>$row ) {
								?>
													  <tr>
														  <td> <?php echo $row['id']; ?> </td>
														  <td> <?php echo $row['posisi']; ?>  </td>
														  <td> <?php echo $row['spesialisasi']; ?> </td>
														  <td> <?php echo $row['sub_spesialisasi']; ?> </td>
														  <td> 
														  <a class="href_apply" id="hrf_apply_<?php echo $va; ?>" name="hrf_apply_<?php echo $va; ?>" href="<?php echo site_url('user/addUserApply/'.$row['id']) ?>">
														   <?php 
														  if (	 	$this->session->userdata('level') === 'user' 
																and $this->session->userdata('login') === TRUE  ) {
														  ?>
														  Apply
														  </a>
														  <?PHP } ?>
														  </td>
													  </tr>
								<?php } ?>
											  </tbody>
										  </table>
						
					  </div>
				</div> 
                <br>  
                  
     <!--           
                  <h2>CSS3</h2>
                  <img src="//placehold.it/150x100/EEEEEE" class="img-responsive pull-right">
                  To understand the RWD approach, you must first understand CSS - the basis of responsive design. CSS enables the developer to use percentage-based (AKA fluid or proportion-based) grids, CSS3 media queries. The web site then adapts to multiple devices (desktop, laptop, tablet, smartphone) and display conditions such as browser size and screen resolution.
                  <br><br>
                  <button class="btn btn-default">More</button>
                  <hr> 
                  <div class="well"> 
                    <h1>Well..</h1>
                    Does anyone know why <a href="#">@mdo</a> or <a href="#">@fat</a> would name this element a "well"?
                  </div>
  -->
                  <hr>
                  <h2>Media Partner</h2>
                  <div class="row">
                    <div class="col-md-3 col-sm-6 col-6">
                      <a href="#"><img  src="<?php echo base_url('asset/logo/ilma.jpg')?>" class="img-responsive"></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6">
                      <a href="#"><img  src="<?php echo base_url('asset/logo/inapay.jpg')?>" class="img-responsive"></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6">
                      <a href="#"><img  src="<?php echo base_url('asset/logo/oracle.jpg')?>" class="img-responsive"></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6">
                      <a href="#"><img  src="<?php echo base_url('asset/logo/riodesign.jpg')?>" class="img-responsive"></a>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3 col-sm-6 col-6">
                      <a href="#"><img  src="<?php echo base_url('asset/logo/idwebhost.png')?>" class="img-responsive"></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6">
                      <a href="#"><img  src="<?php echo base_url('asset/logo/aora.jpg')?>" class="img-responsive"></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6">
                      <a href="#"><img  src="<?php echo base_url('asset/logo/fxtm.jpg')?>" class="img-responsive"></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6">
                      <a href="#"><img  src="<?php echo base_url('asset/logo/huawei.jpg')?>" class="img-responsive"></a>
                    </div>
                  </div>
                  <hr>
                  </div>
                </div>
      	</div> 
		
		
		
	
      		<div class="col-md-3">
              <div class="panel" id="midCol">
                <div class="panel-heading" style="background-color:rgb(119,204,221);color:#eee;">Perusahaan Partner </div> 
                <div class="panel-body">
                  
                  <img class="img-responsive"  src="<?php echo base_url('asset/logo/all.jpg')?>">
                  <!--
                  <div class="well">
                          <img src="http://s.bootply.com/assets/example/bg_iphone.png" class="img-responsive">
                          <h3><a href="http://getbootstrap.com">Bootstrap 3 is Here.</a></h3>
                          <p>
                          In simple terms, a responsive web design figures out what resolution of
                          device it's being served on. Flexible grids then size correctly to fit
                          the screen.
                          </p>
                          <p><a href="http://www.bootply.com/bootstrap-3-migration-guide" target="ext">Read our migration guide for help with upgrading to Bootstrap 3.</a></p>
                  </div>
                  -->
                  <hr>
                  
                  
				  <!--<div class="panel-heading" style="background-color:#77CCDD;color:#eee;">Lowongan Yang Tersedia</div> 
				  <div class="panel-heading" style="background-color:#eee;">Lowongan Yang Tersedia</div> 
                  <h5><a href="#"><i class="glyphicon glyphicon-ok"></i> PT CAHAYA IINDAH</a></h5>
                  <h5><a href="#"><i class="glyphicon glyphicon-ok"></i> PT ASTRA INTERNATIONAL</a></h5>
                  <h5><a href="#"><i class="glyphicon glyphicon-ok"></i> PT YKK</a></h5>
                  <h5><a href="#"><i class="glyphicon glyphicon-ok"></i> PT KALBE FARMA</a></h5> -->
                  
                
				  <div class="clearfix single_sidebar">
							<div class="popular_post">
								 <div class="panel-heading" style="background-color:#d9edf7;">Lowongan Yang Tersedia</div> 
								 <br>
							</div>
				  </div>
                  <div class="media">
                    <a class="pull-left" href="#">
                      <img class="media-object"  src="<?php echo base_url('asset/images/80x80/astrido.jpg')?>">
                    </a>
                    <div class="media-body">
                      <h5 class="media-heading"><a href="#" target="ext" class="pull-right"><i class="glyphicon glyphicon-share"></i></a> 
							<a href="#"><strong>PT Astrido</strong></a></h5>
							<small>20 Desember 2015 - 23 Desember 2015</small><br>
                      <span class="badge">2 Position</span>
                    </div>
                  </div>
                  <div class="media">
                    <a class="pull-left" href="#">
                      <img class="media-object" src="<?php echo base_url('asset/images/80x80/frisian-flag.jpg')?>">
                    </a>
                    <div class="media-body">
                      <h5 class="media-heading"><a href="/tagged/slider" target="ext" class="pull-right"><i class="glyphicon glyphicon-share"></i></a> <a href="#"><strong>PT Frisian Flag</strong></a></h5>
                      <small>02 Oktober - 05 Oktober 2015.</small><br>
                      <span class="badge">2 Position</span>
                    </div>
                  </div>
                  <div class="media">
                    <a class="pull-left" href="#">
                      <img class="media-object" src="<?php echo base_url('asset/images/80x80/bri.jpg')?>">
                    </a>
                    <div class="media-body">
                      <h5 class="media-heading"><a href="/tagged/typography" target="ext" class="pull-right"><i class="glyphicon glyphicon-share"></i></a> <a href="#"><strong>PT Bank Rakyat Indonesia Tbk</strong></a></h5>
                      <small>02 September - 05 September 2015.</small><br>
                      <span class="badge">4 Position</span>
                    </div>
                  </div>
                  <div class="media">
                    <a class="pull-left" href="#">
					  <img class="media-object" src="<?php echo base_url('asset/images/80x80/bfi.jpg')?>" />
                    </a>
                    <div class="media-body">
                      <h5 class="media-heading"><a href="/tagged/media" target="ext" class="pull-right"><i class="glyphicon glyphicon-share"></i></a> <a href="#"><strong>PT BFI</strong></a></h5>
                      <small>15 September - 18 September 2015</small><br>
                      <span class="badge">9 Position</span>
                    </div>
                 </div>
                  
               </div> 
               </div>
      		</div> 
		
		
  	</div>
</div>

<script>

</script>