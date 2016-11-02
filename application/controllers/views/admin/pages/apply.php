
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
				<h2 class="page-header">Lowongan Yang Tersedia</h2>
			</div>
		</div><!--/.row-->
				
		<?php 
		// echo "<pre>";
		// print_r($spesialisasi);
		
		?>		
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-12">
							
						<form action="<?php echo site_url('user/savecompreg'); ?>" method="post" enctype="multipart/form-data" id="form_produk"> 
								<h2>Requirements</h2>
								<ul>
								<input type="hidden" name="id" class="" value="<?php echo $id; ?>" />
								<?php 
									$req = explode( ';', $requirements );						
									foreach ( $req as $xx) {
										echo "<li>"; 
										echo $xx; 
										echo "</li>";
									}  ?>	
								</ul><hr noshade>	
								
								<h2>Responsibilities</h2>
								<ul>
								<?php 
									$res = explode( ';', $job_desc );						
									foreach ( $res as $xx) {
										echo "<li>"; 
										echo $xx; 
										echo "</li>";
									}  ?>	
								</ul><hr noshade>	
								
								
								<button type="submit" class="btn btn-primary">Apply.</button>
								<button type="reset" class="btn btn-default">Back.</button>
							</div>
						  </div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
