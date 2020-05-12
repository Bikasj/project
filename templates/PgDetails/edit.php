<body class="body-wrapper">


<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
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
            <p>PG Owner</p>
            <a href="/users/profile" class="btn btn-main-sm">View Profile</a>
          </div>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li class="active"><a href="/pg-details/pg"><i class="fa fa-home"></i>My PG<span><?=$pgs?></span></a></li>
              <li><a href="/users/transients"><i class="fa fa-user"></i> My Transinet Guests <span><?=$transient_count?></span></a></li>
              <li><a href="/pg-details/add"><i class="fa fa-plus"></i><i class="fa fa-home"></i>Add New PG <span></span></a></li>
              <li><a href="/rooms/add"><i class="fa fa-plus"></i><i class="fa fa-bed"></i>Add New Room <span></span></a></li>
              <li><a href="/rooms/roomstatus"><i class="fa fa-bed"></i> Rooms Available / Booked<span><?=$rooms?></span></a></li>
              <li><a href="/rooms/bookingrequest"><i class="fa fa-bolt"></i> Booking Requests<span><?=$bookingrequest?></span></a></li>
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
                        <?=  $this->Html->link('Logout', ['action' => 'logout','controller'=>'Users' ], ['class' => 'text-white btn btn-primary btn-sm ']) ?> 
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
 <h3 style="text-shadow: 2px 2px 5px grey;"><i class="fa fa-home" ></i>PGs </h3>
    <h4 class="bg-gray p-4"><i class="fa fa-pencil"></i> Edit PG Details </h4>
        
            <div class="column-responsive column-80 view">

<?= $this->Form->create($pg_details) ?>
            <fieldset>
                
                <?php
                       echo $this->Form->control('location',['name' => 'location' , 'placeholder'=>'Enter the location', 'class' =>($this->Form->isFieldError('location')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('address', ['name' => 'address' , 'placeholder'=>'Enter the address', 'class' =>($this->Form->isFieldError('address')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('area', ['name' => 'area' , 'placeholder'=>'Enter the area', 'class' =>($this->Form->isFieldError('area')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('no_of_room', ['name' => 'no_of_room' , 'placeholder'=>'Enter the no of available rooms', 'class' =>($this->Form->isFieldError('no_of_room')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('phone', ['name' => 'phone' , 'placeholder'=>'Enter the phone number', 'class' =>($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control','required'=>false,'minLength'=>'10']);
                
                    echo $this->Form->control('availability',['name'=>'availability',
                        'type' => 'radio',
                        'options' => array('Yes'=>'Yes','No'=>'No'),
                        'class' => '']);

                    echo $this->Form->control('gender',['name'=>'gender',
                        'type' => 'radio',
                        'options' => array('males'=>'male','females'=>'female','male & female'=>'both'),
                        'class' => '']);
        ?>
    </center>

  <br><br>
    <?php echo $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold'] );
    ?>



<?= $this->Form->end() ?>
</div>
</div>
</div>
</div>
</div>
</section>
</body>