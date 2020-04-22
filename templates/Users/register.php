<?php
        $myTemplates = [
            'inputContainer' => '<div class="form-group">{{content}}</div>',
            'inputContainerError' => '<div class="form-group {{required}} error">{{content}}{{error}}</div>',
            'error' => '<div class="invalid-feedback">{{content}}</div>',
        ];
        $this->Form->setTemplates($myTemplates);
        
?>

<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        
                            <h3 class="bg-gray p-4">Register Now </h3>
        
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
                    'placeholder' => "Adhar Card Number", 
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
    <center>
        <?=  $this->Form->control('image',['class' => ($this->Form->isFieldError('image')) ? 'form-control is-invalid' : 'form-control'
                ]); ?>
    </center>
        <br>
        <br>
    <?= $this->Form->select('role', $roles, ['empty' => 'Select Role', 'id' => 'user_rolename', 'class' =>($this->Form->isFieldError('role')) ? 'form-control is-invalid' : 'form-control']); ?>

  <div class="loggedin-forgot d-inline-flex my-3">
    <input type="checkbox" id="registering" class="mt-1">
    <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
  </div>
    <?php echo $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold'] );
    ?>
    <?= $this->Form->end() ?>
</fieldset>

                        
            </div>
          </div>
        </div>
        </div>
    </section>
