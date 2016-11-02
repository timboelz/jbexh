<script type="text/javascript" src="<?php echo site_url('asset/js2/jquery-1.4.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#email').blur(checkAvailability);
	});

function checkAvailability(e){
	var email = $('#email').val();	
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	var valid = emailReg.test(email);
	if(email == "" || email.length < 4 || !valid){		
		$('#email').css('border', '2px red solid');	
		 $('#status').html( '<img src="<?php echo base_url('asset/img/Cancel.png');?>"> Please enter a valid email address.');
		 e.preventDefault();
	}else{
		$.ajax({
			type: "post",
			url: "<?php echo base_url('produk/check_email')?>",
			cache: false,				
			data:'email=' + $("#email").val(),
			success: function(response){	
				try{
					if(response=='true'){
						$('#email').css('border', '2px green solid');	
						$('#status').html( '<img src="<?php echo base_url('asset/img/Check.png') ?>">' );
						e.preventDefault();
					}else{
						$('#email').css('border', '2px red solid');	
						$('#status').html( '<img src="<?php echo base_url('asset/img/Cancel.png');?>"> Email Already Exist');
						e.preventDefault();
					}										
				}catch(e) {		
					alert('Exception while request..');
				}		
			},
			error: function(){						
				alert('Error while request..');
			}
		 });
	}
}	
</script>

</div>
</div>
	<div class="container">
		<div class="row">
			<div class="span8">


		<div class="accordion" id="accordion2">


					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
								MEMBER ACCOUNT
							</a>
						</div>
						<?
						if (! empty($datapesan)) : ?>
							<p id="message">
								<?php echo $datapesan; ?>
							</p>
						<?php
						 endif ?>
						<div id="collapseTwo" class="accordion-body collapse in">
							<div class="accordion-inner">
<form action="<?php echo site_url('produk/addmember'); ?>" method="post" enctype="multipart/form-data" id="form_member"> 
									<label> Nama:</label>
									<input type="text" class="large-field" required  name="username_user">

									<label> Password</label>
									<input type="password" class="large-field" required  name="pass_user">

									<label> Nama Lengkap:</label>
									<input type="text" class="large-field" required  name="nama">

									<label> Email</label>
									<input type="email" class="form-control" required  name="email" id="email">
									<span id="status"></span> 
									
									<label> Alamat:</label>
									<input type="text" class="large-field" required  name="alamat">

									<label> Telepon:</label>
									<input type="text" class="large-field" required  name="telpon">

									<label> Propinsi:</label>
									<input type="text" class="large-field" required  name="propinsi">
									
									<label> Kota:</label>
									<input type="text" class="large-field" required  name="kota">

									<label> Kode Pos:</label>
									<input type="text" class="large-field" required  name="kodepos">
									
									<br />
									<button type="submit" value="add" name="add" class="btn btn-primary">Continue</button>
									<a href="<?php echo site_url('member/index')?>"  class="btn btn-primary"><i class="icon-ok-sign icon-white"></i> Cancel</a>		
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<hr>







































































