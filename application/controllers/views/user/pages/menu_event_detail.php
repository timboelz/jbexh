
      			
      		
      		
      		<!-- right content column-->
    <div class="col-md-10" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">Job Event</div>   
              	<div class="panel-body">
                  
				  <?php //echo $query;
			
		foreach ( $query->result_array() as $row ) {
					// echo "<pre>";
					// print_r($row);
					
					$createDate = new DateTime( $row['event_date'] );
					$strip = $createDate->format('d-m-Y');
					$strip = '( '.$strip.' )'
					 ?>
					  
					 <div class="panel-heading" style="background-color:#eee;" > 
						<?php echo $row['event_name']; ?>  
						<div style="float:right;" > 
							<?php echo $row['event_address'] .' - '.$strip; ?>
						</div>
					 </div>
				  <br>				  
                <div class="row">
                  <div class="col-md-8">
                    <div class="panel-body">
				
					<?php 
					//echo $row['event_desc_lat_bel']; 
						$tujuan = explode( ';', $row['event_desc_lat_bel'] );						
						foreach ( $tujuan as $xx) {
							echo "<p class='text-justify'>"; 
							echo $xx; 
							echo "</p>";
						}  ?>	
					<hr noshade>
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
				 
				<div>
					<h2>Tujuan</h2>
					<ol>
					<?php 
						$tujuan = explode( ';', $row['event_desc_tujuan'] );						
						foreach ( $tujuan as $xx) {
							echo "<li>"; 
							echo $xx; 
							echo "</li>";
						}  ?>	
					</ol>
				 </div>
					<hr noshade>
				<div>
					<h2>Target Acara</h2>
					<ol>
					<?php 
						$target = explode( ';', $row['event_desc_target'] );						
						foreach ( $target as $xx) {
							echo "<li>"; 
							echo $xx; 
							echo "</li>";
						}  ?>	
					</ol>
				</div>
					<hr noshade>
				<div>
					<h2>Bentuk Kegiatan</h2>
					<ol>
					<?php 
						$kegiatan = explode( ';', $row['event_desc_kegiatan'] );						
						foreach ( $kegiatan as $xx) {
							echo "<li>"; 
							echo $xx; 
							echo "</li>";
						}  ?>	
					</ol>
				</div>
					<hr noshade>
				<div>
					<h2>Promosi & Publikasi</h2>
					<ol>
					<?php 
						$promosi = explode( ';', $row['event_desc_promosi'] );						
						foreach ( $promosi as $xx) {
							echo "<li>"; 
							echo $xx; 
							echo "</li>";
						}  ?>	
					</ol>
				</div>
					<br>
					<hr noshade>
				  
                 <div class="panel-heading" style="background-color:#eee;" > Denah Event <div style="float:right;" > - </div></div>
				<!-- <h5><?php echo $row['event_name']; ?> </h5>  -->
				 
				 <br>
                 <div class="row">
                    <div class="col-md-6">
					 <div class="panel-body">
                      <img src="<?php echo base_url('asset/brosur_image/'.$row['event_pic_plan']); ?>"  class="img-responsive">
					 
                     </div>
                    </div> 
                    <div class="col-md-6">
					<br>
					  <h3>PERUSAHAAN :</h3>
                      <ul>			    
						<!-- <li>Area Space 2 x2 m FREE CHARGE ( GRATIS ).</li> -->
						<?php
					   $per = explode( ';', $row['event_desc_perusahaan'] );						
					   foreach ( $per as $xx ) {
							echo "<li>"; 
							echo $xx; 
							echo "</li>";
					   }  ?>
					  </ul>					  
					  <h3>FASILITAS :</h3>
					  <ol>
					<?php
					  $fasilitas = explode( ';', $row['event_desc_fasilitas'] );						
					   foreach ( $fasilitas as $xx) {
							echo "<li>"; 
							echo $xx; 
							echo "</li>";
							
							
							
							
					 }  ?>
					  </ol>
                    </div>   
                  </div>
				<hr>  			  
		<? } ?>
	          
               <!--
                  <h2>CSS3</h2>
                  <img src="//placehold.it/150x100/EEEEEE" class="img-responsive pull-right">
                  To understand the RWD approach, you must first understand CSS - the basis of responsive design. CSS enables the developer to use percentage-based (AKA fluid or proportion-based) grids, CSS3 media queries. The web site then adapts to multiple devices (desktop, laptop, tablet, smartphone) and display conditions such as browser size and screen resolution.
  
                  <br><br>
                  <button class="btn btn-default">More</button>
                  <hr> 
				-->
				  <br>
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
				    <div class="well"> 
						Bila Perusahaan anda ingin ingin menjadi partner kami. 
						<a href="<?php echo base_url('user/addcompreg/'.$row['event_id']); ?>" href="#">Register Perusahaan</a> 
					</div>
                </div>
				
      	</div> 
		
				
		
		
		
  	</div>
</div>
