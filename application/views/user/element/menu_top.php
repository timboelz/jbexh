<nav class="navbar navbar-static">
   <div class="container">
    <div class="navbar-header">
      
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="#">Home</a></li>
          <li><a href="#">Perusahaan</a></li>
		  <li><a href="#">Pengunjung</a></li>
         <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pameran</a>
            <ul class="dropdown-menu">
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              
            </ul>
          </li> -->
		   <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bursa Kerja</a>
            <ul class="dropdown-menu">
				  <li><a href="jadwal_jobfair.html">Jadwal Job Fair</a></li>
				  <li><a href="floorplan.html"> Floor Plan</a></li>
				  <li><a href="#"> Event Detail</a></li>
				  <li><a href="#"> Pendaftaran</a></li>
              
            </ul>
          </li>
		  <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pameran Pendidikan</a>
            <ul class="dropdown-menu">
                  <li><a href="#">Jadwal Pameran</a></li>
				  <li><a href="#"> Floor Plan</a></li>
				  <li><a href="#"> Event Detail</a></li>
				  <li><a href="#"> Pendaftaran </a></li>
              
            </ul>
          </li>	  
		   <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pameran Product</a>
            <ul class="dropdown-menu">
                  <li><a href="#">Jadwal Pameran</a></li>
				  <li><a href="#"> Floor Plan</a></li>
				  <li><a href="#"> Event Detail</a></li>
				  <li><a href="#"> Pendaftaran </a></li>
              
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-right navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a>
             <ul class="dropdown-menu">
			  <li><a href="<?php echo base_url('admin\userLogin') ?>">Login User</a></li>
              <li><a href="<?php echo base_url('admin\compLogin') ?>">Login Perusahaan</a></li> 
              <li class="divider"></li>
              <li><a href="#">About</a></li>
             </ul>
          </li>
        </ul>
      </div>
    </div>
</nav>

<header class="masthead">
  <div class="container">
    <div class="row">
      <!--
	  <div class="col-md-6">
        <h1>
		  <a href="#" title="Scroll down for your viewing pleasure">Bootable Template</a>
          <p class="lead">3-column Theme + Layout for Bootstrap 3.</p></h1>
      </div>
      <div class="col-md-6">
        <div class="well pull-right">
          <img src="//placehold.it/280x100/E7E7E7">        
        </div>
      </div>
	  -->
	  <div class="col-md-6">
        <h1>
		  <a href="#" title="Scroll down for your viewing pleasure">JB-Exhibition</a>
          <!--<p class="lead">Assessment & Recruitment Partner.</p></h1>-->
      </div>
	  <div class="col-md-6">
	  <div class="well pull-right">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
				<div class="item"><img src="<?php echo base_url('asset/images/hrindo1.jpg')?>" height="10px"/>  </div>
				<div class="item"><img src="<?php echo base_url('asset/images/rsz_woman-office.jpg')?>" height="10px"/>  </div>
				<div class="item active"><img src="<?php echo base_url('asset/images/pc.jpg')?>" height="10px"/>  </div>
				
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only"> &lsaquo; </span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only"> &rsaquo; </span>
		  </a>
	   </div>
	  </div>
	 </div>
    </div>
  </div>
</header>


<div class="container">
	<div class="no-gutter row">
      		<!-- left side column -->
  			<div class="col-md-2">
              	<div class="panel panel-default" id="sidebar">
                <div class="panel-heading" style="background-color:rgb(119,204,221);color:#fff;">Outbond Program</div> 
                <div class="panel-body">
				<!--
      			<ul class="nav nav-list">
					<li class="nav-header">Outbond Training</li>
                    <li><a href="#">Team Bulding</a></li>
          			<li><a href="#">Charakter Bulding</a></li>
                  	<li><a href="#">Outbond Leadership</a></li>
					<li class="nav-header">Family Gathering</li>
					<li><a href="#">Family Gadring</a></li>
					<li class="nav-header">Ulang Tahun Perusahaan</li>
					<li><a href="#">Ulang Tahun Perusahaan</a></li>
					<li class="nav-header">Tour Perusahaan</li>
					<li><a href="#">Tour Perusahaan</a></li>
				</ul> -->
				
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                            <div class="accordion">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
									<div class="panel-heading" style="background-color:#fff;">Outbond Training</div> 
                                </a>
                            </div>
			
                         
							 <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
									<div class="clearfix single_sidebar">
										<div class="popular_post">
											<table style="width:100%;">
												<tr><td><a href=""> Team Bulding</a></td></tr>
												<tr><td><a href=""> Charakter Bulding </a></td></tr>
												<tr><td><a href=""> Outbond Leadership </a></td></tr>
											</table>
										</div>
									</div>
								</div>
                            </div>
							
							<div class="accordion">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
									<div class="panel-heading" style="background-color:#fff;"> Family Gathering</div> 
                                </a>
                            </div>
                            <div id="collapse3" class="accordion-body collapse">
                                <div class="accordion-inner">
									<div class="clearfix single_sidebar">
										<div class="popular_post">
											<table style="width:100%;">
												<tr><td><a href="">Family Gathering </a></td></tr>
											</table>
										</div>
									</div>
								</div>
                            </div>
							
							
							<div class="accordion">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse4">
									<div class="panel-heading" style="background-color:#fff;"> Ulang Tahun Perusahaan </div> 
                                </a>
                            </div>
                            <div id="collapse4" class="accordion-body collapse">
                                <div class="accordion-inner">
                                   <ul class="nav nav-list">
									<li><a href="#">Ulang Tahun Perusahaan</a></li>
                                   </ul>
								</div>
                            </div>
							
							<div class="accordion">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse5">
									<div class="panel-heading" style="background-color:#fff;"> Tour Perusahaan </div> 
                                </a>
                            </div>
                            <div id="collapse5" class="accordion-body collapse">
                                <div class="accordion-inner">
                                   <ul class="nav nav-list">
									<li><a href="#">Tour Perusahaan</a></li>
                                   </ul>
								</div>
                            </div>
                        </div>
               	</div> 
                
                  <hr>

                <div class="col col-span-12">
                  <i class="icon-2x icon-facebook"></i>&nbsp;
                  <i class="icon-2x icon-twitter"></i>&nbsp;
                  <i class="icon-2x icon-linkedin"></i>&nbsp;
                  <i class="icon-2x icon-pinterest"></i>
                </div>
                
                </div>
              </div>
      		</div>