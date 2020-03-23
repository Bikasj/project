<?php

?>
<head>
    <style type="text/css">
        .paginator {
        width: 80%;
        margin: 16px 365px;
        padding: 20px;}

        .view {
            width: 112%;
            margin: -24px -346px 103px -274px;
            padding: 20px;
                
    }
    </style>
</head>
<div class="row">
    <aside class="column col-lg-2 shadow" style="background-color: #2d282838;margin-left: -64px;">
        <div class="side-nav" >
            <br>
            <br>
            <h3 class="heading"><?= __('Menu') ?></h3>
            
            <br><h6>
            <?= $this->Html->link(__('PG Owners'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            
            <br><br>
            <?= $this->Html->link('Rooms Available', ['action' => ''], ['class' => 'side-nav-item']) ?>
            <br><br>
             <?= $this->Html->link('Rooms Booked', ['action' => ''], ['class' => 'side-nav-item']) ?>
              <br><br>
            <?= $this->Html->link('New PG Request', ['action' => ''], ['class' => 'side-nav-item']) ?>
            <br><br></h6>
        </div>
</aside>

        <section class="col-lg-10 col-md-8 login py-5 border-top-1 ">
<div class="container ">
<div class="row justify-content-center">
<div class=" view">
         <div class="shadow p-3 mb-5 bg-white rounded">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Total PGs <font color="blue" size="10"><b>: <?= $pgs ?> </font> </b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;           Total Rooms :   <font color="blue" size="10"><b>  <?= $rooms ?>  </font> </b>   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;        Total Users : <font color="blue" size="10"><b>  <?= $totalusers ?>     </font> </b>          </div>
<div class="users index content">
    <?= $this->Html->link(__('Add New User'), ['action' => 'add'], ['class' => 'button float-right'])  ?> <br>
    <?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'button float-right']) ?>
    <h3><?= __('PG Owners') ?></h3>
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
                        <?= $this->Html->link('View', ['action' => 'view', $user->user_id]) ?>
                        <?= $this->Html->link('Edit', ['action' => 'edit', $user->user_id]) ?>
                        <?php 
                            if($user->status==1)
                               echo  $this->Html->link('Block', ['action' => 'block', $user->user_id]); 
                            else
                               echo  $this->Html->link('Unblock', ['action' => 'block', $user->user_id]); ?>
                        
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
</div></div></div>
</div>
</section>


