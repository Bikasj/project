<?php

?>
<head>
    <style type="text/css">
        .paginator 
        {
        width: 80%;
        margin: 16px 365px;
        padding: 20px;
        }
        .view 
        {
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
            <?= $this->Html->link(__('My PG'), ['action' => 'index','controller' => 'users'], ['class' => 'side-nav-item']) ?>
            <br><br>
            <?= $this->Html->link('All Transient Guests', ['action' => 'index','controller' => 'rooms'], ['class' => 'side-nav-item']) ?>
            <br><br>
             <?= $this->Html->link('Add New PG', ['action' => 'indexfortransients','controller' => 'users'], ['class' => 'side-nav-item']) ?>
              <br><br>
              <?= $this->Html->link('Add New Room', ['action' => 'index','controller' => 'pgDetails'], ['class' => 'side-nav-item']) ?>
              <br><br>
            <?= $this->Html->link('Room Available', ['action' => 'pgrequest','controller' => 'pg_details'], ['class' => 'side-nav-item']) ?>
            <br><br></h6>
        </div>
    </aside>

        <section class="col-lg-10 col-md-8 login py-5 border-top-1 ">
<div class="container ">
<div class="row justify-content-center">
<div class=" view">
         <div class="shadow p-3 mb-5 bg-white rounded" style="position: sticky;top:0;" >
            &emsp;&emsp;&emsp;&emsp;
            Total Transient Guests :
                <font color="blue" size="10"><b>
                    <?= $transients ?>
                </font> </b>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            Rooms Available :   
                <font color="blue" size="10"><b>  
                    <?= $rooms ?>  
                </font> </b>    
        </div>
<div class="users index content">

    <h3><?= __('My PG') ?></h3>
    <div class="table-responsive">
        <table border='0' class='table'>
            <thead>
                <tr>    
                    <th><?= $this->Paginator->sort('Sr.No.') ?></th>
                    <th><?= $this->Paginator->sort('Location') ?></th>
                    <th><?= $this->Paginator->sort('Address') ?></th>
                    <th><?= $this->Paginator->sort('Phone') ?></th>
                    <th><?= $this->Paginator->sort('Availability') ?></th>
                    <th><?= $this->Paginator->sort('No. of Rooms') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php                   
                    $i=1;
                     foreach ($pg_details as $pg): ?>
                    <tr>
                    <td><?= h($i++) ?></td>
                    <!-- <td>
                        
                         <?=  $this->Html->link($pg->user->firstname." ".$pg->user->lastname, ['action' => 'view','controller' => 'users', $pg->user->user_id]) 
                         ?> 
                    </td> -->
                    <td><?= h($pg->location) ?></td>
                    <td><?= h($pg->address) ?></td>
                    <td><?= h($pg->phone) ?></td>
                    <td><?= h($pg->availability) ?></td>
                    <td><?= h($pg->no_of_room) ?></td>
                    <td><?php if($pg->status==0)
                                echo "Inactive";
                               else
                                echo "Active"; ?></td>
                    <td class="actions">
                        <?=  $this->Html->link('view', ['action' => 'viewmypg', $pg->pg_id], ['class' => 'text-white btn btn-success btn-sm ']) ?> 
                         <?=  $this->Html->link('edit', ['action' => 'editmypg', $pg->pg_id], ['class' => 'text-white btn btn-info btn-sm ']) ?>
                    <?php 
                        if($pg->status==1)
                           echo $this->Html->link('block', ['action' => 'block', $pg->pg_id], ['class' => 'text-white btn btn-danger btn-sm ']); 
                        else
                            echo $this->Html->link('unblock', ['action' => 'block', $pg->pg_id], ['class' => 'text-white btn btn-danger btn-sm ']); 
                    ?>
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
</div>
</div>
</div>
</div>
</section>




