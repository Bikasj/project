<?php
declare(strict_types=1);

namespace App\Controller\Admin;
use App\Controller\Admin\AppController;

class PaymentsController extends AppController
{
     public function payment($transient_id=null,$owner_id=null,$rent=null,$room_id=null)
    {
        $payment_details = $this->Payments->newEmptyEntity();
        $data['transientuser_id']=$transient_id;
        $data['pgowner_id']=$owner_id;
        $data['amount']=$rent;
        $data['payment_mode']="UPI";
        $tid=rand();
        $data['transaction_id']=$tid;
        $data['created']=date("Y-m-d h:i:s");
        $data['room_id']=$room_id;
        $payment_details=$this->Payments->patchEntity($payment_details,$data);
        if($this->Payments->save($payment_details)) 
            {
                $this->Flash->success(__("You have successfully approved the PG request! "));
                return $this->redirect(['action'=>'allpgs','controller'=>'pg-details']);
        }
        $this->Flash->error(__('The PG request could not be approved. Please, try again.'));
    }
}

