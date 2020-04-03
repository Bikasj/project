<?php

?>
<head>
    <style>
        .view 
        {
        width: 41%;
        margin: -51px 116px -100px;
        padding: 20px;
        }
        .vieww 
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
            
            <br><h6>
             <?= $this->Html->link(__('My PG'), ['action' => 'mypg','controller' => 'pgDetails'], ['class' => 'side-nav-item']) ?>
            <br><br>
            <?= $this->Html->link('All Transient Guests', ['action' => 'index','controller' => 'rooms'], ['class' => 'side-nav-item']) ?>
            <br><br>
             <?= $this->Html->link('Add New PG', ['action' => 'addbypg','controller' => 'pgDetails'], ['class' => 'side-nav-item']) ?>
              <br><br>
              <?= $this->Html->link('Add New Room', ['action' => 'addbypg','controller' => 'Rooms'], ['class' => 'side-nav-item']) ?>
              <br><br>
            <?= $this->Html->link('Room Available/Booked', ['action' => 'indexforpg','controller' => 'Rooms'], ['class' => 'side-nav-item']) ?>
            <br><br></h6>
        
        </div>
    </aside>

        <section class="col-lg-10 col-md-8 login py-5 border-top-1 ">
<div class="container ">
<div class="row justify-content-center">
<div class=" vieww">
         <div class="shadow p-3 mb-5 bg-white rounded" style="position: sticky;top:0;" >
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            Total PG :
                <font color="blue" size="10"><b>
                    <?= $pgs ?>
                </font> </b>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            Total Rooms :   
                <font color="blue" size="10"><b>  
                    <?= $room ?>  
                </font> </b>                
        </div>
    <div class="users index content">
   
<?php 
      if($rooms->status==1)
           echo  $this->Html->link('Block', ['action' => 'block', $rooms->room_id], ['class' => 'nav-link text-white btn btn-danger btn-primary  float-right'])."<br>";  
        else
           echo $this->Html->link('Unblock', ['action' => 'block', $rooms->room_id], ['class' => 'nav-link text-white btn btn-primary       float-right'])."<br>"; 
?>

    <div class="column-responsive column-80 view">
        <div class="users view content " >    <br>
            Room Details
           
            <table class="table">
                <tr>
                    
                    <?php  
                    if($rooms->image!=NULL)
                    {   echo "<td colspan='2'>";
                        echo '<img src="data:image/jpg;base64, '.base64_encode(stream_get_contents($rooms->image)).' " height=200px width=500px></td>' ;
                    }
                    else
                    {
                        echo "<td colspan='2' height=200px width=400px><center> <span style='font-size:45px'>No Image available !</span></center></td>";
                    }
                    ?>
                </tr>
                <tr>
                    <th><?= __('Room ID') ?></th>
                    <td><?= h($rooms->room_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('PG ID') ?></th>
                    <td><?=  $this->Html->link($rooms->pg_id, ['action' => 'view','controller' => 'PgDetails', $rooms->pg_id]) 
                         ?></td>
                </tr>
                <tr>
                    <th><?= __('AC facility') ?></th>
                    <td><?= h($rooms->ac_facility) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?php if($rooms->status==1)
                                    echo "Active";
                                else
                                    echo "Inactive"; ?></td>
                </tr>
                <tr>
                    <th><?= __('Seater') ?></th>
                    <td><?= h($rooms->seater) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booked Seats') ?></th>
                    <td><?= $rooms->seater-$rooms->seats_available ?></td>
                </tr>
                 <tr>
                    <th><?= __('Available Seats') ?></th>
                    <td><?= h($rooms->seats_available) ?></td>
                </tr>
                <tr>
                    <th><?= __('Food Availability') ?></th>
                    <td><?= h($rooms->food_availability) ?></td>
                </tr>
                <tr>
                    <th><?= __('Security Charge') ?></th>
                    <td><?= h($rooms->security_charge) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notice Period (in months)') ?></th>
                    <td><?= h($rooms->notice_period) ?></td>
                </tr>
               
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($rooms->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($rooms->updated) ?></td>
                </tr>
            </table><h6>
        
            <br><br></h6>
             <?=  $this->Html->link('View PG', ['action' => 'viewmypg','controller'=>'PgDetails', $rooms->pg_id], ['class' => 'text-white btn btn-success btn-md ']) ?> 
        </div>
    </div>
            
</div>




