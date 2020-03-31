<?php
        $myTemplates = [
            'inputContainer' => '<div class="form-group">{{content}}</div>',
            'inputContainerError' => '<div class="form-group {{required}} error">{{content}}{{error}}</div>',
            'error' => '<div class="invalid-feedback">{{content}}</div>',
        ];
        $this->Form->setTemplates($myTemplates);
        
?>
<head>
    <style>
       .view {
        width: 75%;
        margin: -53px 102px 100px;
        padding: 20px;
            }
            .vieww {
            width: 112%;
            margin: -24px -346px 103px -274px;
            padding: 20px;
        }
        
  </style>
</head>
<div class="row">
    <aside class="column col-lg-2 shadow" style="position:relative;background-color: #2d282838;margin-left: -64px;margin-bottom: 0px;">
        <div class="side-nav" style="position: absolute;">
            <br>
            <br>
            
            <br><h6>
            <?= $this->Html->link(__('PG Owners'), ['action' => 'index','controller' => 'users'], ['class' => 'side-nav-item']) ?>
            <br><br>
            <?= $this->Html->link('Rooms Available/Booked', ['action' => 'index','controller' => 'rooms'], ['class' => 'side-nav-item']) ?>
            <br><br>
             <?= $this->Html->link('Transient Guests', ['action' => 'indexfortransients','controller' => 'users'], ['class' => 'side-nav-item']) ?>
              <br><br>
              <?= $this->Html->link('All PGs', ['action' => 'index','controller' => 'pgDetails'], ['class' => 'side-nav-item']) ?>
              <br><br>
            <?= $this->Html->link('PG Request', ['action' => 'pgrequest','controller' => 'pg_details'], ['class' => 'side-nav-item']) ?>
            <br><br></h6>
        
        </div>
</aside>

        <section class="col-lg-10 col-md-8 login py-5 border-top-1 ">
<div class="container ">
<div class="row justify-content-center">
<div class=" vieww">
         <div class="shadow p-3 mb-5 bg-white rounded" style="position: sticky;top:0;" >
            &emsp;&emsp;&emsp;
            Total PGs :
                <font color="blue" size="10"><b>
                    <?= $pgs ?>
                </font> </b>
            &emsp;&emsp;&emsp;&emsp;
            Total Rooms :   
                <font color="blue" size="10"><b>  
                    <?= $rooms ?>  
                </font> </b>   
            &emsp;&emsp;&emsp;&emsp;      
            Total PgOwners : 
                <font color="blue" size="10"><b>  
                    <?= $pgowners ?>     
                </font> </b>   
            &emsp;&emsp;&emsp;&emsp;
            Total Transient Guests :  
                <font color="blue" size="10"><b>  
                    <?= $transients ?>     
                </font> </b>     
        </div>
<div class="users index content">
   
  <br>
    <div class="column-responsive column-80 view">
        <div class="users view content " >    

    <h3 class="bg-gray p-4">Edit Room</h3>

<?= $this->Form->create($room) ?>
            <fieldset>
                
                <?php
                    echo "AC-Facility : <br>";
                    $options=array('Yes'=>'Yes','No'=>'No');
                    echo $this->Form->radio('ac_facility',$options)."<br>";
                    echo "Seater : <br>";
                    echo $this->Form->select(
                    'seater',
                    [1=>1, 2=>2, 3=>3, 4=>4],
                    ['empty' => 'Select Seater','class' =>($this->Form->isFieldError('seater')) ? 'form-control is-invalid' : 'form-control'])."<br>";
                     echo "Food-Facility : <br>";
                    $options=array('Yes'=>'Yes','No'=>'No');
                    echo $this->Form->radio('food_availability',$options)."<br>";
                    echo "Rent : <br>";
                    echo $this->Form->input('rent', array('type' => 'text', 'placeholder' => 'Enter the Rent','class' => ($this->Form->isFieldError('rent')) ? 'form-control is-invalid' : 'form-control'))."<br>";
                    echo "Security : <br>";
                    echo $this->Form->input('security_charge', array('type' => 'text', 'placeholder' => "Enter the security charge",'class' => ($this->Form->isFieldError('security_charge')) ? 'form-control is-invalid' : 'form-control'))."<br>";
                    echo "Notice Period : <br>";
                    echo $this->Form->input('notice_period', array('type' => 'text', 'placeholder' => "Enter the notice period(in months)",'class' => ($this->Form->isFieldError('notice_period')) ? 'form-control is-invalid' : 'form-control'))."<br>";

                        ?>
                     <?php  echo "Seats Available :- <br>"; ?>
                       <?= $this->Form->select(
                            'seats_available',
                            [0=>0, 1=>1, 2=>2, 3=>3, 4=>4],
                            ['empty' => 'Select Seats Available', 'class' =>($this->Form->isFieldError('seats_available')) ? 'form-control is-invalid' : 'form-control']) ?>
    <br>

            
                <?php  
                    if($room->image!=NULL)
                    {   echo "<td colspan='2'>";
                         echo '<img src="data:image/jpg;base64, '.base64_encode(stream_get_contents($room->image)).' " height=200px width=400px></td>' ;
                    }
                    else
                    {
                        echo "<td colspan='2' height=200px width=400px><center> <span style='font-size:45px'>No Image available !</span></center></td>";
                    }
                ?>

                <?=  $this->Html->link('change upload', ['action' => 'changeupload', $room->room_id], ['class' => 'nav-link text-white btn btn-secondary btn-primary '])."<br>" ?>
       <!--  Image Upload : <center>
        <?=  $this->Form->input('image', array('type' => 'file')); ?> -->
    </center>
     
 		<?= $this->Form->select('pg_id', $pg_id, ['empty' => 'Select PG ID', 'pg_id' => 'pg_id', 'class' =>($this->Form->isFieldError('pg_id')) ? 'form-control is-invalid' : 'form-control']); ?>

 	
		<?php echo $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']	);
		?>



<?= $this->Form->end() ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div></div>
</section>

