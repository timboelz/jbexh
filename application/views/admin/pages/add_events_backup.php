
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
							
						<form action="<?php echo site_url('events/upload'); ?>" method="post" enctype="multipart/form-data" id="form_produk"> 
								
								<div class="form-group">
									<label>Event ID</label>
									<input type="text" name="generate_events_id_show" class="form-control" value="<?php echo $generate_events_id; ?>" disabled/>
									<input type="text" name="generate_events_id"  value="<?php echo $generate_events_id; ?>" style="display:none;"/>
								</div>
								<div class="form-group">
									<label>Nama Event</label>
									<input type="text" required name="event_name" class="form-control" >
								</div>
								<div class="form-group">
									<label>Alamat Event</label>
									<input type="text" required name="event_address" class="form-control" >
								</div>
								<div class="form-group">
									<label>Lokasi Event</label>
									<input type="text" required name="event_location" class="form-control" >
								</div>
								<div class="form-group">
									<label>Tanggal Event</label>
									 <input class="form-control" required name="event_date" id="event_date" data-date-format="yyyy-mm-dd">        
								</div>
						
								<div class="form-group">
									<label>Latar Belakang</label>
									<textarea required class="form-control" name="event_desc_lat_bel" rows="3"></textarea>
								</div>							
								<div class="form-group">
									<label>Tujuan</label>
									<textarea required class="form-control" name="event_desc_tujuan" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label>Target Acara</label>
									<textarea required class="form-control" name="event_desc_target" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label>Bentuk Kegiatan</label>
									<textarea required class="form-control" name="event_desc_kegiatan" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label>Promosi Dan Publikasi</label>
									<textarea class="form-control" name="event_desc_promosi" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label>Fasilitas yang didapatkan untuk perusahaan yang Join</label>
									<textarea required class="form-control" name="event_desc_fasilitas" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label>Brosur Event</label>
									<input required type="file" name="event_pic">
									 <p class="help-block">Upload Brosur.</p>
								</div>
								<div class="form-group">
									<label>Denah Stand</label>
									<input required type="file" name="event_pic_plan">
									 <p class="help-block">Upload Brosur.</p>
								</div>
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
