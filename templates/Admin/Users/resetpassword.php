<div class="row">
	<div class="col-md-4 offset-md-4">
		<?php echo $this->Flash->render() ?>
		<div class ="card">
			<h3 class ="card-header">Reset Password</h3>
			<div class="card-body">
				<?php echo $this->Form->create() ?>
				<div class ="form-group">
					<?php echo $this->Form->input('password',['class'=>'form-control','placeholder'=>'Enter your new password']) ?>
				</div>
				<?php 
				echo $this->Form->button('Reset Password',['class'=>'btn btn-primary']);
				echo $this->Form->end();
				?>
			</div>
		</div>
	</div>	
</div>