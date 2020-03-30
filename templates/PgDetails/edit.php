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
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            Total PGs :
                <font color="blue" size="10"><b>
                    <?= $pgs ?>
                </font> </b>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            Total Rooms :   
                <font color="blue" size="10"><b>  
                    <?= $rooms ?>  
                </font> </b>   
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;        
            Total Users : 
                <font color="blue" size="10"><b>  
                    <?= $totalusers ?>     
                </font> </b>          
        </div>
<div class="users index content">
   
  <br>
    <div class="column-responsive column-80 view">
        <div class="users view content " >    

    <h3 class="bg-gray p-4">Edit PG</h3>

<?= $this->Form->create($pg_details) ?>
            <fieldset>
                
                <?php
                    echo $this->Form->control('room', ['name' => 'room' ,'required' => false, 'placeholder'=>'Enter the no. of room', 'class' =>($this->Form->isFieldError('room')) ? 'form-control is-invalid' : 'form-control']);

                    echo $this->Form->control('location',['name' => 'location' , 'placeholder'=>'Enter the location', 'class' =>($this->Form->isFieldError('location')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('address', ['name' => 'address' , 'placeholder'=>'Enter the address', 'class' =>($this->Form->isFieldError('address')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('area', ['name' => 'area' , 'placeholder'=>'Enter the area', 'class' =>($this->Form->isFieldError('area')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('no_of_room', ['name' => 'no_of_room' , 'placeholder'=>'Enter the no of available rooms', 'class' =>($this->Form->isFieldError('no_of_room')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('phone', ['name' => 'phone' , 'placeholder'=>'Enter the phone number', 'class' =>($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                
                    echo $this->Form->control('availability',['name'=>'availability',
                        'type' => 'radio',
                        'options' => array('Yes'=>'Yes','No'=>'No'),
                        'class' => '']);

                ?> 
       <!--  Image Upload : <center>
        <?=  $this->Form->input('image', array('type' => 'file')); ?> -->
    </center>
     
 		<?= $this->Form->select('owner_id', $owner_id, ['empty' => 'Select Owner ', 'user_id' => 'firstname', 'class' =>($this->Form->isFieldError('owner_id')) ? 'form-control is-invalid' : 'form-control']); ?>

 	
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

