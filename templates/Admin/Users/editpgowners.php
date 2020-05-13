<body class="body-wrapper">


<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
  <?php foreach($users as $users):?>
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
        <div class="sidebar">
          <!-- User Widget -->
          <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
              <?='<img class="rounded-circle" src="data:image/jpg;base64, '.base64_encode(stream_get_contents($users->image)).' " ></td>'?>
            
            </div>
            <!-- User Name -->
            
            <h5 class="text-center"><?=$users['firstname']." ".$users['lastname']?></h5>
            <p>You are Admin</p>
            <a href="user-profile.html" class="btn btn-main-sm">View Profile</a>
          </div>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li class="active"><a href="/admin/users/pgowners"><i class="fa fa-user"></i> PG Owners<span><?=$pgowners?></span></a></li>
              <li><a href="/admin/rooms/roomstatus"><i class="fa fa-bed"></i> Rooms Available / Booked <span><?=$rooms?></span></a></li>
              <li><a href="/admin/users/transients"><i class="fa fa-user"></i>Transient Guests <span><?=$transients?></span></a></li>
              <li><a href="/admin/PgDetails/allpgs"><i class="fa fa-home"></i>All PGs <span><?=$pgs?></span></a></li>
              <li><a href="/admin/PgDetails/pending"><i class="fa fa-bolt"></i> Pending Approval<span><?=$pending?></span></a></li>
              <li><a href="/admin/rooms/bookingrequest"><i class="fa fa-bolt"></i> Booking Requests<span><?=$bookingrequest?></span></a></li>
              <!-- <li><a href="/users/logout"><i class="fa fa-cog"></i> Logout</a></li> -->
              <li><a href="" data-toggle="modal" data-target="#logout"><i class="fa fa-power-off"></i>Logout</a></li>
            </ul>
          </div>

          <!-- delete-account modal -->
                                  <!-- delete account popup modal start-->
                <!-- Modal -->
                <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
                        <h6 class="py-2">Are you sure you want to logout?</h6>
                          <img src="/images/logout.png" alt="" height="100px" width="100px" class="rounded-circle"> 
                      </div>
                      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <?=  $this->Html->link('Logout', ['action' => 'logout', ], ['class' => 'text-white btn btn-primary btn-sm ']) ?> 
                      </div>
                    </div>
                  </div>
                </div>
                <!-- delete account popup modal end-->
          <!-- delete-account modal -->

        </div>
      </div>
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0"><div class="column-responsive column-80 view">
        <div class="users view content dashboard-container" >    
 <h3 style="text-shadow: 2px 2px 5px grey;"><i class="fa fa-user" ></i> PG Owners</h3>
    <h4 class="bg-gray p-4"><i class="fa fa-pencil"></i> Edit </h4>
        
            <?= $this->Form->create($user,['type'=>'file']) ?>
            <fieldset>
                
                <?php
                    echo $this->Form->control('firstname', ['name' => 'firstname' ,'required' => false, 'placeholder'=>'Enter your name', 'class' =>($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control']);

                    echo $this->Form->control('lastname',['name' => 'lastname' , 'placeholder'=>'Enter your Username', 'class' =>($this->Form->isFieldError('lastname')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('email', ['name' => 'email' , 'placeholder'=>'Enter your email', 'class' =>($this->Form->isFieldError('email')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('password', ['name' => 'password' , 'placeholder'=>'Enter your password', 'class' =>($this->Form->isFieldError('password')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('adharcard', ['name' => 'adharcard' , 'placeholder'=>'Enter you adhar card number', 'class' =>($this->Form->isFieldError('adharcard')) ? 'form-control is-invalid' : 'form-control','required'=>false, 
                        'minLength'=>'12']);
                    echo $this->Form->control('phone', ['name' => 'phone' , 'placeholder'=>'Enter your phone number', 'class' =>($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control','required'=>false, 
                        'minLength'=>'10']);
                ?>

                <?php  
                    if($user->image!=NULL)
                    {   echo "<td colspan='2'>";
                         echo '<img src="data:image/jpg;base64, '.base64_encode(stream_get_contents($user->image)).' " height=200px width=300px></td>' ;
                    }
                    else
                    {
                        echo "<td colspan='2' height=200px width=400px><center> <span style='font-size:45px'>No Image available !</span></center></td>";
                    }
                ?>

                <?=  $this->Html->link('change upload', ['action' => 'changeupload', $user->user_id], ['class' => 'nav-link text-white btn btn-secondary btn-primary '])."<br>" ?>

        <br>
        <br>

            <?= $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']) ?>
            </fieldset>
            <?= $this->Form->end() ?>
        </div>
</div>
</div>
<?php endforeach; ?>
</div>
</section>
</body>