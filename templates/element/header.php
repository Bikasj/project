<?php
	$val=0; 
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="/users/index">
						<img src="/images/logo.jpg" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="/users/index">Home</a>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" data-toggle="Available for" href="">Available for<span><i class="fa fa-angle-down"></i></span>
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="dashboard.html">Girls</a>
									<a class="dropdown-item" href="dashboard-my-ads.html">Boys</a>
									<a class="dropdown-item" href="dashboard-favourite-ads.html">Girls and Boys</a>
									
								</div>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Popular Area <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="dashboard.html">Sector-37 chandigarh</a>
									<a class="dropdown-item" href="dashboard-my-ads.html">Sahibzada Ajit singh Nagar</a>
									<a class="dropdown-item" href="dashboard-favourite-ads.html">Daddu Majra colony</a>
									<a class="dropdown-item" href="dashboard-archived-ads.html">Shivalik Enclave</a>
									<a class="dropdown-item" href="dashboard-pending-ads.html">Manimajra</a><a class="dropdown-item" href="dashboard-pending-ads.html">Sector-63 Mohali</a>
									<a class="dropdown-item" href="dashboard-pending-ads.html">Sector-22 Chandigarh</a>
									<a class="dropdown-item" href="dashboard-pending-ads.html">Sector-13 chandigarh</a>
								</div>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="/users/contactus"  aria-expanded="false">
									Contact us <span></span>
								</a>
								<!-- Dropdown list -->
								
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">	
								<?php

								// echo $GLOBALS['val'];
									//$GLOBALS['val'];
								// 	 if($val==1)
								//	{ 
								echo $this->Form->PostLink('Login',
						                ['action' => 'login'],
						                ['confirm' => __('You need to logout first. Are you sure, you want to proceed?'), 'class' => 'add-button']
						            ); 
						  //          }
						  //          else
						  //          {
						  //          	echo  $this->Form->PostLink('Logout',
						  //               ['action' => 'logout'],
						  //               ['confirm' => __('You need to logout first. Are you sure, you want to proceed?'), 'class' => 'add-button']
						  //           ); 
						  //          }
						        ?>
							</li>&nbsp;
							<li class="nav-item">
								<a class="nav-link text-white add-button" href="/users/add" >Register Now</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
