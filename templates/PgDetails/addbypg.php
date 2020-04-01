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
            <?= $this->Html->link(__('My PG'), ['action' => 'mypg','controller' => 'pgDetails'], ['class' => 'side-nav-item']) ?>
            <br><br>
            <?= $this->Html->link('All Transient Guests', ['action' => 'index','controller' => 'rooms'], ['class' => 'side-nav-item']) ?>
            <br><br>
             <?= $this->Html->link('Add New PG', ['action' => 'addbypg','controller' => 'pgDetails'], ['class' => 'side-nav-item']) ?>
              <br><br>
              <?= $this->Html->link('Add New Room', ['action' => 'index','controller' => 'pgDetails'], ['class' => 'side-nav-item']) ?>
              <br><br>
            <?= $this->Html->link('Room Available/Booked', ['action' => 'pgrequest','controller' => 'pg_details'], ['class' => 'side-nav-item']) ?>
            <br><br></h6>
        
        </div>
    </aside>
        <section class="col-lg-10 col-md-8 login py-5 border-top-1 ">
<div class="container ">
<div class="row justify-content-center">
<div class=" vieww">
         <div class="shadow p-3 mb-5 bg-white rounded" style="position: sticky;top:0;">
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            Total PG :
                <font color="blue" size="10"><b>
                    <?= $pgs ?>
                </font> </b>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            Total Rooms :   
                <font color="blue" size="10"><b>  
                    <?= $rooms ?>  
                </font> </b>           
        </div>
<div class="users index content">
  <br>
    <div class="column-responsive column-80 view">
        <div class="users view content " >    

    <h3 class="bg-gray p-4">Add NewPG</h3>
        
            <?= $this->Form->create($pg_details) ?>
                
<?php

  echo $this->Form->controls(
            [
                'location' => [
                    'placeholder' => "Enter the location ", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('location')) ? 'form-control is-invalid' : 'form-control'
                ],
                'address' => [
                    'placeholder' => "Enter the address", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('address')) ? 'form-control is-invalid' : 'form-control'
                ],
                'area' => [
                    'placeholder' => "Enter the area", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('area')) ? 'form-control is-invalid' : 'form-control'
                ],
                'no_of_room' => [
                    'placeholder' => "Enter total number of rooms", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('no_of_room')) ? 'form-control is-invalid' : 'form-control'
                ],
                'phone' => [
                    'placeholder' => "Enter phone", 
                    'required' => false,
                    'minLength'=>'10',
                    'class' => ($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control'
                ]
                
            ]
        );

    ?>  
        <?php
            echo $this->Form->control('availability',['name'=>'availability',
                        'type' => 'radio',
                        'options' => array('Yes'=>'Yes','No'=>'No'),
                        'class' => '']);
        ?>
    </center>
 	
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

