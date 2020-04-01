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
            <?= $this->Html->link(__('PG Owners'), ['action' => 'index','controller' => 'users'], ['class' => 'side-nav-item']) ?>
            <br><br>
            <?= $this->Html->link('Rooms Available/Booked', ['action' => 'index','controller' => 'rooms'], ['class' => 'side-nav-item']) ?>
            <br><br>
             <?= $this->Html->link('Transient Guests', ['action' => 'indexfortransients','controller' => 'users'], ['class' => 'side-nav-item']) ?>
              <br><br>
              <?= $this->Html->link('All PGs', ['action' => 'index','controller' => 'pgDetails'], ['class' => 'side-nav-item']) ?>
              <br><br>
            <?= $this->Html->link('PG Request', ['action' => 'pgrequest','controller' => 'pg_details'], ['class' => 'side-nav-item']) ?>
            <br><br></h6>
        
        </div>
    </aside>

        <section class="col-lg-10 col-md-8 login py-5 border-top-1 ">
<div class="container ">
<div class="row justify-content-center">
<div class=" view">
         <div class="shadow p-3 mb-5 bg-white rounded" style="position: sticky;top:0;" >
            &emsp;&emsp;&emsp;
            Total PGs :
                <font color="blue" size="10"><b>
                    <?= $pgs ?>
                </font> </b>
            &emsp;&emsp;&emsp;&emsp;
            Total Rooms :   
                <font color="blue" size="10"><b>  
                    <?= $rooms ?>  
                </font> </b>   
            &emsp;&emsp;&emsp;&emsp;      
            Total PgOwners : 
                <font color="blue" size="10"><b>  
                    <?= $pgowners ?>     
                </font> </b>   
            &emsp;&emsp;&emsp;&emsp;
            Total Transient Guests :  
                <font color="blue" size="10"><b>  
                    <?= $transients ?>     
                </font> </b>        
        </div>
<div class="users index content">
    <?= $this->Html->link(__('Add New Room'), ['action' => 'add'], ['class' => 'btn btn-dark button float-right'])  ?> <br>
    
    <h3><?= __('Rooms Available/Booked') ?></h3>
    <div class="table-responsive">
        <table border='0' class='table'>
            <thead>
                <tr>    
                    <th><?= $this->Paginator->sort('Sr.No.') ?></th>
                    <th colspan="2"><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('pgId') ?></th>
                    <th><?= $this->Paginator->sort('seater') ?></th>
                    <th><?= $this->Paginator->sort('booked seats') ?></th>
                    <th><?= $this->Paginator->sort('available seats') ?></th>
                    <th><?= $this->Paginator->sort('rent') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                     foreach ($room as $rooms): ?>
                    <tr>
                    <td><?= h($i++) ?></td>
                     <?php  
                    if($rooms->image!=NULL)
                    {   echo "<td colspan='2'>";
                        echo '<img src="data:image/jpg;base64, '.base64_encode(stream_get_contents($rooms->image)).' " height=50px width=80px></td>' ;
                    }
                    else
                    {
                        echo "<td colspan='2' height=50px width=50px><center> <span style='font-size:15px'>No Image!</span></center></td>";
                    }
                    ?>
                    <td> <?=  $this->Html->link($rooms->pg_id, ['action' => 'view','controller' => 'PgDetails', $rooms->pg_id]) 
                         ?> </td>
                    <td><?= h($rooms->seater) ?></td>
                    <td><?= $rooms->seater-$rooms->seats_available ?></td>
                    <td><?= h($rooms->seats_available) ?></td>
                    <td><?= number_format($rooms->rent) ?></td>
                    <td><?php if($rooms->status==0)
                                echo "Inactive";
                               else
                                echo "Active"; ?></td>
                    <td class="actions">
                        <?=  $this->Html->link('view', ['action' => 'view', $rooms->room_id], ['class' => 'text-white btn btn-success btn-sm ']) ?> 
                        <?=  $this->Html->link('edit', ['action' => 'edit', $rooms->room_id], ['class' => 'text-white btn btn-info btn-sm ']) ?> 
                        <?php 
                            if($rooms->status==1)
                               echo $this->Html->link('block', ['action' => 'block', $rooms->room_id], ['class' => 'text-white btn btn-danger btn-sm ']); 
                            else
                                echo $this->Html->link('unblock', ['action' => 'block', $rooms->room_id], ['class' => 'text-white btn btn-danger btn-sm ']); 
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
</div></div></div>
</div>
</section>


