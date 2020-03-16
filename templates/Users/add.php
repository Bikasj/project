<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\User $user
*/
?>
<section class="login py-5 border-top-1">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-8 align-item-center">
<div class="border border">
<h3 class="bg-gray p-4">Register Now</h3>
<!-- <div class="row">
<aside class="column">
<div class="side-nav"> -->


</aside>
<div class="column-responsive column-80">
<div class="users form content">
<?= $this->Form->create($user) ?>
<fieldset>

<?php
//	['name' => 'name' , 'placeholder'=>'Enter your Firstname', 'class' =>'border p-3 w-100 my-2']
//echo $this->Form->input('firstname',array('required'=>false));
echo $this->Form->input('lastname',array('formnovalidate'=>true))	;
// echo $this->Form->text('Username', ['name' => 'username' , 'placeholder'=>'Enter your Lastname', 'class' =>'border p-3 w-100 my-2']);
// echo $this->Form->text('Email', ['name' => 'email' , 'placeholder'=>'Enter your email', 'class' =>'border p-3 w-100 my-2']);
// echo $this->Form->password('Password', ['name' => 'password' , 'placeholder'=>'Enter your password', 'class' =>'border p-3 w-100 my-2']);
// echo $this->Form->password('password', ['name' => 'password' , 'placeholder'=>'Confirm Password', 'class' =>'border p-3 w-100 my-2']);
// echo $this->Form->text('adharcard', ['name' => 'adharcard' , 'placeholder'=>'Enter you adhar card number', 'class' =>'border p-3 w-100 my-2']);
// echo $this->Form->text('phone', ['name' => 'phone' , 'placeholder'=>'Enter your phone number', 'class' =>'border p-3 w-100 my-2']);

//echo $this->Form->select(
/*'role',
['PG owner', 'Transient'],
['empty' => '(choose one)', 'class' =>'border p-3 w-100 my-2']
);*/
//var_dump($roles);
// echo $this->Form->select('role', $roles, ['empty' => 'Select Role', 'id' => 'user_rolename', 'class' =>'border p-3 w-100 my-2']);


?>	
<div class="loggedin-forgot d-inline-flex my-3">
<!--<input type="checkbox" id="registering" class="mt-1">-->
<!--<label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
</div>-->
<?= $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']) ?>

</fieldset>


<?= $this->Form->end() ?>
<!-- </div>
</div>
</div> -->
</div>
</div>
</div>
</div>
</div>
</section>