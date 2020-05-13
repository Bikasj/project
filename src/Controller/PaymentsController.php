<?php
declare(strict_types=1);

namespace App\Controller\Admin;

class PaymentsController extends AppController
{

    // public function index()
    // {
    //     $this->paginate = [
    //         'contain' => ['Users', 'Transactions'],
    //     ];
    //     $payments = $this->paginate($this->Payments);

    //     $this->set(compact('payments'));
    // }
    // public function add()
    // {
    //     $payment = $this->Payments->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $payment = $this->Payments->patchEntity($payment, $this->request->getData());
    //         if ($this->Payments->save($payment)) {
    //             $this->Flash->success(__('The payment has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The payment could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Payments->Users->find('list', ['limit' => 200]);
    //     $transactions = $this->Payments->Transactions->find('list', ['limit' => 200]);
    //     $this->set(compact('payment', 'users', 'transactions'));
    // }
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
                return $this->redirect(['action'=>'pg','controller'=>'pg-details']);
        }
        $this->Flash->error(__('The PG request could not be approved. Please, try again.'));
    }
    // public function edit($id = null)
    // {
    //     $payment = $this->Payments->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $payment = $this->Payments->patchEntity($payment, $this->request->getData());
    //         if ($this->Payments->save($payment)) {
    //             $this->Flash->success(__('The payment has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The payment could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Payments->Users->find('list', ['limit' => 200]);
    //     $transactions = $this->Payments->Transactions->find('list', ['limit' => 200]);
    //     $this->set(compact('payment', 'users', 'transactions'));
    // }
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $payment = $this->Payments->get($id);
    //     if ($this->Payments->delete($payment)) {
    //         $this->Flash->success(__('The payment has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}

