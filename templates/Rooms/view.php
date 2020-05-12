<head>

  <style>
   <?php echo $this->Html->css('roomview.css',['block'=>true]); ?>
</style>
  

</head>
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
            <a href="user-profile.html" class="btn btn-main-sm">View Profile</a>
          </div>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li><a href="/pg-details/pg"><i class="fa fa-home"></i>My PG<span><?=$pgs?></span></a></li>
              <li><a href="/users/transients"><i class="fa fa-user"></i> My Transinet Guests <span><?=$transient_count?></span></a></li>
              <li><a href="/pg-details/add"><i class="fa fa-plus"></i><i class="fa fa-home"></i>Add New PG <span></span></a></li>
              <li><a href="/rooms/add"><i class="fa fa-plus"></i><i class="fa fa-bed"></i>Add New Room <span></span></a></li>
              <li class="active"><a href="/rooms/roomstatus"><i class="fa fa-bed"></i> Rooms Available / Booked<span><?=$room?></span></a></li>
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
        <div class="users view content dashboard-container" ><h3 style="text-shadow: 2px 2px 5px grey;"><i class="fa fa-bed" ></i> Rooms</h3>
<?php $imgsrc=base64_encode(stream_get_contents($rooms->image)); ?>
<?php 
        // echo  $this->Html->link('Edit', ['id'=>$user->user_id,'class' => 'edit nav-link text-white btn btn-sm btn-success  float-right'])."  ";  
        //     if($user->status==1)
               echo '<a data-toggle="tooltip" data-placement="top" class="nav-link text-white btn btn-sm btn-success  float-right" title="Edit" href="/rooms/edit/'.$rooms->room_id.'">
                          <i class="fa fa-pencil"></i>
                        </a>';
                            if($rooms->room_id==1)
                              
                        echo '<a data-toggle="tooltip" data-placement="top" class="nav-link text-white btn btn-sm btn-danger  float-right" title="Block" href="/rooms/block/'.$rooms->room_id.'">
                          <i class="fa fa-ban"></i>
                        </a></li>'; 
                            else
                    
                        echo '<a data-toggle="tooltip" data-placement="top" class="nav-link text-white btn btn-sm btn-primary  float-right" title="Unlock" href="/rooms/block/'.$rooms->room_id.'">
                          <i class="fa fa-ban"></i>
                        </a></li>';
    ?>
    
<!-- title="view" class="view" href="#" -->
    <div class="column-responsive column-80 view">
        <div class="users view content " >    <br>
            Room Details
            <table class="table">
                <tr><td colspan="2">
                  <div>
            <?php
      $arr2=explode(",",$rooms->images);
      if($rooms->images==null)
        $totalimgs=1;
      else
        $totalimgs=count($arr2)+1;
            $j=0;$i=0;
        
        ?>

<div class="container">
<div class="mySlides"> 
     <?php echo '<div class="numbertext btn-dark"><div class="price">'.++$i.'/'.$totalimgs;echo "</div></div>";
    echo '<img  data-toggle="tooltip" title="Click to preview" id="imgs'.$i.'" src="data:image/jpg;base64, '.$imgsrc.'" style="width:100%" height=300px width=380px>';?>
  </div> 

   <?php
            if($rooms->images!=null)
    {
          
        $arr2=explode(",",$rooms->images);
          if(count($arr2)>1)
          {

               while(count($arr2)>$j)
               { echo '<div class="mySlides">';
    echo '<div class="numbertext btn-dark"><div class="price">'.++$i.'/'.$totalimgs;echo "</div></div>";
    echo "<img  data-toggle='tooltip' title='Click to preview' id='imgs".$i."' src='/images/rooms/".$arr2[$j++]."' height=300px width=380px style='width:100%'>";
    echo '</div>';
}
}
else 
            
        {
echo '<div class="mySlides">';
          echo '<div class="numbertext btn-dark"><div class="price">'.++$i.'/'.$totalimgs;echo "</div></div>";
    echo "<img data-toggle='tooltip' title='Click to preview' id='imgs".$i."' src='/images/rooms/".$arr2[$j]."' height=300px width=380px style='width:100%'>";
    echo '</div>';
        }
      }
      ?>
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <?php
            $j=0;$i=0;
        
