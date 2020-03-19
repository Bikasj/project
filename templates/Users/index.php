<?php

?>
<head>
    <style type="text/css">
        .paginator {
        width: 80%;
        margin: 16px 365px;
        padding: 20px;
        
    }
    </style>
</head>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right'])  ?> <br>
    <?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table border='0' class='table'>
            <thead>
                <tr>    
                    <th><?= $this->Paginator->sort('Sr.No.') ?></th>
                    <th><?= $this->Paginator->sort('firstname') ?></th>
                    <th><?= $this->Paginator->sort('lastname') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('adharcard') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                     foreach ($users as $user): ?>
                <tr>
                    <td><?= h($i++) ?></td>
                    <td><?= h($user->firstname) ?></td>
                    <td><?= h($user->lastname) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->adharcard) ?></td>
                   
                    <td>
                        <?php 
                                echo $user->userrole->user_rolename;
                              ?>
                    </td>
                    <td><?php if($user->status==0)
                                echo "Inactive";
                               else
                                echo "Active"; ?></td>
                    
                    
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->user_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->user_id]) ?>
                        <?php 
                            if($user->status==1)
                               echo  $this->Html->link(__('Block'), ['action' => 'block', $user->user_id]); 
                            else
                               echo  $this->Html->link(__('Unblock'), ['action' => 'block', $user->user_id]); ?>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator paginator" >
         <ul class="pagination" >
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>                           
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
