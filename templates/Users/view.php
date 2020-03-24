<?php

?>
<head>
    <style>
        .view {
        width: 41%;
        margin: -51px 116px -100px;
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
                          if($user->status==1)
                               echo  $this->Html->link('Block User', ['action' => 'block', $user->user_id], ['class' => 'nav-link text-white add-button  float-right'])."<br>";  
                            else
                               echo $this->Html->link('Unblock User', ['action' => 'block', $user->user_id], ['class' => 'nav-link text-white add-button     float-right'])."<br>"; ?>

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
            </table><h6>
        
            <br><br></h6>
        </div>
    </div>
            
</div>




