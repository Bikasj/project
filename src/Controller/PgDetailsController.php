<?php

declare(strict_types=1);
namespace App\Controller;

class PgDetailsController extends AppController
{
    public $paginate = [
        'maxLimit' => 5
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
        $this->Flash->error(__('The PG could not be saved. Please, try again.'));
    }
    public function mypg()
     {   
        //$this->Auth->user('user_id')
        $this->loadModel('Rooms');
        $pg_details = $this->paginate($this->PgDetails->findByOwnerId($this->Auth->user('user_id')),[
            'contain' => ['Users']]); 
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();

        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $room=0;$rooms=0;
        foreach ($lists as $list) 
        {
            $room=$list;
            $rooms=$rooms+ $this->Rooms->findByPgId($room)->count();
        }
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms ,  'pg_details' => $this -> paginate( $this ->PgDetails->findByOwnerId($this->Auth->user('user_id')) )));
            $this->set(compact('pg_details'));
    }
    public function viewmypg($id = null)
    {   $this->loadModel('Users');
        $this->loadModel('Rooms');
        $pg_details = $this->PgDetails->get($id, [
            'contain' => ['Users']
        ]);
        $room = $this->paginate($this->Rooms->findByPgId($id)); 
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $roomm=0;$rooms=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $rooms=$rooms+ $this->Rooms->findByPgId($roomm)->count();
        }
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms ,'room' => $room , 'pg_details' => $this -> paginate( $this ->PgDetails->findByOwnerId($this->Auth->user('user_id')) )));
        $this->set(compact('pg_details'));
    }
    public function editmypg($id = null)
    {   
        $this->loadModel('Rooms');
        $pg_details = $this->PgDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['put','patch', 'post'])) {
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $pg_details = $this->PgDetails->patchEntity($pg_details, $data);
            if ($this->PgDetails->save($pg_details)) {
                $this->Flash->success(__('The user has been modified.'));
                    return $this->redirect(['action' => 'mypg']);
            }
            $this->Flash->error(__('The user could not be modified. Please, try again.'));
        }
        $room = $this->paginate($this->Rooms->findByPgId($id));
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $roomm=0;$rooms=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $rooms=$rooms+ $this->Rooms->findByPgId($roomm)->count();
        }
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms ,'room' => $room,  'pg_details' => $this -> paginate( $this ->PgDetails->findByOwnerId($this->Auth->user('user_id')) )));
        $this->set(compact('pg_details'));
    }
    public function addbypg()
    {   
        $this->loadModel('Rooms');
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
                    return $this->redirect(['action' => 'mypg']);
            }
            $this->Flash->error(__('The PG could not be saved. Please, try again.'));
        }
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $lists = $this->PgDetails->find('list')->where(['owner_id' =>$this->Auth->user('user_id')]);
        $roomm=0;$rooms=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $rooms=$rooms+ $this->Rooms->findByPgId($roomm)->count();
        }
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms ));
        $this->set(compact('pg_details'));
    }
}
