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
              <li><a href="/rooms/roomstatus"><i class="fa fa-bed"></i>Rooms Available / Booked<span><?=$rooms?></span></a></li>
              <li><a href="/rooms/bookingrequest"><i class="fa fa-bolt"></i>Booking Requests<span><?=$bookingrequest?></span></a></li>
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
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
          <h3 style="text-shadow: 2px 2px 5px grey;"><i class="fa fa-home" ></i> My PGs</h3>
          <!-- <?php 
               echo '<a data-toggle="tooltip" data-placement="top" class="nav-link text-white btn btn-sm btn-dark  float-right" title="Add New" href="addpg/">
                          <i class="fa fa-plus"></i>
                        </a>';
                        ?> -->
          <table class="table table-responsive product-dashboard-table">
            <thead>
              <tr>
                
                <th>Availability</th>
                <th>Details</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              
                <?php    
                // echo "<pre>";print_r($pgowner);echo "</pre>";die();
                    $i=1;
                     foreach ($pg_details as $pg): ?>
                <tr>
                <td class="product-thumb">
                  <center><h5 class="title"><?=$pg['availability']?></h5></center></td>
                <td class="product-details">
                  
                  <span class="add-id"><strong>Location:</strong> <?=$pg['location']?></span>
                  <span class="add-id"><strong>Address:</strong> <?=$pg['address']?></span>
                  
                  <span><strong>Added on: </strong><time><?= date("M,Y",strtotime($pg['created']))?></time> </span>
                </td>
                <td class="product-category"><span class="status active">
                  <?php if($pg->status==0)
                                echo "<font color='red'>Inactive</font>";
                               else if($pg->status==2)
                                echo "<font color='red'>Pending</font>";
                              else
                                echo "<font color=#32CD32>Active</font>"; ?>
                  </td></span></td>
                    <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a  id="<?=$pg->pg_id?>" data-toggle="tooltip" data-placement="top" title="view" class="view" href="view/<?php echo $pg->pg_id?>">
                          <i class="fa fa-eye"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="edit" id="<?=$pg->pg_id?>" data-toggle="tooltip" data-placement="top" title="Edit" href="edit/<?php echo $pg->pg_id?>">
                          <i class="fa fa-pencil"></i>
                        </a>
                      </li>
                        <?php 
                            if($pg->status==1)
                               echo '<li class="list-inline-item">
                        <a class="delete" data-toggle="tooltip" data-placement="top" title="Block" href="block/'.$pg->pg_id.'">
                          <i class="fa fa-ban"></i>
                        </a></li>'; 
                            else
                                echo '<li class="list-inline-item">
                        <a class="delete" data-toggle="tooltip" data-placement="top" title="Unblock" href="block/'.$pg->pg_id.'">
                          <i class="fa fa-ban"></i>
                        </a></li>';  ?>
                      
                    </ul>
                  
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
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
    
      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>
</body>

