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
        width: 41%;
        margin: -134px 299px 100px;
        padding: 20px;
        
    }
    </style>
</head>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <br>
            <br>
            <h3 class="heading"><?= __('Actions') ?></h3>
            
            <br><h5>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            
            <br><br>
            <?= $this->Html->link('Add User', ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <br><br></h5>
        </div>
</aside>
</div>
        <section class="login py-5 border-top-1">
<div class="container ">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-8 align-item-center view">
<div class="border border">

    <h3 class="bg-gray p-4">Edit User</h3>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                
                <?php
                    echo $this->Form->control('firstname', ['name' => 'firstname' ,'required' => false, 'placeholder'=>'Enter your name', 'class' =>($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control']);

                    echo $this->Form->control('lastname',['name' => 'lastname' , 'placeholder'=>'Enter your Username', 'class' =>($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('email', ['name' => 'email' , 'placeholder'=>'Enter your email', 'class' =>($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('password', ['name' => 'password' , 'placeholder'=>'Enter your password', 'class' =>($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    echo $this->Form->control('adharcard', ['name' => 'adharcard' , 'placeholder'=>'Enter you adhar card number', 'class' =>($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                    // ?echo $this->Form->control('role');
                    //echo $this->Form->control('status');
                    echo $this->Form->select('role', $roles, ['empty' => 'Select Role', 'id' => 'user_rolename', 'class' =>($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control','required'=>false]);

                    echo $this->Form->control('phone', ['name' => 'phone' , 'placeholder'=>'Enter your phone number', 'class' =>($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control','required'=>false]);
                ?>
                Image Upload : <center>
        <?=  $this->Form->input('image', array('type' => 'file')); ?>
    </center>
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
</section>
