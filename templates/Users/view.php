<?php

?>
<head>
    <style>
        .view {
        width: 41%;
        margin: 16px 116px 109px;
        padding: 20px;
        
    }
    </style>
</head>
<div class="row">
    <aside class="column"><br>
        <div class="side-nav">
            <h3 class="heading"><?= __('Actions') ?></h3><h5><br>
            <?= $this->Html->link('Edit User', ['action' => 'edit', $user->user_id], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link('List Users', ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <br><br>
            <?= $this->Html->link('Add User', ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <br><br></h5>
        </div>
    </aside>
    <div class="column-responsive column-80 view">
        <div class="users view content " >    
            <h3><?= h($user->firstname." ".$user->lastname) ?></h3>
            <table class="table">
                <tr>
                    
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
                </tr>
                <tr>
                    <th><?= __('FirstName') ?></th>
                    <td><?= h($user->firstname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastname') ?></th>
                    <td><?= h($user->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?php if($user->status==1)
                                    echo "Active";
                                else
                                    echo "Inactive"; ?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= h($user->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adharcard') ?></th>
                    <td><?= h($user->adharcard) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($role->user_rolename) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($user->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($user->updated) ?></td>
                </tr>
            </table><h5><b>
            <?php 
                            if($user->status==1)
                               echo  $this->Html->link('Block User', ['action' => 'block', $user->user_id]); 
                            else
                               echo  $this->Html->link('Unblock User', ['action' => 'block', $user->user_id]); ?>
                    </h5></b>
        </div>
    </div>
</div>




