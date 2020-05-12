<head>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	</head>
	<?php if($grid==1) {?>
        <div class="category-search-filter">
                    <div class="row">
                        <div class="col-md-6">
                            <strong><h5>Your Results :</h5></strong>
                        </div>
                        <div class="col-md-6">
                            <div class="view">
                                <strong>Views</strong>
                                <ul class="list-inline view-switcher">
                                    <li class="list-inline-item">
                                        <a href="#"  class="text-info"><i class="fa fa-th-large"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="/rooms/homepagegrid"><i class="fa fa-reorder"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid-list">

                    <div class="row mt-30">
						<?php foreach($room as $rooms): ?>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
							<div class="package-content">
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
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
		    	<li class="list-inline-item"><i class="fa fa-map-marker"></i> Location<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><?php  
		    	echo $rooms['pg_detail']['location']; ?></a></li></br>
		    	<li class="list-inline-item">
		    		<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fa fa-fan"></i><?php if($rooms->ac_facility=='yes')
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
		    		<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fa fa-hamburger"></i>
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
		    		<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fa fa-bed"></i><?= $rooms->seater ?> Seater</a>
		    	</li>

		   <li class="list-inline-item">
		    		<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fa fa-bed"></i><?=$rooms->seats_available?> Seats Available</a>
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
					</div>
						<?php endforeach; ?>
					</div>
				</div>




<?php } else  { ?>
    <div class="category-search-filter">
                    <div class="row">
                       <div class="col-md-6">
                            <strong><h5>Your Results :</h5></strong>
                        </div>
                        <div class="col-md-6">
                            <div class="view">
                                <strong>Views</strong>
                                <ul class="list-inline view-switcher">
                                    <li class="list-inline-item">
                                        <a href="/rooms/homepage"><i class="fa fa-th-large"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="text-info"><i class="fa fa-reorder"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ad listing list  -->
    
                <div class="g">
                <?php foreach($room as $rooms): ?>
	<div class="ad-listing-list ">
				 <div class="row p-lg-3 p-sm-5 p-4">
                

       
        <div class="col-lg-4 align-self-center">
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
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="ad-listing-content">
                        <div>
                            <a href="/rooms/viewroom/<?php echo  $rooms->room_id?>" class="font-weight-bold">Rs <?=number_format($rooms->rent)?> /-</a>
                        </div>
                        <ul class="list-inline mt-2 mb-3">
                            <li class="list-inline-item"><i class="fas fa-map-marker"></i> Location<a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><?php  
                echo $rooms['pg_detail']['location']; ?></a></li></br>
                
                            <li class="list-inline-item">
                                <a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fas fa-fan"></i><?php if($rooms->ac_facility=='yes')
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
                    <a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fas fa-hamburger"></i>
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
                    <a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fa fa-bed"></i><?= $rooms->seater ?> Seater</a>
                </li>

           <li class="list-inline-item">
                    <a href="/rooms/viewroom/<?php echo  $rooms->room_id?>"><i class="fa fa-bed"></i><?=$rooms->seats_available?> Seats Available</a>
                </li></ul>
                <br/>
                View for more details
            
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="product-ratings float-lg-right pb-3">
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
</div> 
<?php endforeach; ?>
       <?php } ?>
</div>
            
</div>   





			</div>
		</div>