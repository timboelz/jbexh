
 

    <p class="text-center">
        
    <?php
        $attributes = array('name' => 'login_form', 'id' => 'login_form', 'class' =>"form-signin");
        echo form_open('admin', $attributes);
    ?>

    <!-- pesan start -->
    <?php 
    if (! empty($pesan)) : ?>
        <p class="text-center" id="message">
            <?php echo $pesan; ?>
        </p>
    <?php
     endif ?>

    </p>
    
 


<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form">
						<fieldset>
							<div class="form-group">
								<input required value="<?php echo set_value('sername');?>" class="form-control" placeholder="User Name" name="username" type="username" autofocus="">
								<?php echo form_error('username', '<p class="field_error">', '</p>');?>
							</div>
							<div required class="form-group">
								<input value="<?php echo set_value('password');?>" class="form-control" placeholder="Password" name="password" type="password" value="">
								<?php echo form_error('password', '<p class="field_error">', '</p>');?>
							</div>
							<br>
							<div class="form-group">
								<select class="form-control" name="level" id="level" required>
									<option value="comp">-- Pilih --</option>
									<option value="comp">Perusahaan</option>
									<option value="user">User</option>
									<option value="admin">Admin</option>
								</select>
							</div>
							<hr noshade>   
							<div class="form-group">
							
								<p>forgot your password? <a href="#">click here</a></p>
								<p>new user? <a href="#">create new account</a></p>
							</div>
							<button id="submit" name="submit" class="btn btn-primary" type="submit">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	



</form>	