echo '<div class="column">';
echo "<img class='demo cursor' src='data:image/jpg;base64, ".$imgsrc."' height=70px width=140px onclick='currentSlide(".++$i.")'  style='width:100%'>";
    echo '</div>';

?>



<?php 
if($rooms->images!=null)
    {
          
        $arr2=explode(",",$rooms->images);
          if(count($arr2)>1)
          {

               while(count($arr2)>$j)
               { echo '<div class="column">';
    
    echo "<img class='demo cursor' src='/images/rooms/".$arr2[$j++]."' height=70px width=140px  onclick='currentSlide(".++$i.")'  style='width:100%'>";
    echo '</div>';
}
}
else 
            
        {
echo '<div class="column">';
          
    echo "<img class='demo cursor' src='/images/rooms/".$arr2[$j]."' height=70px width=140px  onclick='currentSlide(".++$i.")' style='width:100%'>";
    echo '</div>';
        }
      }
      ?>
  </div>

  <div class="row" style="position:relative;">
    
      <!-- <img id="myImg" src="img_snow.jpg" alt="Snow" style="width:100%;max-width:300px"> -->
<div id="myModal" class="modall">
  <span class="close">&times;</span>
  <img class="modall-content" id="img01">
  <div id="caption"></div>
</div>
<div style="position: absolute;
  left: 20%;
  top: 50%;
  ">



</div>
  </div>  
  </div>      
           </div>            
                    </td>
                </tr>
                <tr>
                    <th><?= __('Room ID') ?></th>
                    <td><?= h($rooms->room_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('PG ID') ?></th>
                    <td><?=  $this->Html->link($rooms->pg_id, ['action' => 'view','controller' => 'PgDetails', $rooms->pg_id]) 
                         ?></td>
                </tr>
                <tr>
                    <th><?= __('AC facility') ?></th>
                    <td><?= h($rooms->ac_facility) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?php if($rooms->status==1)
                                    echo "Active";
                                else
                                    echo "Inactive"; ?></td>
                </tr>
                <tr>
                    <th><?= __('Seater') ?></th>
                    <td><?= h($rooms->seater) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booked Seats') ?></th>
                    <td><?php 
                        switch ($rooms->seater) {
                            case "Single":
                                {$seater=1;
                                echo $seater-$rooms->seats_available;}
                                break;
                            case "Double":
                                {$seater=2;
                                echo $seater-$rooms->seats_available;}
                                break;
                            case "Triple":
                                {$seater=3;
                                echo $seater-$rooms->seats_available;}
                                break;
                            default:
                                {$seater=4;
                                echo $seater-$rooms->seats_available;}
                                break;
                    }  ?></td>
                </tr>
                 <tr>
                    <th><?= __('Available Seats') ?></th>
                    <td><?= h($rooms->seats_available) ?></td>
                </tr>
                <tr>
                    <th><?= __('Food Availability') ?></th>
                    <td><?= h($rooms->food_availability) ?></td>
                </tr>
                <tr>
                    <th><?= __('Security Charge') ?></th>
                    <td><?= h($rooms->security_charge) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notice Period (in months)') ?></th>
                    <td><?= h($rooms->notice_period) ?></td>
                </tr>
               
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($rooms->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($rooms->updated) ?></td>
                </tr>
            </table><h6>
        
            <br><br></h6>
             <?=  $this->Html->link('View PG', ['action' => 'view','controller'=>'PgDetails', $rooms->pg_id], ['class' => 'text-white btn btn-success btn-md ']) ?> 
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
<script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var count="<?php echo $totalimgs;?>";
console.log(count);
for (i = 1; i <= count; i++) {
  
var img = document.getElementById("imgs"+[i]);
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[i-1];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>