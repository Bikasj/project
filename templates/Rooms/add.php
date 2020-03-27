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

    <h3 class="bg-gray p-4">Add New Room</h3>
        
            <?= $this->Form->create($room,['type'=>'file']) ?>
                

<?php


// Create a radio set with our custom wrapping div.
// echo $this->Form->control(' ac_facility  ', [
//     'options' => [' yes' ,'class '=>'form-control', ' no '],
//     'type' => 'radio',
//     'class' => ($this->Form->isFieldError('ac_facility')) ? ' is-invalid' : ''
// ]);
  echo $this->Form->controls(
                [
    
                 'ac_facility' => [
                            'placeholder' => "Enter yes or no ", 
                            'required' => false,
                            'class' => ($this->Form->isFieldError('ac_facility')) ? 'form-control is-invalid' : 'form-control'
                ],
                'seater' => [
                    'placeholder' => "Enter Seater ", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('seater')) ? 'form-control is-invalid' : 'form-control'
                ],
                'rent' => [
                    'placeholder' => "Rent", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('rent')) ? 'form-control is-invalid' : 'form-control'
                ],
                'food_availability' => [
                    'placeholder' => "Food availability", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('food_availability')) ? 'form-control is-invalid' : 'form-control'
                ],
                'security_charge' => [
                    'placeholder' => "Security Charge", 
                    'required' => false,
                     'minLength'=>'12',
                    'class' => ($this->Form->isFieldError('security_charge')) ? 'form-control is-invalid' : 'form-control'
                ],
                'notice_period' => [
                    'placeholder' => "Notice Period", 
                    'required' => false,
                    'minLength'=>'10',
                    'class' => ($this->Form->isFieldError('notice_period')) ? 'form-control is-invalid' : 'form-control'
                ],
                'seats_available' => [
                    'placeholder' => "Seats Available", 
                    'required' => false,
                    'minLength'=>'10',
                    'class' => ($this->Form->isFieldError('seats_available')) ? 'form-control is-invalid' : 'form-control'
                ],
                
            ]
         
        );
        ?>
        Image Upload : <center>
        <?=  $this->Form->input('image', array('type' => 'file')); ?>
    </center>
        <br>
        <br>
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

