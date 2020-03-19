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
        margin: 40px;
        }
    </style>
</head>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <br>
            <br>
            <h4 class="heading"><?= __('Actions') ?></h4>
            
            <br>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
</aside>
</div>
        <section class="login py-5 border-top-1">
<div class="container ">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-8 align-item-center">
<div class="border border">

    
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
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
