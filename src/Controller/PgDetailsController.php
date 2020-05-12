<?php

declare(strict_types=1);
namespace App\Controller;

class PgDetailsController extends AppController
{
    public $paginate = [
        'maxLimit' => 4
    ];
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    public function block($id)
    {   
        $pg_details= $this->PgDetails->get($id);
        $status=$pg_details->status;
        $pg_details->status=1-$status;
        if ($this->PgDetails->save($pg_details)) {
            if($pg_details->status==0)
                $this->Flash->success(__('The PG has been blocked.'));
            else
                $this->Flash->success(__('The PG has been unblocked.'));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('The PG could not be blocked. Please, try again.'));
    }
    public function pg()
    {   
        $this->loadModel('Users');
        $this->loadModel('Rooms');
        $this->loadModel('Payments');
        $pg_details = $this->paginate($this->PgDetails->findByOwnerId($this->Auth->user('user_id')),['contain' => ['Users']]); 
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $room=0;$rooms=0;
        foreach ($lists as $list) 
        {
            $room=$list;
            $rooms=$rooms+ $this->Rooms->findByPgId($room)->count();
        }
        $this->set(array('pgs'=> $pgs ,'users'=> $users ,'transient_count'=>$transient_count, 'rooms'=> $rooms ,'bookingrequest'=>$bookingrequest,  'pg_details' => $this -> paginate( $this ->PgDetails->findByOwnerId($this->Auth->user('user_id')) )));
            $this->set(compact('pg_details'));
    }
    public function view($id=null)
    {   $this->loadModel('Users');
        $this->loadModel('Rooms');
        $this->loadModel('Payments');
        $pg_details = $this->PgDetails->get($id, [
            'contain' => ['Users']
        ]);
        $roomdetails = $this->Rooms->findByPgId($id)->all(); 
         $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
         $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $room=0;$rooms=0;
        foreach ($lists as $list) 
        {
            $room=$list;
            $rooms=$rooms+ $this->Rooms->findByPgId($room)->count();
        }
        $this->set(array('pgs'=> $pgs ,'users'=> $users ,'bookingrequest'=>$bookingrequest,'transient_count'=>$transient_count, 'rooms'=> $rooms,'roomdetails'=>$roomdetails ,  'pg_details' => $this -> paginate( $this ->PgDetails->findByOwnerId($this->Auth->user('user_id')) )));
        $this->set(array('pg_details'=>$pg_details,'roomdetails'=>$roomdetails));
    }
    public function edit($id = null)
    {   $this->loadModel('Users');
        $this->loadModel('Rooms');
        $this->loadModel('Payments');
        $pg_details = $this->PgDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['put','patch', 'post'])) {
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $pg_details = $this->PgDetails->patchEntity($pg_details, $data);
            if ($this->PgDetails->save($pg_details)) {
                $this->Flash->success(__('The user has been modified.'));
                    return $this->redirect(['action' => 'pg']);
            }
            $this->Flash->error(__('The user could not be modified. Please, try again.'));
        }
        $room = $this->paginate($this->Rooms->findByPgId($id));
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $room=0;$rooms=0;
        foreach ($lists as $list) 
        {
            $room=$list;
            $rooms=$rooms+ $this->Rooms->findByPgId($room)->count();
        }
        $this->set(array('pgs'=> $pgs ,'users'=> $users ,'bookingrequest'=>$bookingrequest,'transient_count'=>$transient_count, 'rooms'=> $rooms ,  'pg_details' => $this -> paginate( $this ->PgDetails->findByOwnerId($this->Auth->user('user_id')) )));
            $this->set(compact('pg_details'));
    }
    public function add()
    {   
        $this->loadModel('Users');
        $this->loadModel('Rooms');
        $this->loadModel('Payments');
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        $pg_details = $this->PgDetails->newEmptyEntity();
        if ($this->request->is('post')) 
        {
            $data=$this->request->getData();
            $data['owner_id']=$this->Auth->user('user_id');
            $data['created']=date("Y-m-d h:i:s");
            $data['updated']=date("Y-m-d h:i:s");
            $pg_details = $this->PgDetails->newEntity($data);
            if ($this->PgDetails->save($pg_details)) 
            { 
                $this->Flash->success(__('The PG has been saved.'));
                    return $this->redirect(['action' => 'pg']);
            }
            $this->Flash->error(__('The PG could not be saved. Please, try again.'));
        }
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $room=0;$rooms=0;
        foreach ($lists as $list) 
        {
            $room=$list;
            $rooms=$rooms+ $this->Rooms->findByPgId($room)->count();
        }
        $this->set(array('pgs'=> $pgs ,'users'=> $users , 'rooms'=> $rooms ,'bookingrequest'=>$bookingrequest,'transient_count'=>$transient_count,  'pg_details' => $this -> paginate( $this ->PgDetails->findByOwnerId($this->Auth->user('user_id')) )));
            $this->set(compact('pg_details'));
    }
}
