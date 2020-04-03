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
        .view2 {
        width: 105%;
        margin: -181px -133px 100px -22px;
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
            
            <h3 class="heading"><?= __('Menu') ?></h3>
            
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

    <h3 class="bg-gray p-4">Edit PG</h3>

<?= $this->Form->create($pg_details) ?>
            <fieldset>
                
                <?php
                       echo $this->Form->control('location',['name' => 'location' , 'placeholder'=>'Enter the location', 'class' =>($this->Form->isFieldError('location')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('address', ['name' => 'address' , 'placeholder'=>'Enter the address', 'class' =>($this->Form->isFieldError('address')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('area', ['name' => 'area' , 'placeholder'=>'Enter the area', 'class' =>($this->Form->isFieldError('area')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('no_of_room', ['name' => 'no_of_room' , 'placeholder'=>'Enter the no of available rooms', 'class' =>($this->Form->isFieldError('no_of_room')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('phone', ['name' => 'phone' , 'placeholder'=>'Enter the phone number', 'class' =>($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control','required'=>false,'minLength'=>'10']);
                
                    echo $this->Form->control('availability',['name'=>'availability',
                        'type' => 'radio',
                        'options' => array('Yes'=>'Yes','No'=>'No'),
                        'class' => '']);

                ?> 
    </center>
     
 		<?= $this->Form->select('owner_id', $owner_id, ['empty' => 'Select Owner ', 'user_id' => 'firstname', 'class' =>($this->Form->isFieldError('owner_id')) ? 'form-control is-invalid' : 'form-control']); ?>

 	
		<?php echo $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']	);
		?>



<?= $this->Form->end() ?>
</div>
</div>
            <div class='rooms view2'>
            <h5><b>Rooms in PG</b></h5>

            <table border='0'  class='table'>
            <thead>
                <tr>    
                    <th><?= $this->Paginator->sort('Sr.No.') ?></th>
                    <th colspan="2"><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('seater') ?></th>
                    <th><?= $this->Paginator->sort('booked seats') ?></th>
                    <th><?= $this->Paginator->sort('available seats') ?></th>
                    <th><?= $this->Paginator->sort('food_availability') ?></th>
                    <th><?= $this->Paginator->sort('rent') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                     foreach ($room as $rooms): ?>
                    <tr>
                    <td><?= h($i++) ?></td>
                     <?php  
                    if($rooms->image!=NULL)
                    {   echo "<td colspan='2'>";
                        echo '<img src="data:image/jpg;base64, '.base64_encode(stream_get_contents($rooms->image)).' " height=50px width=80px></td>' ;
                    }
                    else
                    {
                        echo "<td colspan='2' height=50px width=50px><center> <span style='font-size:15px'>No Image!</span></center></td>";
                    }
                    ?>
                    <td><?= h($rooms->seater) ?></td>
                    <td><?= $rooms->seater-$rooms->seats_available ?></td>
                    <td><?= h($rooms->seats_available) ?></td>
                     <td><?= h($rooms->food_availability) ?></td>
                    <td><?= number_format($rooms->rent) ?></td>
                    <td><?php if($rooms->status==0)
                                echo "Inactive";
                               else
                                echo "Active"; ?>
                                    
                    </td>
                    <td class="actions">
                        <?=  $this->Html->link('view', ['action' => 'view','controller' => 'rooms' , $rooms->room_id], ['class' => 'text-white btn btn-success btn-sm ']) ?> 
                        <?=  $this->Html->link('edit', ['action' => 'edit','controller' => 'rooms' , $rooms->room_id], ['class' => 'text-white btn btn-info btn-sm ']) ?> 
                        <?php 
                            if($rooms->status==1)
                               echo $this->Html->link('block', ['action' => 'block','controller' => 'rooms', $rooms->room_id], ['class' => 'text-white btn btn-danger btn-sm ']); 
                            else
                                echo $this->Html->link('unblock', ['action' => 'block','controller' => 'rooms', $rooms->room_id], ['class' => 'text-white btn btn-danger btn-sm ']); ?>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>


</div>
</div>
</div>
</div>
</div>
</div>
</div></div>
</section>

