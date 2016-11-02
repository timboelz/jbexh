
<script type="text/javascript">
   $(function(){
      window.prettyprint && prettyprint();
      $('#event_date').datepicker();
    });

</script>

<?php



?>


	<div class="col-sm-9 col-sm-offset-2 col-lg-9 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Pendaftaran Perusahaan</h2>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"> </div>
					<div class="panel-body">
						<div class="col-md-12">
							
						<form action="<?php echo site_url('user/savecompreg'); ?>" method="post" enctype="multipart/form-data" id="form_produk"> 
								
								<div class="form-group">
									<label>Event ID</label>
									<input type="text" name="generate_events_id_show" class="form-control" value="<?php echo $events_id; ?>" disabled/>
									<input type="text" name="generate_events_id"  value="<?php echo $events_id; ?>" style="display:none;"/>
								</div>
								<div class="form-group">
									<label>Nama Perusahaan</label>
									<input type="text" required name="comp_name" class="form-control" data-toggle="tooltip" data-placement="top" title="Nama Perusahaan Tidak Boleh Kosong"  >
								</div>
								<div class="form-group">
									<label>Alamat Perusahaan</label>
									<input type="text" required name="comp_address" class="form-control" >
								</div>
								<div class="form-group">
									<label>Nama HRD</label>
									<input type="text" required name="hrd_name1" class="form-control" >
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									 <input class="form-control" required name="jab1" id="jab1" >         
								</div>
						
								<div class="form-group">
								    <label>Ext</label>
									<input style="width:200px" class="form-control" name="ext1" />
									<label>No. Telepon</label>
									<input required class="form-control" name="telp1" />
								</div>							
								<div class="form-group">
									<label>Pin BB</label>
									<input style="width:200px" class="form-control" name="pinbb1" />
									<label>No. Hp</label>
									<input required class="form-control" name="nohp1" />
								</div>
								
								
								<div class="form-group">
									<label>Email</label>
									<input style="width:" class="form-control" name="email" />
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
