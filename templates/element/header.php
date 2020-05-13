<head>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		.disableClick{
    pointer-events: none;
}
		.navbar-nav > .user-menu {
  > .nav-link:after {
    content:none;
  }
  > .dropdown-menu {
    @include border-top-radius(0);
    padding: 0;
    border-top-width: 0;
    width: 280px;
    padding: 0px 0px;
    margin: 6.125rem -27px 0px -37px;


    &,
    > .user-body {
      @include border-bottom-radius(4px);
    }
    
    // Header menu
    > li.user-header {
      height: 175px;
      padding: 30px;
      text-align: center;
      // User image
      > img {
        z-index: 5;
        height: 90px;
        width: 90px;
        border: 3px solid;
        border-color: transparent;
        border-color: rgba(255, 255, 255, 0.2);
      }
      > p {
        z-index: 5;
        color: #fff;
        color: rgba(255, 255, 255, 0.8);
        font-size: 17px;
        //text-shadow: 2px 2px 3px #333333;
        margin-top: 10px;
        > small {
          display: block;
          font-size: 13px;
        }
      }
    }

    // Menu Body
    > .user-body {
      padding: 15px;
      border-bottom: 1px solid #f4f4f4;
      border-top: 1px solid #dddddd;
      @include clearfix();
      a {
        color: #444 !important;
        @include media-breakpoint-up(sm) {
          background: #fff !important;
          color: #444 !important;
        }
      }
    }

    .user-footer {
      background-color: #f9f9f9;
      padding: 8px;
      @include clearfix();
      .btn-default {
        color: #666666;
        &:hover {
          @include media-breakpoint-up(sm) {
            background-color: #f9f9f9;
          }
        }
      }
    }
  }
  .user-image {
    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px;
    }
  }
}
	</style>
</head>
<?php
	$val=0; 
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar  navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="">
						<img src="/images/logo.jpg" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
          <?php if($myinfo=="vj603@gmail.com")
          { ?>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="/users/admin/pgowners/allpgs" aria-expanded="false">Home</a>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Dashboard-listing <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="/admin/users/pgowners">PG Owners</a>
									<a class="dropdown-item" href="/admin/rooms/roomstatus">Rooms Avaialable/Booked</a>
									<a class="dropdown-item" href="/admin/users/transients">Transient Guests</a>
									<a class="dropdown-item" href="/admin/pg-details/allpgs">All PGs</a>
									<a class="dropdown-item" href="/admin/pg-details/pending">Pending</a>
                  <a class="dropdown-item" href="/admin/rooms/bookingrequest">Booking Requests</a>
								</div>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="/contactus/contact"  aria-expanded="false">
									Contact us <span></span>
								</a>
              <?php }
               elseif($userrole=="1")
               { ?>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav ">
              <li class="nav-item active">
                <a class="nav-link" href="/pg-details/pg" aria-expanded="false">Home</a>
              </li>
              <li class="nav-item dropdown dropdown-slide">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  My Dashboard-listing <span><i class="fa fa-angle-down"></i></span>
                </a>
                <!-- Dropdown list -->
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/pg-details/pg">My Pgs</a>
                  <a class="dropdown-item" href="/users/transients">All Transient Guests</a>
                  <a class="dropdown-item" href="/pg-details/add">Add New PG</a>
                  <a class="dropdown-item" href="/rooms/add">Add New Room</a>
                  <a class="dropdown-item" href="/rooms/roomstatus">Rooms Available/Booked</a>
                  <a class="dropdown-item" href="/rooms/bookingrequest">Booking Requests</a>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="/contactus/contact"  aria-expanded="false">
                  Contact us <span></span>
                </a>
                <?php } 
                else
                  {?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav ">
              <li class="nav-item active">
                <a class="nav-link" href="/rooms/homepage" aria-expanded="false">Home</a>
              </li>
              <li class="nav-item dropdown dropdown-slide">
                <a class="nav-link dropdown-toggle" data-toggle="Available for" href="">Available for<span><i class="fa fa-angle-down"></i></span>
                </a>

                <!-- Dropdown list -->
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/rooms/homepageresultsnav2/females">Girls</a>
                  <a class="dropdown-item" href="/rooms/homepageresultsnav2/males">Boys</a>
                  <a class="dropdown-item" href="/rooms/homepageresultsnav2/both">Girls and Boys</a>
                  
                </div>
              </li>
              <li class="nav-item dropdown dropdown-slide">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Popular Areas <span><i class="fa fa-angle-down"></i></span>
                </a>
                <!-- Dropdown list -->
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/rooms/homepageresultsnav1/Sector-37 Chandigarh">Sector-37 Chandigarh</a>
                  <a class="dropdown-item" href="/rooms/homepageresultsnav1/Sahibzada Ajit Singh Nagar">Sahibzada Ajit Singh Nagar</a>
                  <a class="dropdown-item" href="/rooms/homepageresultsnav1/Daddu Majra colony">Daddu Majra colony</a>
                  <a class="dropdown-item" href="/rooms/homepageresultsnav1/Shivalik Enclave">Shivalik Enclave</a>
                  <a class="dropdown-item" href="/rooms/homepageresultsnav1/Manimajra">Manimajra</a>

                  <a class="dropdown-item" href="/rooms/homepageresultsnav1/Sector-63 Mohali">Sector-63 Mohali</a>
                  <a class="dropdown-item" href="/rooms/homepageresultsnav1/Sector-22 Chandigarh">Sector-22 Chandigarh</a>
                  <a class="dropdown-item" href="/rooms/homepageresultsnav1/Sector-13 Chandigarh">Sector-13 Chandigarh</a>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="/contactus/contact"  aria-expanded="false">
                  Contact us <span></span>
                </a>
               <?php } ?>
								<!-- Dropdown list -->
								
							</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
              <?php if($myinfo): ?>
							<li class="nav-item"><a class="nav-link disableClick" href=""  aria-expanded="false">
									Welcome<span></span>
								</a></li>
						</ul>
            
              
						<ul class="navbar-nav ml-auto mt-10">

							<li class="nav-item">	

