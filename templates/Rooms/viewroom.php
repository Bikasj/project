<head>

	<style>
		.table td, .table th 
		{
    padding: 1.0rem;
		}




		* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
	</style> 

</head>
<section class="section bg-gray">

	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<i><h2 class="product-title"><?= $room->seater?> Seater PG Available for <?php foreach($pgdetails as $pgdetails) echo $pgdetails['gender']; ?>  at a very low rent.</h2></i>
					<div class="product-meta">
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fa fa-user"></i> PG Owner <a href=""><?php foreach($pgowner as $pgowner) echo $pgowner['firstname']." ".$pgowner['lastname']; ?></a></li>
							<li class="list-inline-item"><i class="fa fa-map-marker"></i> Location<a href=""><?php echo $pgdetails['location']; ?></a></li>
						</ul>
					</div>
	<?php $imgsrc=base64_encode(stream_get_contents($room->image)); ?>
					<!-- product slider -->
					<!-- <div class="product-slider">
						<?='<div class="product-slider-item my-4" data-image="data:image/jpg;base64,'.$imgsrc.' " >'?> 

							<?= '<img src="data:image/jpg;base64, '.$imgsrc.' " class="img-fluid w-100" height=200px width=500px>'?>
						<?="</div>"?>
						<?php
						if($room->images!=null)
		{
						$j=0;
				$arr2=explode(",",$room->images);

					if(count($arr2)>1)
					{

						   while(count($arr2)>$j)
						   { 
						   	echo '<div class="product-slider-item my-4" data-image="/images/rooms/'.$arr2[$j].'">';
							
						
							   echo "<img src='/images/rooms/".$arr2[$j++]."' class='img-fluid w-100' height=200px width=500px>";
							   echo "</div>";
						   }
					}
					else 
						
				{

					echo '<div class="product-slider-item my-4" data-image="images/products/products-2.jpg">';
							
						
							   echo "<img src='/images/rooms/".$arr2[$j]."' class='img-fluid w-100' height=200px width=500px>";

					echo "</div>";
				}
			}
?>




					
					</div> -->
					<!-- product slider -->

<?php
				
						$j=0;$i=1;
				
				?>

<div class="container">
<div class="mySlides">
     <?php echo '<div class="numbertext">'.++$i.'';echo "</div>";
    echo '<img src="data:image/jpg;base64, '.$imgsrc.'" style="width:100%" height=400px width=520px>';?>
  </div> 

   <?php
   					if($room->images!=null)
		{
					
				$arr2=explode(",",$room->images);
					if(count($arr2)>1)
					{

						   while(count($arr2)>$j)
						   { echo '<div class="mySlides">';
    echo '<div class="numbertext">'.++$i.'';echo "</div>";
    echo "<img src='/images/rooms/".$arr2[$j++]."' height=400px width=520px style='width:100%'>";
    echo '</div>';
}
}
else 
						
				{
echo '<div class="mySlides">';
					echo '<div class="numbertext">'.++$i.'';echo "</div>";
    echo "<img src='/images/rooms/".$arr2[$j]."' height=400px width=520px style='width:100%'>";
    echo '</div>';
				}
			}
			?>
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <!-- <p id="caption"></p> -->
  </div>

  <div class="row">
  	<center>


<?php
						$j=0;$i=0;
				
echo '<div class="column">';
echo "<img class='demo cursor' src='data:image/jpg;base64, ".$imgsrc."' height=70px width=140px onclick='currentSlide(".++$i.")'  style='width:100%'>";
    echo '</div>';

?>



