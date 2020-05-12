<head>
	<style>
		.btn-transparent {
    background: transparent;
    color: #5672f9;
    border: 1px solid #5672f9;
}
	</style>
</head>
<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user">
						<!-- User Image -->
						<div class="image d-flex justify-content-center">
							<?php  
                    if($user->image!=NULL)
                    {   echo "<td colspan='2'>";
                         echo '<img src="data:image/jpg;base64, '.base64_encode(stream_get_contents($user->image)).' " height=200px width=300px></td>' ;
                    }
                    else
                    {
                        echo "<td colspan='2' height=150px width=30px><center> <span style='font-size:45px'>No Image available !</span></center></td>";
                    }
                ?>
						</div>
						<!-- User Name -->
						<h5 class="text-center"><?= $user->firstname." ".$user->lastname?></h5>
					</div>
					
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>Edit profile</h2>
				</div>
				<!-- Edit Personal Info -->
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">Edit Personal Information</h3>
							<?= $this->Form->create($user) ?>
								<!-- First Name -->
								<div class="form-group">
									<?= $this->Form->control('firstname', ['name' => 'firstname' ,'required' => false,'label'=>'First Name' ,'placeholder'=>'Enter your first name', 'class' =>($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control'])?>
								</div>
								<!-- Last Name -->
								<div class="form-group">
									<?= $this->Form->control('lastname', ['name' => 'lastname' ,'required' => false,'label'=>'Last Name','placeholder'=>'Enter your last name', 'class' =>($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control'])?>
								</div>
								<!-- File chooser -->
								<div class="form-group choose-file d-inline-flex">
									<i class="fa fa-user text-center px-3"></i>
									<?=  $this->Html->link('change upload', ['action' => 'changeuploaduser', $user->user_id], ['class' => 'nav-link text-white btn btn-secondary btn-primary '])."<br>" ?>
								 </div>
								<!-- Comunity Name -->
								<div class="form-group">
									<?= $this->Form->control('adharcard', ['name' => 'adharcard' , 'label'=>'Adhaar Card','placeholder'=>'Enter you adhar card number', 'class' =>($this->Form->isFieldError('adharcard')) ? 'form-control is-invalid' : 'form-control','required'=>false,'minLength'=>'12'])?>
								</div>
								<div class="form-group">
									<?= $this->Form->control('phone', ['name' => 'phone' , 'placeholder'=>'Enter you phone number','label'=>'Phone Number', 'class' =>($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control','required'=>false,'minLength'=>'10'])?>
								</div>
								</div>

						</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Password -->
					<div class="widget change-password">
						<div class="form-group">
								<?= $this->Form->control('password', ['name' => 'password' , 'label'=>'Password','placeholder'=>'Enter your password', 'class' =>($this->Form->isFieldError('password')) ? 'form-control is-invalid' : 'form-control','required'=>false])?>
								</div>

								<div class="form-group">
									<?= $this->Form->control('email', ['name' => 'email' , 'placeholder'=>'Enter your email','label'=>'Email Address', 'class' =>($this->Form->isFieldError('email')) ? 'form-control is-invalid' : 'form-control','required'=>false])?>
								</div>
							
				</div>
			</div>

		</div>
		<?= $this->Form->button('Save My Changes' ,['class'=>'btn btn-transparent']) ?>

            <?= $this->Form->end() ?>
	</div>
</section>

<!--============================
=            Footer            =
=============================-->

					