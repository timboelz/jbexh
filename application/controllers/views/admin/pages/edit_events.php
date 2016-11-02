
<script type="text/javascript">
   $(function(){
      window.prettyprint && prettyprint();
      $('#event_date').datepicker();
    });

</script>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Event Schedule</h2>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"> </div>
					<div class="panel-body">
						<div class="col-md-12">
							<?php echo $infouser['event_id']; ?>
							
						<form action="<?php echo site_url('events/editevents'); ?>" method="post" enctype="multipart/form-data" id="form_events"> 
								
								<div class="form-group">
									<label>Event ID</label>	
									<input type="text" name="event_id" readonly value="<?php echo isset($infouser['event_id']) ? $infouser['event_id'] : ''; ?>" class="form-control" />
								</div>
								<div class="form-group">
									<label>Nama Event</label>
									<input type="text" required name="event_name" value="<?php echo isset($infouser['event_name']) ? $infouser['event_name'] : ''; ?>" class="form-control" >
									
								</div>
								<div class="form-group">
									<label>Alamat Event</label>
									<input type="text" required name="event_address" value="<?php echo isset($infouser['event_address']) ? $infouser['event_address'] : ''; ?>" class="form-control" >
								</div>
								<div class="form-group">
									<label>Lokasi Event</label>
									<input type="text" required name="event_location" value="<?php echo isset($infouser['event_location']) ? $infouser['event_location'] : ''; ?>" class="form-control" >
								</div>
								<div class="form-group">
									<label>Tanggal Event</label>
									 <input class="form-control" required name="event_date" value="<?php echo isset($infouser['event_date']) ? $infouser['event_date'] : ''; ?>" id="event_date" data-date-format="yyyy-mm-dd">        
								</div>
						
								<div class="form-group">
									<label>Latar Belakang</label>
									<textarea required class="form-control" name="event_desc_lat_bel" rows="3">
										<?php echo isset($infouser['event_desc_lat_bel']) ? $infouser['event_desc_lat_bel'] : ''; ?>
									</textarea>
								</div>							
								<div class="form-group">
									<label>Tujuan</label>
									<textarea required class="form-control" name="event_desc_tujuan" rows="3">
									<?php echo isset($infouser['event_desc_tujuan']) ? $infouser['event_desc_tujuan'] : ''; ?>
									</textarea>
								</div>
								<div class="form-group">
									<label>Target Acara</label>
									<textarea required class="form-control" name="event_desc_target" rows="3">
									<?php echo isset($infouser['event_desc_target']) ? $infouser['event_desc_target'] : ''; ?>
									</textarea>
								</div>
								<div class="form-group">
									<label>Bentuk Kegiatan</label>
									<textarea required class="form-control" name="event_desc_kegiatan" rows="3">
									<?php echo isset($infouser['event_desc_kegiatan']) ? $infouser['event_desc_kegiatan'] : ''; ?>
									</textarea>
								</div>
								<div class="form-group">
									<label>Promosi Dan Publikasi</label>
									<textarea class="form-control" name="event_desc_promosi" rows="3">
									<?php echo isset($infouser['event_desc_promosi']) ? $infouser['event_desc_promosi'] : ''; ?>
									</textarea>
								</div>
								<div class="form-group">
									<label>Fasilitas yang didapatkan untuk perusahaan yang Join</label>
									<textarea required class="form-control" name="event_desc_fasilitas" rows="3">
									<?php echo isset($infouser['event_desc_fasilitas']) ? $infouser['event_desc_fasilitas'] : ''; ?>
									</textarea>
								</div>
								<fieldset>
								<div class="col-lg-6">
								  <div class="form-group">
									<label>Brosur Event</label>
										<input type="file" name="event_pic" value="<?php echo isset($infouser['event_pic']) ? $infouser['event_pic'] : ''; ?>">
									 <p class="help-block">Upload Brosur.</p>
								  </div>
								</div>
								
								<div class="col-lg-6">
									<div class="form-group">
										<img width="300px" src="<?php echo base_url('asset/brosur_image/'.$infouser['event_pic'])?>">
									</div>
								</div>
								</fieldset>
								
								<fieldset>
								<br><hr>
								<div class="col-lg-6">
								  <div class="form-group">
									<label>Denah Event</label>
										<input type="file" name="event_pic_plan" value="<?php echo isset($infouser['event_pic_plan']) ? $infouser['event_pic'] : ''; ?>">
									 <p class="help-block">Upload Brosur.</p>
								  </div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<img width="300px" src="<?php echo base_url('asset/brosur_image/'.$infouser['event_pic_plan'])?>">
									</div>
								</div>
								</fieldset>
								
								<button type="submit" class="btn btn-primary">Save.</button>
								<button type="reset" class="btn btn-default">Cancel.</button>
							</div>
						  </div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