<?php 
if($room->images!=null)
		{
					
				$arr2=explode(",",$room->images);
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



  </div></center>	
  </div>				

					<div class="content mt-5 pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							
							<li class="nav-item">
								<a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
								 aria-selected="false">Specifications</a>
							</li>
							
						</ul>
						<div class="tab-content" id="pills-tabContent">
	
					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Details</h3>
								<table class="table  product-table">
									<tbody>
										</tr>
                <tr>
                    <th><?= __('AC facility') ?></th>
                    <td><?= h($room->ac_facility) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Status') ?></th>
                    <td><?php if($room->status==1)
                                    echo "Active";
                                else
                                    echo "Inactive"; ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Seater') ?></th>
                    <td><?= h($room->seater) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booked Seats') ?></th>
                    <td><?php 
						switch ($room->seater) {
						    case "Single":
						    	{$seater=1;
						        echo $seater-$room->seats_available;}
						        break;
						    case "Double":
						        {$seater=2;
						        echo $seater-$room->seats_available;}
						        break;
						    case "Triple":
						        {$seater=3;
						        echo $seater-$room->seats_available;}
						        break;
						    default:
						        {$seater=4;
						        echo $seater-$room->seats_available;}
						        break;
					}  ?></td>
                </tr>
                 <tr>
                    <th><?= __('Available Seats') ?></th>
                    <td><?= h($room->seats_available) ?></td>
                </tr>
                <tr>
                    <th><?= __('Food Availability') ?></th>
                    <td><?= h($room->food_availability) ?></td>
                </tr>
                <tr>
                    <th><?= __('Security Charges') ?></th>
                    <td>Rs <?= number_format($room->security_charge) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notice Period (in months)') ?></th>
                    <td><?= h($room->notice_period) ?></td>
                </tr>
                <tr>
                    <th><?= __('Location') ?></th>
                    <td><?= h($pgdetails->location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($pgdetails->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Area') ?></th>
                    <td><?= h($pgdetails->area) ?></td>
                </tr>
                <tr>
                    <th><?= __('Availability') ?></th>
                    <td><?= h($pgdetails->availability) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added on') ?></th>
                    <td><?= h($room->created) ?></td>
                </tr>

									</tbody>
								</table>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget price text-center">
						<h4>Rent</h4>
						<p>Rs <?= number_format(
							$room->rent) ?> /-</p>
					</div>
					<!-- User Profile widget -->
					<div class="widget user text-center">
						<?php echo '<img class="rounded-circle img-fluid mb-5 px-5" alt="PGowner" src="data:image/jpg;base64, '.base64_encode(stream_get_contents($pgowner['image'])).' ">';?>
						<h4><a href=""><?= $pgowner['firstname']." ".$pgowner['lastname'] ?></a></h4>
						<p class="member-time">Member Since <?= date("M,Y",strtotime($pgowner['created']))?></p>
						<a href="/rooms/homepage">See other ads</a>
						<ul class="list-inline mt-20">
							<li class="list-inline-item">
								<div><button  class="text-white btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Contact</button>							<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Contact PGOwner</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        Phone number : <strong><?= $pgowner['phone'] ?></strong>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> &nbsp;<i class="fa fa-phone-alt"></i>
				        <a class='text-white  btn d-inline-block btn-success ml-n1 my-1 px-lg-4 px-md-3' href='tel:+91<?=$pgowner["phone"]?>'> Call </a>
				      </div>
				    </div>
				  </div>
				</div>
				</div></li>
							<li class="list-inline-item"><a href="" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Make an
									offer</a></li>
						</ul>
					</div>

		




					<!-- Map Widget -->
					<div class="widget map">
						<div class="map">
							<center><button class="btn btn-success">Book Now!</button>
							</center></div>
						</div>
					</div>
					<!-- Rate Widget -->
					<div class="widget rate">
						<!-- Heading -->
						<h5 class="widget-header text-center">What would you rate
							<br>
							this product</h5>
						<!-- Rate -->
						<div class="starrr"></div>
					</div>
					<!-- Safety tips widget -->
					<div class="widget disclaimer">
						<h5 class="widget-header">Safety Tips</h5>
						<ul>
							<li>Contact owner only by the provided phone number</li>
							<li>Check the full detail before you book</li>
							<li>Pay only after contacting the PG Owner</li>
							<li>Payment modes can be online or by cash </li>
						</ul>
					</div>
					<!-- Coupon Widget -->
					<div class="widget coupon text-center">
						<!-- Coupon description -->
						<p>Have a suitable PG to rent ? Share it with
							people.
						</p>
						<!-- Submii button -->
						<a href="/users/register" class="btn btn-transparent-white">Register here</a>
					</div>

				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>
<script>
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