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
      if($room->status==1)
           echo  $this->Html->link('Block', ['action' => 'block', $room->room_id], ['class' => 'nav-link text-white btn btn-danger btn-primary  float-right'])."<br>";  
        else
           echo $this->Html->link('Unblock', ['action' => 'block', $room->room_id], ['class' => 'nav-link text-white btn btn-primary       float-right'])."<br>"; 
?>

    <div class="column-responsive column-80 view">
        <div class="users view content " >    <br>
            Room Details
           
            <table class="table">
                <tr>
                    
                    <?php  
                    if($room->image!=NULL)
                    {   echo "<td colspan='2'>";
                        echo '<img src="data:image/jpg;base64, '.base64_encode(stream_get_contents($room->image)).' " height=200px width=500px></td>' ;
                    }
                    else
                    {
                        echo "<td colspan='2' height=200px width=400px><center> <span style='font-size:45px'>No Image available !</span></center></td>";
                    }
                    ?>
                </tr>
                <tr>
                    <th><?= __('Room ID') ?></th>
                    <td><?= h($room->room_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('PG ID') ?></th>
                    <td><?=  $this->Html->link($room->pg_id, ['action' => 'view','controller' => 'PgDetails', $room->pg_id]) 
                         ?></td>
                </tr>
                <tr>
                    <th><?= __('AC facility') ?></th>
                    <td><?= h($room->ac_facility) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?php if($room->status==1)
                                    echo "Active";
                                else
                                    echo "Inactive"; ?></td>
                </tr>
                <tr>
                    <th><?= __('Seater') ?></th>
                    <td><?= h($room->seater) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booked Seats') ?></th>
                    <td><?php 
                        switch ($room->seater) {
                            case "Single":
                                {$seater=1;
                                echo $seater-$room->seats_available;}
                                break;
                            case "Double":
                                {$seater=2;
                                echo $seater-$room->seats_available;}
                                break;
                            case "Triple":
                                {$seater=3;
                                echo $seater-$room->seats_available;}
                                break;
                            default:
                                {$seater=4;
                                echo $seater-$room->seats_available;}
                                break;
                    }  ?></td>
                </tr>
                 <tr>
                    <th><?= __('Available Seats') ?></th>
                    <td><?= h($room->seats_available) ?></td>
                </tr>
                <tr>
                    <th><?= __('Food Availability') ?></th>
                    <td><?= h($room->food_availability) ?></td>
                </tr>
                <tr>
                    <th><?= __('Security Charge') ?></th>
                    <td><?= h($room->security_charge) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notice Period (in months)') ?></th>
                    <td><?= h($room->notice_period) ?></td>
                </tr>
               
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($room->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($room->updated) ?></td>
                </tr>
            </table><h6>
        
            <br><br></h6>
             <?=  $this->Html->link('View PG', ['action' => 'view','controller'=>'PgDetails', $room->pg_id], ['class' => 'text-white btn btn-success btn-md ']) ?> 
        </div>
    </div>
            
</div>




