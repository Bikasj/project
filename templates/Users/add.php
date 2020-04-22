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
        .view 
        {
        width: 75%;
        margin: -53px 102px 100px;
        padding: 20px;
        }
        .vieww 
        {
        width: 112%;
        margin: -24px -346px 103px -274px;
        padding: 20px;
        }
        
  </style>
</head>
<div class="row">
    <!-- <div class="container"> -->
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

    <h3 class="bg-gray p-4">Add </h3>
        
            <?= $this->Form->create($user,['type'=>'file']) ?>
            <fieldset>

<?= $this->Form->controls(
            [
                'firstname' => [
                    'placeholder' => "First Name", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control'
                ],
                'lastname' => [
                    'placeholder' => "Last Name", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('lastname')) ? 'form-control is-invalid' : 'form-control'
                ],
                'email' => [
                    'placeholder' => "Email Address", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('email')) ? 'form-control is-invalid' : 'form-control'
                ],
                'password' => [
                    'type' => 'password',
                    'name' => 'password',
                    'placeholder' => "Password", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('password')) ? 'form-control is-invalid' : 'form-control'
                ],
                'confirmpassword' => [
                    'type' => 'password',
                    'name' => 'confirmpassword', 
                    'placeholder' => "Confirm Password", 
                    'required' => false,
                    'label' => 'Confirm Password',
                    'class' => ($this->Form->isFieldError('confirmpassword')) ? 'form-control is-invalid' : 'form-control'
                ],
                'adharcard' => [
                    'placeholder' => "Adhar Card", 
                    'required' => false,
                     'minLength'=>'12',
                    'class' => ($this->Form->isFieldError('adharcard')) ? 'form-control is-invalid' : 'form-control'
                ],
                'phone' => [
                    'placeholder' => "Phone Number", 
                    'required' => false,
                    'minLength'=>'10',
                    'class' => ($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control'
                ],
                
            ]
         
        );
        ?>
        Image Upload : <center>
        <?=  $this->Form->control('image',array('data-val'=>'true', 'data-val-required'=>'File is required' ),['class' => ($this->Form->isFieldError('image')) ? 'form-control is-invalid' : 'form-control'
                ]); ?>
    </center>
        <br>
        <br>
        <?= $this->Form->select('role', $roles, ['empty' => 'Select Role', 'id' => 'user_rolename', 'class' =>($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control']); ?>

    <div class="loggedin-forgot d-inline-flex my-3">
        <input type="checkbox" id="registering" class="mt-1">
        <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
    </div>
        <?php echo $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold'] );
        ?>
</fieldset>


<?= $this->Form->end() ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>