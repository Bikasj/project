<?php

?>
<head>
	<style>
		fieldset {
  padding: 0.35em 1.75em 0.625em;
}
	</style>
</head>
<section class="login py-5 border-top-1">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-8 align-item-center">
<div class="border border">
<h3 class="bg-gray p-4">Register Now</h3>
<div class="row">
<aside class="column">
<div class="side-nav">


</aside>
<div class="column-responsive column-100>
<div class="users form content">


	<?php
        $myTemplates = [
            'inputContainer' => '<div class="form-group">{{content}}</div>',
            'inputContainerError' => '<div class="form-group {{required}} error">{{content}}{{error}}</div>',
            'error' => '<div class="invalid-feedback">{{content}}</div>',
        ];
        $this->Form->setTemplates($myTemplates);
        ?>
<?= $this->Form->create($user) ?>
<fieldset>

<?php

 echo $this->Form->controls(
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
                    'placeholder' => "Password", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('password')) ? 'form-control is-invalid' : 'form-control'
                ],
                'confirmpassword' => [
                    'type' => 'password',
                    'name' => 'password', 
                    'placeholder' => "Confirm Password", 
                    'required' => false,
                    'label' => 'Confirm Password',
                    'class' => ($this->Form->isFieldError('confirmpassword')) ? 'form-control is-invalid' : 'form-control'
                ],
                'adharcard' => [
                    'placeholder' => "Adhar Card", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('adharcard')) ? 'form-control is-invalid' : 'form-control'
                ],
                'phone' => [
                    'placeholder' => "Phone Number", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control'
                ],
                
            ]
         
        );
 		echo $this->Form->select('role', $roles, ['empty' => 'Select Role', 'id' => 'user_rolename', 'class' =>($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control']);?>

 	<div class="loggedin-forgot d-inline-flex my-3">
		<input type="checkbox" id="registering" class="mt-1">
		<label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
	</div>
		<?php echo $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']	);
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