<?php
  $conn = mysqli_connect('localhost', 'root','1234', 'paying_guest');
  if (!$conn) 
  {
      die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT * FROM users where email='".$myinfo."'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {

      while($row = mysqli_fetch_assoc($result)) {

?>
 	<li class="nav-item dropdown user user-menu">
    <a href="#" class="nav-link " data-toggle="dropdown">
     <span class="d-none d-md-block float-right">
      <?php if($myinfo=="vj603@gmail.com") { 
        ?> Admin <?php
         } else { 
          ?>
          <?=$row['firstname']; }?><span class="dropdown-toggle"></dropdown-togglespan> 
         	<?= '<img class="user-image img-fluid img-circle elevation-2" height="40px" width="40px" alt="User Image" src="data:image/jpg;base64, '.base64_encode($row['image']).' " height=200px style="border-radius: 50%;" width=300px></td>' ;?>
     </span>
     <a>
    <ul style=" padding: 0px 0px;
    margin: 1.25rem -27px 0px -37px;" class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <!-- User image -->
      <li class="user-header bg-primary">
          <center>
       <?= '<img src="data:image/jpg;base64, '.base64_encode($row['image']).' "  height="100px" width="100px" style="border-radius: 50%;" alt="User Image">' ?></center>

        <p class="text-white text-center">
          <?=$row['firstname']." ".$row['lastname'] ?>
          <small>
            <p class="text-white text-center">Member since <?= date("M,Y",strtotime($row['created']))?>
              
            </p>
          </small>
        </p>
      </li>
      <li class="user-footer">
        <div class="container">
          <a href="/users/profile" class="btn btn-default btn-flat"><span class="glyphicon glyphicon-user"></span>Profile</a>
        
          <a href= '<?php if($myinfo=="vj603@gmail.com") { echo "/admin/users/logout"; } else { echo "/users/logout";} ?>' onclick="return confirm('Are you sure, you want to logout?')" class="btn btn-default btn-flat"><span class="glyphicon glyphicon-log-out"></span>Logout</a>
        </div>
      </li>
    </ul>
  </li>


<?php
}
} else {
    echo "0 results";
}
mysqli_close($conn); 
?>


							</li>&nbsp;

						</ul>

          <?php  endif ?>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
