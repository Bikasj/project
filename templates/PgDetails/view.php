<?php

?>
<head>
    <style>
        .view {
            width: 84%;
            margin: -51px 86px -100px;
            padding: 20px;
        
    }
        .vieww {
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
   
  <?php 
                          if($pg_details->status==1)
                               echo  $this->Html->link('Block', ['action' => 'block', $pg_details->pg_id], ['class' => 'nav-link text-white btn btn-danger btn-primary  float-right'])."<br>";  
                            else
                               echo $this->Html->link('Unblock', ['action' => 'block',$pg_details->pg_id], ['class' => 'nav-link text-white btn btn-primary       float-right'])."<br>"; ?>

    <div class="column-responsive column-80 view">
        <div class="users view content " ><br>
            
           PG Details
            <table class="table">
                <!-- <tr>
                    
                    <?php  
                    if($room->image!=NULL)
                    {   echo "<td colspan='2'>";
                        echo '<img src="data:image/jpg;base64, '.base64_encode(stream_get_contents($room->image)).' " height=200px width=400px></td>' ;
                    }
                    else
                    {
                        echo "<td colspan='2' height=200px width=400px><center> <span style='font-size:45px'>No Image available !</span></center></td>";
                    }
                    ?>
                </tr> -->
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
                    <th><?= __('Room') ?></th>
                    <td><?= h($pg_details->room) ?></td>
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
    </div>
            
</div>




    