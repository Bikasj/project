<head>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<section class="page-search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Advance Search -->
                <div class="">
                    <form action="/rooms/homegridresults" method="get">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input type="text" name='location' class="form-control my-2 my-lg-0" id="inputtext4" placeholder="Enter your Location">
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" name='area' class="form-control my-2 my-lg-0" id="inputCategory4" placeholder="Enter your Area">
                            </div>
                            <div class="form-group col-md-2">
                                
                                <button type="submit" class="btn btn-primary">Search Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<center><font color="red" size="4px"><?= $this->Flash->render() ?></font></center>
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    <h2>All PGs</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="category-sidebar">

            <div class="widget product-shorting">
    <h4 class="widget-header list-group">Available for</h4>
    <ul >
    <li class="list-group-item">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" value="1" name="gender" id="check1">
        <label class="custom-control-label" for="check1">Boys</label>
      </div>
    </li>
    <li class="list-group-item">
      <!-- Default checked -->
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" value="2" name="gender" id="check2">
        <label class="custom-control-label" for="check2">Girls</label>
      </div>
    </li>
    <li class="list-group-item">
      <!-- Default checked -->
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" value="3" name="gender" id="check3">
        <label class="custom-control-label" for="check3">Both Girls & Boys</label>
      </div>
    </li>
  </ul>
</div>
<form id="myForm" method="get">
<div class="widget category-list">
    <h4 class="widget-header">Seater mode</h4>

                        
                        <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" id="Single" value="One" name="seater">
                          <label class="custom-control-label" for="Single">Single</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" id="Double" value="Two" name="seater">
                          <label class="custom-control-label" for="Double">Double</label>
                        </div>  
                        <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" id="Triple" value="Three" name="seater">
                          <label class="custom-control-label" for="Triple">Triple</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" id="Quad" value="Four" name="seater">
                          <label class="custom-control-label" for="Quad">Quad</label>
                        </div>  
                        </form>
</div>

        
                    <div class="widget category-list">
     <h4 class="widget-header">Nearby </h4><!-- <form id="myForm" method="get"> -->
                    <form id="myForm2" method="get">
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="Sector-37 chandigarh" value="Sector-37 chandigarh" name="area" >
                      <label class="custom-control-label" for="Sector-37 chandigarh">Sector-37 chandigarh</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="Sahibzada Ajit singh Nagar" value="Sahibzada Ajit singh Nagar" name="area">
                      <label class="custom-control-label" for="Sahibzada Ajit singh Nagar">Sahibzada Ajit singh Nagar</label>
                    </div><div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="Daddu Majra colony" value="Daddu Majra colony" name="area">
                      <label class="custom-control-label" for="Daddu Majra colony">Daddu Majra colony</label>
                    </div><div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="Shivalik Enclave" value="Shivalik Enclave" name="area">
                      <label class="custom-control-label" for="Shivalik Enclave">Shivalik Enclave</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="Manimajra" value="Manimajra" name="area">
                      <label class="custom-control-label" for="Manimajra">Manimajra</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="Sector-63 Mohali" value="Sector-63 Mohali" name="area">
                      <label class="custom-control-label" for="Sector-63 Mohali">Sector-63 Mohali</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="Sector-22 Chandigarh" value="Sector-22 Chandigarh" name="area">
                      <label class="custom-control-label" for="Sector-22 Chandigarh">Sector-22 Chandigarh</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="Sector-13 chandigarh" value="Sector-13 chandigarh" name="area">
                      <label class="custom-control-label" for="Sector-13 chandigarh">Sector-13 chandigarh</label>
                    </div>
                    
</div>
</form>

<!-- <div class="widget filter">
    <h4 class="widget-header">Show Produts</h4>
    <select>
        <option>Popularity</option>
        <option value="1">Top rated</option>
        <option value="2">Lowest Price</option>
        <option value="4">Highest Price</option>
    </select>
</div> -->

<div class="widget price-range w-100">
    <h4 class="widget-header">Price Range</h4>
    <div class="block">
                        <input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000" data-slider-step="5"
                        data-slider-value="[0,5000]">
                <div class="d-flex justify-content-between mt-2">
                        <span class="value">Rs4,000 - Rs30,000</span>
                </div>
    </div>
</div>


                </div>
            </div>
            <div class="col-md-9">
                <div class="category-search-filter">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Short</strong>
                            <select>
                                <option>Most Recent</option>
                                <option value="1">Most Popular</option>
                                <option value="2">Lowest Price</option>
                                <option value="4">Highest Price</option>
                            </select>
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
</div>   

                
                <!-- ad listing list  -->

                <!-- pagination -->
                <div class="pagination justify-content-center py-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- pagination -->
            </div>
        </div>
    </div>
</section>
<script>
    $('document').ready(function(){
        var grid=0;
        $('input').on('change', function() {
            const array = [];
            var gender="all";
            $("input:checkbox[name=gender]:checked").each(function() { 
                array.push($(this).val()); 
                var length = array.length;
                for (var i = 0; i < length; i++) {
                    if(array[i]==3)
                    {
                        gender="both";
                        break;
                    }}
          
                        if((array[0]==1 && array[1]==2) || (array[1]==1 && array[0]==2))
                        {
                            gender="both"
                        }
                        else if((array[0]==1 && array[1]!=3) || array[1]==1 || array[2]==1)
                        {
                            gender="males";
                        }
                        else if((array[0]==2 && array[1]!=3) || array[1]==2 || array[2]==2)
                        {
                            gender="females";
                        }
                        else if(array[0]=="3" || array[1]=="3" || array[2]=="3")
                        {
                            gender="both";
                        }

                        // console.log(array);
                        var seater="none";
                        var area="none";
                        search( seater , area  , gender , grid);
            }); 

        if($('input[name=seater]').is(':checked') && $('input[name=area]').is(':checked')) { 
            var seater=$('input[name=seater]:checked', '#myForm').val(); 
            var area=$('input[name=area]:checked', '#myForm2').val(); 
            search(seater , area , gender , grid);}
        else if($('input[name=seater]').is(':checked')) 
        {   var seater=$('input[name=seater]:checked', '#myForm').val(); 
            searchbyseater(seater , gender , grid);
            }
        else if($('input[name=area]').is(':checked')) 
        {   var area=$('input[name=area]:checked', '#myForm2').val(); 
            searchbyarea(area , gender , grid);
            }
        });

        function searchbyseater( seater , gender , grid){
        var data = seater;
        var data2 = gender;
        var data4=grid;

        $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'Rooms', 'action' => 'homepageresults2' ] ); ?>",
                    data: {seater:data,gender:data2,grid:data4},

                    success: function( response )
                    {       
                       $( '.g' ).html(response);
                    }
                });
        };

        function searchbyarea( area , gender , grid){
        var data = area;
        var data2 = gender;
        var data4=grid;
        $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'Rooms', 'action' => 'homepageresults3' ] ); ?>",
                    data: {area:data,gender:data2,grid:data4},

                    success: function( response )
                    {       
                       $( '.g' ).html(response);
                    }
                });
        };
        function search( seater , area  , gender , grid){ 
        var data2 = seater; 
        var data = area;
        var data3=gender;
        var data4=grid;
        $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'Rooms', 'action' => 'homepageresults4' ] ); ?>",
                    data: {area:data,seater:data2,gender:data3,grid:data4},

                    success: function( response )
                    {       
                       $( '.g' ).html(response);
                    }
                });
        };
});
</script>
