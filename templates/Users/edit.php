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
   
  <?php 
                          if($user->status==1)
                               echo  $this->Html->link('Block User', ['action' => 'block', $user->user_id], ['class' => 'nav-link text-white btn btn-danger btn-primary  float-right'])."<br>";  
                            else
                               echo $this->Html->link('Unblock User', ['action' => 'block', $user->user_id], ['class' => 'nav-link text-white btn btn-primary       float-right'])."<br>"; ?>

    <div class="column-responsive column-80 view">
        <div class="users view content " >    

    <h3 class="bg-gray p-4">Edit </h3>
        
            <?= $this->Form->create($user,['type'=>'file']) ?>
            <fieldset>
                
                <?php
                    echo $this->Form->control('firstname', ['name' => 'firstname' ,'required' => false, 'placeholder'=>'Enter your name', 'class' =>($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control']);

                    echo $this->Form->control('lastname',['name' => 'lastname' , 'placeholder'=>'Enter your Username', 'class' =>($this->Form->isFieldError('lastname')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('email', ['name' => 'email' , 'placeholder'=>'Enter your email', 'class' =>($this->Form->isFieldError('email')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('password', ['name' => 'password' , 'placeholder'=>'Enter your password', 'class' =>($this->Form->isFieldError('password')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('adharcard', ['name' => 'adharcard' , 'placeholder'=>'Enter you adhar card number', 'class' =>($this->Form->isFieldError('adharcard')) ? 'form-control is-invalid' : 'form-control','required'=>false, 
                        'minLength'=>'12']);
                    echo $this->Form->control('phone', ['name' => 'phone' , 'placeholder'=>'Enter your phone number', 'class' =>($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control','required'=>false, 
                        'minLength'=>'10']);
                ?>

                <?php  
                    if($user->image!=NULL)
                    {   echo "<td colspan='2'>";
                         echo '<img src="data:image/jpg;base64, '.base64_encode(stream_get_contents($user->image)).' " height=200px width=400px></td>' ;
                    }
                    else
                    {
                        echo "<td colspan='2' height=200px width=400px><center> <span style='font-size:45px'>No Image available !</span></center></td>";
                    }
                ?>

                <?=  $this->Html->link('change upload', ['action' => 'changeupload', $user->user_id], ['class' => 'nav-link text-white btn btn-secondary btn-primary '])."<br>" ?>



            <!--    Image Upload : <center>
        <?=  $this->Form->input('image ', array('type' => 'file')); ?>
                                </center>  -->
        <br>
        <br>
        <?= $this->Form->select('role', $roles, ['empty' => 'Select Role', 'id' => 'user_rolename', 'class' =>($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control']); ?>
        <br>
        <br>

            <?= $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']) ?>
            </fieldset>
            <?= $this->Form->end() ?>
        </div>
</div>
</div>
</div>
</div>

</div>
</div>


</section>
