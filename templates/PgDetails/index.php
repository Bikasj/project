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
    <aside class="column col-lg-2 shadow" style="position:relative;background-color: #2d282838;margin-left: -64px;margin-bottom: 0px;">
        <div class="side-nav" style="position: absolute;">
            <br>
            <br>
            
            <h3 class="heading"><?= __('Menu') ?></h3>
            
           <br><h6>
            <?= $this->Html->link(__('PG Owners'), ['action' => 'index','controller' => 'users'], ['class' => 'side-nav-item']) ?>
            <br><br>
            <?= $this->Html->link('Rooms Available/Booked', ['action' => 'index','controller' => 'rooms'], ['class' => 'side-nav-item']) ?>
            <br><br>
             <?= $this->Html->link('Transient Guests', ['action' => 'indexfortransients','controller' => 'users'], ['class' => 'side-nav-item']) ?>
              <br><br>
              <?= $this->Html->link('All PGs', ['action' => 'index','controller' => 'pgDetails'], ['class' => 'side-nav-item']) ?>
              <br><br>
            <?= $this->Html->link('PG Request', ['action' => 'pgrequest','controller' => 'rooms'], ['class' => 'side-nav-item']) ?>
            <br><br></h6>
        
        </div>
</aside>

        <section class="col-lg-10 col-md-8 login py-5 border-top-1 ">
<div class="container ">
<div class="row justify-content-center">
<div class=" view">
         <div class="shadow p-3 mb-5 bg-white rounded" style="position: sticky;top:0;" >
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            Total PGs :
                <font color="blue" size="10"><b>
                    <?= $pgs ?>
                </font> </b>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            Total Rooms :   
                <font color="blue" size="10"><b>  
                    <?= $rooms ?>  
                </font> </b>   
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;        
            Total Users : 
                <font color="blue" size="10"><b>  
                    <?= $totalusers ?>     
                </font> </b>          
        </div>
<div class="users index content">
    <?= $this->Html->link(__('Add New PG'), ['action' => 'add'], ['class' => 'btn btn-dark button float-right'])  ?> <br>
    
    <h3><?= __('PGs') ?></h3>
    <div class="table-responsive">
        <table border='0' class='table'>
            <thead>
                <tr>    
                    <th><?= $this->Paginator->sort('Sr.No.') ?></th>
                    <th><?= $this->Paginator->sort('PG owner') ?></th>
                    <th><?= $this->Paginator->sort('location') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('area') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('availability') ?></th>
                    <th><?= $this->Paginator->sort('Status') ?></th>
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                     foreach ($pg_details as $pg): ?>
                    <tr>
                    <td><?= h($i++) ?></td>
                    <td>
                        <?php 
                                echo $pg->user->firstname." ".$pg->user->lastname;
                        ?>
                    </td>
                    <td><?= h($pg->location) ?></td>
                    <td><?= h($pg->address) ?></td>
                    <td><?= h($pg->area) ?></td>
                    <td><?= h($pg->gender) ?></td>
                    <td><?= h($pg->availability) ?></td>
                   
                    <!-- <td>
                        <?php 
                                //echo $user->userrole->user_rolename;
                              ?>
                    </td> -->
                    <td><?php if($pg->status==0)
                                echo "Inactive";
                               else
                                echo "Active"; ?>
                                    
                    </td>
                    
                    
                    <td class="actions">
                        <?=  $this->Html->link('view', ['action' => 'view', $pg->pg_id], ['class' => 'text-white btn btn-success btn-sm ']) ?> 
                        <?php 
                            if($pg->status==1)
                               echo $this->Html->link('block', ['action' => 'block', $pg->pg_id], ['class' => 'text-white btn btn-danger btn-sm ']); 
                            else
                                echo $this->Html->link('unblock', ['action' => 'block', $pg->pg_id], ['class' => 'text-white btn btn-danger btn-sm ']); ?>
                        
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


