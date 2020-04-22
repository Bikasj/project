<?php $myTemplates = [
            'inputContainer' => '<div class="form-group">{{content}}</div>',
            'inputContainerError' => '<div class="form-group {{required}} error">{{content}}{{error}}</div>',
            'error' => '<div class="invalid-feedback">{{content}}</div>',
        ];
        $this->Form->setTemplates($myTemplates);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Book & Rent Near You </h1>
					<p>Join the hundreds who book and rent their PG to each other <br> to help the ones who are in need</p>
					<div class="short-popular-category-list text-center">
						<!-- <h2>Popular Category</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-bed"></i> Hotel</a></li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-grav"></i> Fitness</a>
							</li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-car"></i> Cars</a>
							</li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-cutlery"></i> Restaurants</a>
							</li>
							<li class="list-inline-item">
								<a href="category.html"><i class="fa fa-coffee"></i> Cafe</a>
							</li>
						</ul> -->
					</div>
					
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-md-12 align-content-center">
										<form action='viewguest' method='get'>
											<div class="form-row">
												<div class="form-group col-md-4">
													<!-- <input type="text" class="form-control my-2 my-lg-1" id="inputtext4" placeholder="Enter your Area"> -->
													<?= $this->Form->input('area', array('type' => 'text', 'placeholder' => 'Enter Your Area','class' => 'form-control my-2 my-lg-1'))?>
												</div>
												<div class="form-group col-md-3">
													<?= $this->Form->input('location', array('type' => 'text', 'placeholder' => 'Enter Your Location','class' => 'form-control my-2 my-lg-1'))?>
												</div>
												<div class="form-group col-md-3">
													<!-- <select class="w-100 form-control mt-lg-1 mt-md-2">
														<option>Category</option>
														<option value="1">Male</option>
														<option value="2">Female</option>
														<option value="4">Both</option>
													</select> -->
													<?= $this->Form->select(
            'gender',
            ['males'=>'male', 'females'=>'female','both'=>'both'],
            ['empty' => 'Select category', 'class' =>'w-100 form-control mt-lg-1 mt-md-2']) ?>
												</div>
												<?= $this->Form->end();?>
												<div class="form-group col-md-2 align-self-center">
													<?= $this->Form->button('Search Now' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']	);?>
												</div>
											</div>
										</form>
									</div>
								</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Your Searched Results:</h2>
					<p>Find your best PG here at an affordable rates</p>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-12">
				<div class="trending-ads-slide">
					<?php $i=0; foreach($room as $rooms): ?>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
							
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<div class="price"> Best Price </div>
			<!-- <div class="price">$200</div> -->
			<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>">
				<?php  
                    if($rooms->image!=NULL)
                    {   
                        echo '<img class="card-img-top img-fluid"  height=250px width=600px alt="Card image cap" src="data:image/jpg;base64, '.base64_encode(stream_get_contents($rooms->image)).' " >' ;
                    }
                    else
                    {
                        echo "<center> <span style='font-size:15px'>No Image!</span></center>";
                    }
                ?>
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="/rooms/viewroom/<?php echo  $rooms->room_id?>">Rs <?=number_format($rooms->rent)?> /-</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item"><i class="fas fa-map-marker"></i> Location<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>">
		    		<?php  
		    	echo $pgdetail[$i++]['location']; ?></a></li></br>
		    	<li class="list-inline-item">
		    		<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fa fa-folder-open-o"></i><?php if($rooms->ac_facility=='yes')
		    			{
		    				echo " AC ";
		    			}
		    			else
		    			{
		    				echo " NON-AC ";
		    			}
		    			?></a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fa fa-folder-open-o"></i>
		    			<?php if($rooms->food_availability=='yes')
		    			{
		    				echo " Food Available ";
		    			}
		    			else
		    			{
		    				echo " Food Not Available ";
		    			}
		    			?>

		    		</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fa fa-calendar"></i><?= $rooms->seater ?> Seater</a>
		    	</li>

		   <li class="list-inline-item">
		    		<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fa fa-calendar"></i><?=$rooms->seats_available?> Seats Available</a>
		    	</li>
		    	<br/>
		    	View for more details
		    </ul>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>

						
						</div>
					
						<?php endforeach; ?>
					
				</div>
			</div>
			
			
		</div>
	</div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->




<!--====================================
=            Call to Action            =
=====================================-->

<section class="call-to-action overly bg-3 section-sm">
	<!-- Container Start -->
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-md-8">
				<div class="content-holder">
					<h2>Want to get additional features?</h2>
					<ul class="list-inline mt-30">
						<li class="list-inline-item"><a class="btn btn-main text-white"  href="/users/login">Login</a></li>
						<li class="list-inline-item"><a class="btn btn-secondary" href="/users/register">Register Now!</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


</body>

</html>



