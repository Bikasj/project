<?= $this->Form->create($user,['type'=>'file']) ?>
Image Upload : <center>
        <?=  $this->Form->input('image', array('type' => 'file')) ?>
                </center>
    	<?= $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']) ?>
            <?= $this->Form->end() ?>