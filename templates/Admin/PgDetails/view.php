<?php

?>
<head>
    <style>
        .view 
        {
        width: 84%;
        margin: -51px 86px -100px;
        padding: 20px;
        }
        .vieww 
        {
        width: 112%;
        margin: -24px -346px 103px -274px;
        padding: 20px;
        }
        .rooms-view
        {
        width: 124%;
        margin: 60px 252px 0px -77px;
        }
    </style>
</head>
<div class="row">
   <!-- <div class="container"> -->
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
<div class=" vieww">
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
   
    <?php 
            if($pg_details->status==1)
               echo  $this->Html->link('Block', ['action' => 'block', $pg_details->pg_id], ['class' => 'nav-link text-white btn btn-danger btn-primary  float-right'])."<br>";  
            else if($pg_details->status==0)
               echo $this->Html->link('Unblock', ['action' => 'block',$pg_details->pg_id], ['class' => 'nav-link text-white btn btn-primary       float-right'])."<br>"; 
            else 
                echo $this->Html->link('Approve', ['action' => 'approve',$pg_details->pg_id], ['class' => 'nav-link text-white btn btn-success       float-right'])."<br>"; 
    ?>

    <div class="column-responsive column-80 view">
        <div class="users view content " ><br>
            
           PG Details
            <table class="table">
                <tr>
                    <th><?= __('PG ID') ?></th>
                    <td><?= h($pg_details->pg_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Owner Name') ?></th>
                    <td> <?=  $this->Html->link($pg_details->user->firstname." ".$pg_details->user->lastname, ['action' => 'view','controller' => 'users', $pg_details->user->user_id]) 
                         ?> </td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?php if($pg_details->status==1)
                                    echo "Active";
                                else
                                    echo "Inactive"; ?></td>
                </tr>
                <tr>
                    <th><?= __('Location') ?></th>
                    <td><?= h($pg_details->location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= $pg_details->address ?></td>
                </tr>
                 <tr>
                    <th><?= __('Area') ?></th>
                    <td><?= h($pg_details->area) ?></td>
                </tr>
                <tr>
                    <th><?= __('Availability') ?></th>
                    <td><?= h($pg_details->availability) ?></td>
                </tr>
                <tr>
                    <th><?= __('No. of Rooms') ?></th>
                    <td><?= h($pg_details->no_of_room) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact No.') ?></th>
                    <td><?= h($pg_details->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($pg_details->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($pg_details->updated) ?></td>
                </tr>
            </table><h6>

        
            <br><br></h6>
    </div>
            <div class='rooms-view'>
            <h5><b>Rooms in PG</b></h5>

            <table border='0'  class='table'>
            <thead>
                <tr>    
                    <th><?= $this->Paginator->sort('Sr.No.') ?></th>
                    <th colspan="2"><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('seater') ?></th>
                    <th><?= $this->Paginator->sort('booked seats') ?></th>
                    <th><?= $this->Paginator->sort('available seats') ?></th>
                    <th><?= $this->Paginator->sort('food_availability') ?></th>
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
                    <td><?= h($rooms->seater) ?></td>
                    <td><?= $rooms->seater-$rooms->seats_available ?></td>
                    <td><?= h($rooms->seats_available) ?></td>
                     <td><?= h($rooms->food_availability) ?></td>
                    <td><?= number_format($rooms->rent) ?></td>
                    <td><?php if($rooms->status==0)
                                echo "Inactive";
                               else
                                echo "Active"; ?>
                                    
                    </td>
                    <td class="actions">
                        <?=  $this->Html->link('view', ['action' => 'view','controller' => 'rooms' , $rooms->room_id], ['class' => 'text-white btn btn-success btn-sm ']) ?> 
                        <?php 
                            if($rooms->status==1)
                               echo $this->Html->link('block', ['action' => 'block','controller' => 'rooms', $rooms->room_id], ['class' => 'text-white btn btn-danger btn-sm ']); 
                            else
                                echo $this->Html->link('unblock', ['action' => 'block','controller' => 'rooms', $rooms->room_id], ['class' => 'text-white btn btn-danger btn-sm ']); ?>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>





    