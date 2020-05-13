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
            <a href="/admin/users/profile" class="btn btn-main-sm">View Profile</a>
          </div>
          <!-- Dashboard Links -->
          
          <div class="widget user-dashboard-menu">
            <ul>
              <li><a href="/admin/users/pgowners"><i class="fa fa-user"></i> PG Owners<span><?=$pgowners?></span></a></li>
              <li class="active"><a href="/admin/rooms/roomstatus"><i class="fa fa-bed"></i> Rooms Available / Booked <span><?=$rooms?></span></a></li>
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
                        <?=  $this->Html->link('Logout', ['action' => 'logout','controller'=>'users' ], ['class' => 'text-white btn btn-primary btn-sm ']) ?> 
                      </div>
                    </div>
                  </div>
                </div>
                <!-- delete account popup modal end-->
          <!-- delete-account modal -->

        </div>
      </div>
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
          <h3 style="text-shadow: 2px 2px 5px grey;"><i class="fa fa-bed" ></i> Rooms Available/Booked </h3>
          <?php 
               echo '<a data-toggle="tooltip" data-placement="top" class="nav-link text-white btn btn-sm btn-dark  float-right" title="Add New" href="addroom/">
                          <i class="fa fa-plus"></i>
                        </a>';
                        ?>
          <table class="table table-responsive product-dashboard-table">
            <thead>
              <tr>
                <th>Image</th>
                <th>Seater</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              
                <?php    
                //echo "<pre>";print_r($room);echo "</pre>";die();
                    $i=1;
                     foreach ($room as $rooms): ?>
                <tr>
                <td class="product-thumb">
                <?='<img  src="data:image/jpg;base64, '.base64_encode(stream_get_contents($rooms->image)).' " height=50px width=70px>'?></td></td>
                <td class="product-details" style="width: 50%;">
                  <h3 class="title"><?=$rooms['seater']?></h3>
                  <span class="location"><strong>Rent :</strong><?=$rooms['rent']?></span>
                  <span class="add-id"><strong>Booked :</strong> <?php 
                        switch ($rooms->seater) {
                            case "One":
                                {$seater=1;
                                echo $seater-$rooms->seats_available;}
                                break;
                            case "Two":
                                {$seater=2;
                                echo $seater-$rooms->seats_available;}
                                break;
                            case "Three":
                                {$seater=3;
                                echo $seater-$rooms->seats_available;}
                                break;
                            default:
                                {$seater=4;
                                echo $seater-$rooms->seats_available;}
                                break;
                    }  ?></span>
                    
                  <span class="location"><strong>Available :</strong><?=$rooms['seats_available']?></span>
                  <span><strong>Added on :</strong><time><?= date("M,Y",strtotime($rooms['created']))?></time> </span>
                </td>
                <td class="product-category"><span class="status active"><?php if($rooms->status==0)
                                echo "<font color='red'>Inactive</font>";
                               else
                                echo "<font color=#32CD32>Active</font>"; ?></td></span></td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a  id="<?=$rooms->room_id?>" data-toggle="tooltip" data-placement="top" title="view" class="view" href="/admin/Rooms/viewrooms/<?php echo $rooms->room_id?>">
                          <i class="fa fa-eye"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="edit" id="<?=$rooms->room_id?>" data-toggle="tooltip" data-placement="top" title="Edit" href="/admin/Rooms/editrooms/<?php echo $rooms->room_id?>">
                          <i class="fa fa-pencil"></i>
                        </a>
                      </li>
                        <?php 
                            if($rooms->status==1)
                               echo '<li class="list-inline-item">
                        <a class="delete" data-toggle="tooltip" data-placement="top" title="Block" href="/admin/Rooms/block/'.$rooms->room_id.'">
                          <i class="fa fa-ban"></i>
                        </a></li>'; 
                            else
                                echo '<li class="list-inline-item">
                        <a class="delete" data-toggle="tooltip" data-placement="top" title="Unblock" href="/admin/Rooms/block/'.$rooms->room_id.'">
                          <i class="fa fa-ban"></i>
                        </a></li>';  ?>
                      
                    </ul>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>

        <!-- pagination -->
        <div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						 <div class="paginator paginator" >
         <ul class="pagination" >
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>                           
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
					</nav>
				</div>
        <!-- pagination -->

      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>
<?php endforeach; ?>